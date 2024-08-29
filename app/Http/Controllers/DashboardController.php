<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use App\Models\Tenant;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $activeUsers = Student::where('is_member', 1)->count();
        $totalPrograms = Program::where('is_active', 1)->count();

        $affId = Tenant::where('user_id', auth()->user()->id)->first();
        return view('dashboard', compact('activeUsers', 'totalPrograms', 'affId'));
    }
}
