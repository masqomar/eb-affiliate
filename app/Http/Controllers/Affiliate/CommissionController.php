<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index()
    {
        $totalVisitCount = Tenant::where('user_id', auth()->user()->id)->withTotalVisitCount()->first()->visit_count_total ?? '0';
        $historyVisit = Tenant::with('user:id,name')->where('user_id', auth()->user()->id)->first();
        $historyReferal = Tenant::with('user:id,name', 'transactions.user', 'transactions.program')->where('user_id', auth()->user()->id)->first();
        
        return view('affiliate.commissions.index', compact('totalVisitCount', 'historyVisit', 'historyReferal'));
    }

    public function detail()
    {
        
        $totalVisitCount = Tenant::where('user_id', auth()->user()->id)->withTotalVisitCount()->first()->visit_count_total ?? '0';
        $komisiKunjungan = $totalVisitCount * 1;

        $affTransaction = Tenant::with('transactions')->where('user_id', auth()->user()->id)->first();
        $komisiReferal = $affTransaction->transactions->sum('down_payment');


        return view('affiliate.commissions.detail', compact('totalVisitCount', 'komisiKunjungan', 'komisiReferal'));
    }
}
