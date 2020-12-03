<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\ClassVideo;
use App\Http\Requests\StoreClassVideoRequest;
use App\Http\Requests\UpdateClassVideoRequest;
use App\Http\Resources\ClassVideo as ClassVideoResource;

class ClassVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function index(Classroom $classroom)
    {
        return ClassVideoResource::collection($classroom->classVideos()->latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\StoreClassVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Classroom $classroom, StoreClassVideoRequest $request)
    {
        ClassVideo::create([
            'title' => $request->title,
            'description' => $request->description,
            'attachment_video' => $request->attachment_video->store('uploads/attachments', 'public'),
            'classroom_id' => $classroom->id,
        ]);

        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\ClassVideo  $classVideo
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom, ClassVideo $classVideo)
    {
        return new ClassVideoResource($classroom->classVideos()->findOrFail($classVideo->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\UpdateClassVideoRequest  $request
     * @param  \App\ClassVideo  $classVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Classroom $classroom, UpdateClassVideoRequest $request, ClassVideo $classVideo)
    {
        $classVideo->update([
            'title' => $request->title,
            'description' => $request->description,
            'attachment_video' => $request->attachment_video
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\ClassVideo  $classVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom, ClassVideo $classVideo)
    {
        $classroom->classVideos()->findOrFail($classVideo->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
