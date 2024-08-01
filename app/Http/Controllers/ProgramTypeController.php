<?php

namespace App\Http\Controllers;

use App\Models\ProgramType;
use App\Http\Requests\{StoreProgramTypeRequest, UpdateProgramTypeRequest};
use Yajra\DataTables\Facades\DataTables;

class ProgramTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:program type view')->only('index', 'show');
        $this->middleware('permission:program type create')->only('create', 'store');
        $this->middleware('permission:program type edit')->only('edit', 'update');
        $this->middleware('permission:program type delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $programTypes = ProgramType::with('category:id,name');

            return DataTables::of($programTypes)
                ->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '';
                })->addColumn('action', 'program-types.include.action')
                ->toJson();
        }

        return view('program-types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('program-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramTypeRequest $request)
    {
        
        ProgramType::create($request->validated());

        return redirect()
            ->route('program-types.index')
            ->with('success', __('The programType was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramType  $programType
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramType $programType)
    {
        $programType->load('category:id,name');

		return view('program-types.show', compact('programType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramType  $programType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramType $programType)
    {
        $programType->load('category:id,name');

		return view('program-types.edit', compact('programType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramType  $programType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramTypeRequest $request, ProgramType $programType)
    {
        
        $programType->update($request->validated());

        return redirect()
            ->route('program-types.index')
            ->with('success', __('The programType was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramType  $programType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramType $programType)
    {
        try {
            $programType->delete();

            return redirect()
                ->route('program-types.index')
                ->with('success', __('The programType was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('program-types.index')
                ->with('error', __("The programType can't be deleted because it's related to another table."));
        }
    }
}
