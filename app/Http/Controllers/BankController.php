<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Http\Requests\{StoreBankRequest, UpdateBankRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bank view')->only('index', 'show');
        $this->middleware('permission:bank create')->only('create', 'store');
        $this->middleware('permission:bank edit')->only('edit', 'update');
        $this->middleware('permission:bank delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $banks = Bank::query();

            return Datatables::of($banks)
                
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/images/' . $row->image);
                })

                ->addColumn('action', 'banks.include.action')
                ->toJson();
        }

        return view('banks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['image'] = $filename;
        }

        Bank::create($attr);

        return redirect()
            ->route('banks.index')
            ->with('success', __('The bank was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return view('banks.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('banks.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $attr = $request->validated();
        
        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old image from storage
            if ($bank->image != null && file_exists($path . $bank->image)) {
                unlink($path . $bank->image);
            }

            $attr['image'] = $filename;
        }

        $bank->update($attr);

        return redirect()
            ->route('banks.index')
            ->with('success', __('The bank was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        try {
            $path = storage_path('app/public/uploads/images/');

            if ($bank->image != null && file_exists($path . $bank->image)) {
                unlink($path . $bank->image);
            }

            $bank->delete();

            return redirect()
                ->route('banks.index')
                ->with('success', __('The bank was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('banks.index')
                ->with('error', __("The bank can't be deleted because it's related to another table."));
        }
    }
}
