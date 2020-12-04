<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\ClassVideo;
use App\Http\Requests\StoreClassVideoRequest;
use App\Http\Requests\UpdateClassVideoRequest;
use App\Http\Resources\ClassVideo as ClassVideoResource;
use App\Mail\NewVideoMail;
use Illuminate\Support\Facades\Mail;

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
        $classVideo = $classroom->classVideos()->create(array_merge(
            $request->validated(),
            ['attachment_video' => $request->attachment_video->store('uploads/attachments', 'public')]
        ));

        foreach ($classroom->members as $member) {
            Mail::to($member->email)->send(new NewVideoMail(
                $classVideo->title,
                $member->name,
                $classroom
            ));
        }

        return new ClassVideoResource($classVideo);
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
        return new ClassVideoResource($classVideo);
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
        $classVideo->update($request->validated());

        return new ClassVideoResource($classVideo);
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
