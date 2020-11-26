<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Classroom;
use App\Http\Requests\StoreAnnoucementRequest;
use App\Http\Requests\UpdateAnnoucementRequest;
use App\Http\Resources\Announcement as AnnouncementResource;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function index(Classroom $classroom)
    {
        return AnnouncementResource::collection($classroom->announcements);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\StoreAnnoucementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Classroom $classroom, StoreAnnoucementRequest $request)
    {
        Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'classroom_id' => $classroom->id,
            'user_id' => 1
        ]);

        return response([
            'message' => 'assignment saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom, Announcement $announcement)
    {
        // return new AnnouncementResource($announcement);
        return new  AnnouncementResource($classroom->announcements()->findOrFail($announcement->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\UpdateAnnoucementRequest  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Classroom $classroom, UpdateAnnoucementRequest $request, Announcement $announcement)
    {
        $announcement->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return response([
            'message' => 'assignment updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom, Announcement $announcement)
    {
        // $announcement->delete();
        $classroom->announcements()->findOrFail($announcement->id)->delete();

        return response([
            'message' => 'assignment deleted'
        ], 200);
    }
}
