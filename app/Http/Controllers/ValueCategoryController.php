<?php

namespace App\Http\Controllers;

use App\Models\ValueCategory;
use App\Http\Requests\{StoreValueCategoryRequest, UpdateValueCategoryRequest};
use Yajra\DataTables\Facades\DataTables;

class ValueCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:value category view')->only('index', 'show');
        $this->middleware('permission:value category create')->only('create', 'store');
        $this->middleware('permission:value category edit')->only('edit', 'update');
        $this->middleware('permission:value category delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $valueCategories = ValueCategory::with('category:id,name');

            return DataTables::of($valueCategories)
                ->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '';
                })->addColumn('action', 'value-categories.include.action')
                ->toJson();
        }

        return view('value-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('value-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreValueCategoryRequest $request)
    {
        
        ValueCategory::create($request->validated());

        return redirect()
            ->route('value-categories.index')
            ->with('success', __('The valueCategory was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ValueCategory  $valueCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ValueCategory $valueCategory)
    {
        $valueCategory->load('category:id,name');

		return view('value-categories.show', compact('valueCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ValueCategory  $valueCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ValueCategory $valueCategory)
    {
        $valueCategory->load('category:id,name');

		return view('value-categories.edit', compact('valueCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ValueCategory  $valueCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateValueCategoryRequest $request, ValueCategory $valueCategory)
    {
        
        $valueCategory->update($request->validated());

        return redirect()
            ->route('value-categories.index')
            ->with('success', __('The valueCategory was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ValueCategory  $valueCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ValueCategory $valueCategory)
    {
        try {
            $valueCategory->delete();

            return redirect()
                ->route('value-categories.index')
                ->with('success', __('The valueCategory was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('value-categories.index')
                ->with('error', __("The valueCategory can't be deleted because it's related to another table."));
        }
    }
}
