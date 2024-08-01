<?php

namespace App\Http\Controllers;

use App\Models\DetailValueCategory;
use App\Http\Requests\{StoreDetailValueCategoryRequest, UpdateDetailValueCategoryRequest};
use Yajra\DataTables\Facades\DataTables;

class DetailValueCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:detail value category view')->only('index', 'show');
        $this->middleware('permission:detail value category create')->only('create', 'store');
        $this->middleware('permission:detail value category edit')->only('edit', 'update');
        $this->middleware('permission:detail value category delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $detailValueCategories = DetailValueCategory::with('value_category:id,category_id');

            return DataTables::of($detailValueCategories)
                ->addColumn('value_category', function ($row) {
                    return $row->value_category ? $row->value_category->category_id : '';
                })->addColumn('action', 'detail-value-categories.include.action')
                ->toJson();
        }

        return view('detail-value-categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detail-value-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailValueCategoryRequest $request)
    {
        
        DetailValueCategory::create($request->validated());

        return redirect()
            ->route('detail-value-categories.index')
            ->with('success', __('The detailValueCategory was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailValueCategory  $detailValueCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DetailValueCategory $detailValueCategory)
    {
        $detailValueCategory->load('value_category:id,category_id');

		return view('detail-value-categories.show', compact('detailValueCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailValueCategory  $detailValueCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailValueCategory $detailValueCategory)
    {
        $detailValueCategory->load('value_category:id,category_id');

		return view('detail-value-categories.edit', compact('detailValueCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailValueCategory  $detailValueCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailValueCategoryRequest $request, DetailValueCategory $detailValueCategory)
    {
        
        $detailValueCategory->update($request->validated());

        return redirect()
            ->route('detail-value-categories.index')
            ->with('success', __('The detailValueCategory was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailValueCategory  $detailValueCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailValueCategory $detailValueCategory)
    {
        try {
            $detailValueCategory->delete();

            return redirect()
                ->route('detail-value-categories.index')
                ->with('success', __('The detailValueCategory was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('detail-value-categories.index')
                ->with('error', __("The detailValueCategory can't be deleted because it's related to another table."));
        }
    }
}
