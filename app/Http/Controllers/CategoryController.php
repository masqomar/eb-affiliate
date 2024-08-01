<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\{StoreCategoryRequest, UpdateCategoryRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category view')->only('index', 'show');
        $this->middleware('permission:category create')->only('create', 'store');
        $this->middleware('permission:category edit')->only('edit', 'update');
        $this->middleware('permission:category delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $categories = Category::query();

            return Datatables::of($categories)
                
                ->addColumn('thumbnail', function ($row) {
                    if ($row->thumbnail == null) {
                    return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                }
                    return asset('storage/uploads/thumbnails/' . $row->thumbnail);
                })

                ->addColumn('action', 'categories.include.action')
                ->toJson();
        }

        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $attr = $request->validated();
        
        if ($request->file('thumbnail') && $request->file('thumbnail')->isValid()) {

            $path = storage_path('app/public/uploads/thumbnails/');
            $filename = $request->file('thumbnail')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('thumbnail')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['thumbnail'] = $filename;
        }

        Category::create($attr);

        return redirect()
            ->route('categories.index')
            ->with('success', __('The category was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $attr = $request->validated();
        
        if ($request->file('thumbnail') && $request->file('thumbnail')->isValid()) {

            $path = storage_path('app/public/uploads/thumbnails/');
            $filename = $request->file('thumbnail')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('thumbnail')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old thumbnail from storage
            if ($category->thumbnail != null && file_exists($path . $category->thumbnail)) {
                unlink($path . $category->thumbnail);
            }

            $attr['thumbnail'] = $filename;
        }

        $category->update($attr);

        return redirect()
            ->route('categories.index')
            ->with('success', __('The category was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $path = storage_path('app/public/uploads/thumbnails/');

            if ($category->thumbnail != null && file_exists($path . $category->thumbnail)) {
                unlink($path . $category->thumbnail);
            }

            $category->delete();

            return redirect()
                ->route('categories.index')
                ->with('success', __('The category was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('categories.index')
                ->with('error', __("The category can't be deleted because it's related to another table."));
        }
    }
}
