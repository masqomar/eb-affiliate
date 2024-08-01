<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\{StoreFaqRequest, UpdateFaqRequest};
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:faq view')->only('index', 'show');
        $this->middleware('permission:faq create')->only('create', 'store');
        $this->middleware('permission:faq edit')->only('edit', 'update');
        $this->middleware('permission:faq delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $faqs = Faq::query();

            return DataTables::of($faqs)
                ->addColumn('answer', function($row){
                    return str($row->answer)->limit(100);
                })
				->addColumn('action', 'faqs.include.action')
                ->toJson();
        }

        return view('faqs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFaqRequest $request)
    {
        
        Faq::create($request->validated());

        return redirect()
            ->route('faqs.index')
            ->with('success', __('The faq was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        return view('faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        
        $faq->update($request->validated());

        return redirect()
            ->route('faqs.index')
            ->with('success', __('The faq was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        try {
            $faq->delete();

            return redirect()
                ->route('faqs.index')
                ->with('success', __('The faq was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('faqs.index')
                ->with('error', __("The faq can't be deleted because it's related to another table."));
        }
    }
}
