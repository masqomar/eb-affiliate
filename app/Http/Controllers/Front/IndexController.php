<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\PeriodProgram;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function daftar()
    {
        $programs = Program::with('period', 'program_type.category')->where('is_active', 1)->get();

        return view('front.daftar', compact('programs'));
    }

    public function getPeriod($program_id)
    {
        $periods = DB::table('period_program')
        ->join('periods', 'period_program.period_id', 'periods.id')
        ->join('programs', 'period_program.program_id', 'programs.id')
        ->where('period_program.program_id', $program_id)
        ->where('periods.is_active', 1)
        ->get();

        return response()->json($periods);
    }
}
