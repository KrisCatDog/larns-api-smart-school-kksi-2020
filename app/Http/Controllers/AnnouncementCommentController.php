<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\AnnouncementComment;
use App\Http\Requests\StoreAnnoucementCommentRequest;
use App\Http\Requests\UpdateAnnoucementCommentRequest;
use App\Http\Resources\AnnouncementComment as AnnouncementCommentResource;

class AnnouncementCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Annoucement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function index(Announcement $announcement)
    {
        return AnnouncementCommentResource::collection($announcement->announcementComments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Annoucement  $announcement
     * @param  \App\Http\Requests\StoreAnnoucementCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Announcement $announcement, StoreAnnoucementCommentRequest $request)
    {        
        $request->validated();

        AnnouncementComment::create([
            'comment' => $request->comment,
            'announcement_id' => $announcement->id,
            'user_id' => 1
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Annoucement  $announcement
     * @param  \App\AnnouncementComment  $announcementComment
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement, AnnouncementComment $announcementComment)
    {
        return new AnnouncementCommentResource($announcement->announcementComments()->findOrFail($announcementComment->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Annoucement  $announcement
     * @param  \App\Http\Requests\UpdateAnnoucementCommentRequest  $request
     * @param  \App\AnnouncementComment  $announcementComment
     * @return \Illuminate\Http\Response
     */
    public function update(Announcement $announcement, UpdateAnnoucementCommentRequest $request, AnnouncementComment $announcementComment)
    {
        $request->validated();
        
        $announcementComment->update([
            'comment' => $request->comment
        ]); 

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Annoucement  $announcement
     * @param  \App\AnnouncementComment  $announcementComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement, AnnouncementComment $announcementComment)
    {        
        $announcement->announcementComment()->findOrFail($announcementComment->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
