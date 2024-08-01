<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\{StoreStudentRequest, UpdateStudentRequest};
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:student view')->only('index', 'show');
        $this->middleware('permission:student create')->only('create', 'store');
        $this->middleware('permission:student edit')->only('edit', 'update');
        $this->middleware('permission:student delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $students = Student::with('user:id,name');

            return DataTables::of($students)
                ->addColumn('address', function($row){
                    return str($row->address)->limit(100);
                })
				->addColumn('member_access', function($row){
                    return str($row->member_access)->limit(100);
                })
				->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '';
                })->addColumn('action', 'students.include.action')
                ->toJson();
        }

        return view('students.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        
        Student::create($request->validated());

        return redirect()
            ->route('students.index')
            ->with('success', __('The student was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student->load('user:id,name');

		return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $student->load('user:id,name');

		return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        
        $student->update($request->validated());

        return redirect()
            ->route('students.index')
            ->with('success', __('The student was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();

            return redirect()
                ->route('students.index')
                ->with('success', __('The student was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('students.index')
                ->with('error', __("The student can't be deleted because it's related to another table."));
        }
    }
}
