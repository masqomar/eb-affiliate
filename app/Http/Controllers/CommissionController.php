<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Http\Requests\{StoreCommissionRequest, UpdateCommissionRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class CommissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:commission view')->only('index', 'show');
        $this->middleware('permission:commission create')->only('create', 'store');
        $this->middleware('permission:commission edit')->only('edit', 'update');
        $this->middleware('permission:commission delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $commissions = Commission::with('tenant:id,user_id');

            return Datatables::of($commissions)
                ->addColumn('note', function($row){
                    return str($row->note)->limit(100);
                })
				->addColumn('tenant', function ($row) {
                    return $row->tenant ? $row->tenant->user_id : '';
                })
                ->addColumn('commission_proof', function ($row) {
                    if ($row->commission_proof == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/commission-proofs/' . $row->commission_proof);
                })

                ->addColumn('action', 'commissions.include.action')
                ->toJson();
        }

        return view('commissions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommissionRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('commission_proof') && $request->file('commission_proof')->isValid()) {

            $path = storage_path('app/public/uploads/commission_proofs/');
            $filename = $request->file('commission_proof')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('commission_proof')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['commission_proof'] = $filename;
        }

        Commission::create($attr);

        return redirect()
            ->route('commissions.index')
            ->with('success', __('The commission was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commission $commission
     * @return \Illuminate\Http\Response
     */
    public function show(Commission $commission)
    {
        $commission->load('tenant:id,user_id');

		return view('commissions.show', compact('commission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commission $commission
     * @return \Illuminate\Http\Response
     */
    public function edit(Commission $commission)
    {
        $commission->load('tenant:id,user_id');

		return view('commissions.edit', compact('commission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commission $commission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommissionRequest $request, Commission $commission)
    {
        $attr = $request->validated();
        
        if ($request->file('commission_proof') && $request->file('commission_proof')->isValid()) {

            $path = storage_path('app/public/uploads/commission_proofs/');
            $filename = $request->file('commission_proof')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('commission_proof')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old commission_proof from storage
            if ($commission->commission_proof != null && file_exists($path . $commission->commission_proof)) {
                unlink($path . $commission->commission_proof);
            }

            $attr['commission_proof'] = $filename;
        }

        $commission->update($attr);

        return redirect()
            ->route('commissions.index')
            ->with('success', __('The commission was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commission $commission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commission $commission)
    {
        try {
            $path = storage_path('app/public/uploads/commission_proofs/');

            if ($commission->commission_proof != null && file_exists($path . $commission->commission_proof)) {
                unlink($path . $commission->commission_proof);
            }

            $commission->delete();

            return redirect()
                ->route('commissions.index')
                ->with('success', __('The commission was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('commissions.index')
                ->with('error', __("The commission can't be deleted because it's related to another table."));
        }
    }
}
