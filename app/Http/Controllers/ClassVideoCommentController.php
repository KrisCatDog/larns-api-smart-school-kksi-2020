<?php

namespace App\Http\Controllers;

use App\ClassVideo;
use App\ClassVideoComment;
use App\Http\Requests\StoreClassVideoCommentRequest;
use App\Http\Requests\UpdateClassVideoCommentRequest;
use App\Http\Resources\ClassVideoComment as ClassVideoCommentResource;


class ClassVideoCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\ClassVideo  $classVideo
     * @return \Illuminate\Http\Response
     */
    public function index(ClassVideo $classVideo)
    {
        return ClassVideoCommentResource::collection($classVideo->classVideoComments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\ClassVideo  $classVideo
     * @param  \App\Http\Requests\StoreClassVideoCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassVideo $classVideo, StoreClassVideoCommentRequest $request)
    {
        ClassVideoComment::create([
            'comment' => $request->comment,
            'class_video_id' => $classVideo->id,
            'user_id' => 1
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassVideo  $classVideo
     * @param  \App\ClassVideoComment  $classVideoComment
     * @return \Illuminate\Http\Response
     */
    public function show(ClassVideo $classVideo, ClassVideoComment $classVideoComment)
    {
        return new ClassVideoCommentResource($classVideo->classVideoComments()->findOrFail($classVideoComment->id));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\ClassVideo  $classVideo
     * @param  \App\Http\Requests\UpdateClassVideoCommentRequest  $request
     * @param  \App\ClassVideoComment  $classVideoComment
     * @return \Illuminate\Http\Response
     */
    public function update(ClassVideo $classVideo, UpdateClassVideoCommentRequest $request, ClassVideoComment $classVideoComment)
    {
        $classVideoComment->update([
            'comment' => $request->comment
        ]);

        return response([
            'message' => 'data updated'
        ], 200);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassVideo  $classVideo
     * @param  \App\ClassVideoComment  $classVideoComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassVideo $classVideo, ClassVideoComment $classVideoComment)
    {
        $classVideo->classVideoComments()->findOrFail($classVideoComment->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
