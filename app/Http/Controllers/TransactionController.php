<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\{StoreTransactionRequest, UpdateTransactionRequest};
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:transaction view')->only('index', 'show');
        $this->middleware('permission:transaction create')->only('create', 'store');
        $this->middleware('permission:transaction edit')->only('edit', 'update');
        $this->middleware('permission:transaction delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $transactions = Transaction::with('user:id,name', 'exam:id,category_id', 'program:id,name', );

            return DataTables::of($transactions)
                ->addColumn('note', function($row){
                    return str($row->note)->limit(100);
                })
				->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '';
                })->addColumn('exam', function ($row) {
                    return $row->exam ? $row->exam->category_id : '';
                })->addColumn('program', function ($row) {
                    return $row->program ? $row->program->name : '';
                })->addColumn('action', 'transactions.include.action')
                ->toJson();
        }

        return view('transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionRequest $request)
    {
        
        Transaction::create($request->validated());

        return redirect()
            ->route('transactions.index')
            ->with('success', __('The transaction was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $transaction->load('user:id,name', 'exam:id,category_id', 'program:id,name', );

		return view('transactions.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $transaction->load('user:id,name', 'exam:id,category_id', 'program:id,name', );

		return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        
        $transaction->update($request->validated());

        return redirect()
            ->route('transactions.index')
            ->with('success', __('The transaction was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        try {
            $transaction->delete();

            return redirect()
                ->route('transactions.index')
                ->with('success', __('The transaction was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('transactions.index')
                ->with('error', __("The transaction can't be deleted because it's related to another table."));
        }
    }
}
