<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class SubdomainIndexController extends Controller
{
    public function index(Request $request, Tenant $tenant)
    {
        $tenant->visit()->withIP()->withSession();

        return view('front.subdomain.index', compact('tenant'));
    }

    public function registerByAff(Request $request, Tenant $tenant, $id)
    {
        $program = Program::with('periods')->find($id);
        return view('front.subdomain.register', compact('tenant', 'program'));
    }
}
