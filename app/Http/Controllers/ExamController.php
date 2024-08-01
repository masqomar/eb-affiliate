<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Http\Requests\{StoreExamRequest, UpdateExamRequest};
use Yajra\DataTables\Facades\DataTables;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:exam view')->only('index', 'show');
        $this->middleware('permission:exam create')->only('create', 'store');
        $this->middleware('permission:exam edit')->only('edit', 'update');
        $this->middleware('permission:exam delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $exams = Exam::with('category:id,name', 'question_title:id,category_id');

            return DataTables::of($exams)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(100);
                })
				->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '';
                })->addColumn('question_title', function ($row) {
                    return $row->question_title ? $row->question_title->category_id : '';
                })->addColumn('action', 'exams.include.action')
                ->toJson();
        }

        return view('exams.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExamRequest $request)
    {
        
        Exam::create($request->validated());

        return redirect()
            ->route('exams.index')
            ->with('success', __('The exam was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        $exam->load('category:id,name', 'question_title:id,category_id');

		return view('exams.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $exam->load('category:id,name', 'question_title:id,category_id');

		return view('exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExamRequest $request, Exam $exam)
    {
        
        $exam->update($request->validated());

        return redirect()
            ->route('exams.index')
            ->with('success', __('The exam was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        try {
            $exam->delete();

            return redirect()
                ->route('exams.index')
                ->with('success', __('The exam was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('exams.index')
                ->with('error', __("The exam can't be deleted because it's related to another table."));
        }
    }
}
