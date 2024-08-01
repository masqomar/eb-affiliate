<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Http\Requests\{StoreAnnouncementRequest, UpdateAnnouncementRequest};
use Yajra\DataTables\Facades\DataTables;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:announcement view')->only('index', 'show');
        $this->middleware('permission:announcement create')->only('create', 'store');
        $this->middleware('permission:announcement edit')->only('edit', 'update');
        $this->middleware('permission:announcement delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $announcements = Announcement::query();

            return DataTables::of($announcements)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(100);
                })
				->addColumn('action', 'announcements.include.action')
                ->toJson();
        }

        return view('announcements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('announcements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnnouncementRequest $request)
    {
        
        Announcement::create($request->validated());

        return redirect()
            ->route('announcements.index')
            ->with('success', __('The announcement was created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        return view('announcements.show', compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('announcements.edit', compact('announcement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnnouncementRequest $request, Announcement $announcement)
    {
        
        $announcement->update($request->validated());

        return redirect()
            ->route('announcements.index')
            ->with('success', __('The announcement was updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        try {
            $announcement->delete();

            return redirect()
                ->route('announcements.index')
                ->with('success', __('The announcement was deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('announcements.index')
                ->with('error', __("The announcement can't be deleted because it's related to another table."));
        }
    }
}
