<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Http\Requests\{StoreTransactionDetailRequest, UpdateTransactionDetailRequest};
use Yajra\DataTables\Facades\DataTables;

class TransactionDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:transaction detail view')->only('index', 'show');
        $this->middleware('permission:transaction detail create')->only('create', 'store');
        $this->middleware('permission:transaction detail edit')->only('edit', 'update');
        $this->middleware('permission:transaction detail delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $transactionDetails = TransactionDetail::with('transaction:id');

            return DataTables::of($transactionDetails)
                ->addColumn('transaction', function ($row) {
                    return $row->transaction ? $row->transaction->id : '';
                })->addColumn('action', 'transaction-details.include.action')
                ->toJson();
        }

        return view('transaction-details.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaction-details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionDetailRequest $request)
    {
        
        TransactionDetail::create($request->validated());

        return redirect()
            ->route('transaction-details.index')
            ->with('success', __('The transactionDetail was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionDetail $transactionDetail)
    {
        $transactionDetail->load('transaction:id');

		return view('transaction-details.show', compact('transactionDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionDetail $transactionDetail)
    {
        $transactionDetail->load('transaction:id');

		return view('transaction-details.edit', compact('transactionDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionDetailRequest $request, TransactionDetail $transactionDetail)
    {
        
        $transactionDetail->update($request->validated());

        return redirect()
            ->route('transaction-details.index')
            ->with('success', __('The transactionDetail was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        try {
            $transactionDetail->delete();

            return redirect()
                ->route('transaction-details.index')
                ->with('success', __('The transactionDetail was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('transaction-details.index')
                ->with('error', __("The transactionDetail can't be deleted because it's related to another table."));
        }
    }
}
