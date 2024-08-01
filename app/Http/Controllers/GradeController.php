<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Http\Requests\{StoreGradeRequest, UpdateGradeRequest};
use Yajra\DataTables\Facades\DataTables;

class GradeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:grade view')->only('index', 'show');
        $this->middleware('permission:grade create')->only('create', 'store');
        $this->middleware('permission:grade edit')->only('edit', 'update');
        $this->middleware('permission:grade delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $grades = Grade::with('category:id,name', 'exam:id,category_id', 'user:id,name');

            return DataTables::of($grades)
                ->addColumn('answers', function($row){
                    return str($row->answers)->limit(100);
                })
				->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '';
                })->addColumn('exam', function ($row) {
                    return $row->exam ? $row->exam->category_id : '';
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '';
                })->addColumn('action', 'grades.include.action')
                ->toJson();
        }

        return view('grades.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        
        Grade::create($request->validated());

        return redirect()
            ->route('grades.index')
            ->with('success', __('The grade was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        $grade->load('category:id,name', 'exam:id,category_id', 'user:id,name');

		return view('grades.show', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $grade->load('category:id,name', 'exam:id,category_id', 'user:id,name');

		return view('grades.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        
        $grade->update($request->validated());

        return redirect()
            ->route('grades.index')
            ->with('success', __('The grade was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        try {
            $grade->delete();

            return redirect()
                ->route('grades.index')
                ->with('success', __('The grade was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('grades.index')
                ->with('error', __("The grade can't be deleted because it's related to another table."));
        }
    }
}
