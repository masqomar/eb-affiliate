<?php

namespace App\Http\Controllers;

use App\Models\QuestionTitle;
use App\Http\Requests\{StoreQuestionTitleRequest, UpdateQuestionTitleRequest};
use Yajra\DataTables\Facades\DataTables;

class QuestionTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:question title view')->only('index', 'show');
        $this->middleware('permission:question title create')->only('create', 'store');
        $this->middleware('permission:question title edit')->only('edit', 'update');
        $this->middleware('permission:question title delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $questionTitles = QuestionTitle::with('category:id,name');

            return DataTables::of($questionTitles)
                ->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '';
                })->addColumn('action', 'question-titles.include.action')
                ->toJson();
        }

        return view('question-titles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('question-titles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionTitleRequest $request)
    {
        
        QuestionTitle::create($request->validated());

        return redirect()
            ->route('question-titles.index')
            ->with('success', __('The questionTitle was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuestionTitle  $questionTitle
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionTitle $questionTitle)
    {
        $questionTitle->load('category:id,name');

		return view('question-titles.show', compact('questionTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionTitle  $questionTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionTitle $questionTitle)
    {
        $questionTitle->load('category:id,name');

		return view('question-titles.edit', compact('questionTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionTitle  $questionTitle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuestionTitleRequest $request, QuestionTitle $questionTitle)
    {
        
        $questionTitle->update($request->validated());

        return redirect()
            ->route('question-titles.index')
            ->with('success', __('The questionTitle was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuestionTitle  $questionTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionTitle $questionTitle)
    {
        try {
            $questionTitle->delete();

            return redirect()
                ->route('question-titles.index')
                ->with('success', __('The questionTitle was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('question-titles.index')
                ->with('error', __("The questionTitle can't be deleted because it's related to another table."));
        }
    }
}
