<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Http\Requests\{StoreCouponRequest, UpdateCouponRequest};
use Yajra\DataTables\Facades\DataTables;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:coupon view')->only('index', 'show');
        $this->middleware('permission:coupon create')->only('create', 'store');
        $this->middleware('permission:coupon edit')->only('edit', 'update');
        $this->middleware('permission:coupon delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $coupons = Coupon::with('program:id,name', );

            return DataTables::of($coupons)
                ->addColumn('program', function ($row) {
                    return $row->program ? $row->program->name : '';
                })->addColumn('start_date', function ($row) {
                    return $row->start_date ? $row->start_date : '-';
                })->addColumn('end_date', function ($row) {
                    return $row->end_date ? $row->end_date : '-';
                })->addColumn('action', 'coupons.include.action')
                ->toJson();
        }

        return view('coupons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {
        
        Coupon::create($request->validated());

        return redirect()
            ->route('coupons.index')
            ->with('success', __('The coupon was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        $coupon->load('program:id,name', );

		return view('coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        $coupon->load('program:id,name', );

		return view('coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        
        $coupon->update($request->validated());

        return redirect()
            ->route('coupons.index')
            ->with('success', __('The coupon was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        try {
            $coupon->delete();

            return redirect()
                ->route('coupons.index')
                ->with('success', __('The coupon was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('coupons.index')
                ->with('error', __("The coupon can't be deleted because it's related to another table."));
        }
    }
}
