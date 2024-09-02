<?php

namespace App\Http\Controllers\Affiliate;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('affiliate.registration.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subdomain'         => 'required|unique:tenants,subdomain|max:255',
            'account_bank'      => 'required|string|max:255',
            'account_number'    => 'required|unique:tenants,phone_number',
            'account_name'      => 'required|string|max:255',
            'phone_number'      => 'required|string|max:255',
            'address'           => 'required|string|max:255',
            'snk'               => 'required|integer',
        ]);

        Tenant::create([
            'user_id'           => auth()->user()->id,
            'subdomain'         => $request->subdomain,
            'subdomain_link'    => $request->subdomain.config('app.url'),
            'account_bank'      => $request->account_bank,
            'account_number'    => $request->account_number,
            'account_name'      => $request->account_name,
            'phone_number'      => $request->phone_number,
            'address'           => $request->address,
            'snk'               => $request->snk
        ]);

        return redirect()
            ->route('dashboard.index')
            ->with('success', __('Data berhasil disimpan'));
    }
}
