<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Classroom;
use App\Http\Requests\StoreAnnoucementRequest;
use App\Http\Requests\UpdateAnnoucementRequest;
use App\Http\Resources\Announcement as AnnouncementResource;
use App\Mail\NewAnnouncementMail;
use Illuminate\Support\Facades\Mail;

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
        $announcement = $classroom->announcements()->create(array_merge(
            $request->validated(),
            ['user_id' => auth()->id()]
        ));

        foreach ($classroom->members as $member) {
            Mail::to($member->email)->send(new NewAnnouncementMail(
                $announcement->title,
                $member->name,
                $classroom
            ));
        }

        return new AnnouncementResource($announcement);
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
        return new AnnouncementResource($announcement);
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
        $announcement->update($request->validated());

        return new AnnouncementResource($announcement);
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
        $classroom->announcements()->findOrFail($announcement->id)->delete();

        return response([
            'message' => 'assignment deleted'
        ], 200);
    }
}
