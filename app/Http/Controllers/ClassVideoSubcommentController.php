<?php

namespace App\Http\Controllers;

use App\ClassVideoComment;
use App\ClassVideoSubcomment;
use App\Http\Requests\StoreClassVideoSubcommentRequest;
use App\Http\Requests\UpdateClassVideoSubcommentRequest;
use App\Http\Resources\ClassVideoSubcomment as ClassVideoSubcommentResource;

class ClassVideoSubcommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\ClassVideoComment  $classVideoComment
     * @return \Illuminate\Http\Response
     */
    public function index(ClassVideoComment $classVideoComment)
    {
        return ClassVideoSubcommentResource::collection($classVideoComment->classVideoSubcomments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\ClassVideoComment  $classVideoComment
     * @param  \App\Http\Requests\StoreClassVideoSubcommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassVideoComment $classVideoComment, StoreClassVideoSubcommentRequest $request)
    {
        ClassVideoSubcomment::create([
            'subcomment' => $request->subcomment,
            'class_video_comment_id' => $classVideoComment->id,
            'user_id' => 1
        ]);

        return response([
            'message' => 'data saved'
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassVideoComment  $classVideoComment
     * @param  \App\ClassVideoSubcomment  $classVideoSubcomment
     * @return \Illuminate\Http\Response
     */
    public function show(ClassVideoComment $classVideoComment, ClassVideoSubcomment $classVideoSubcomment)
    {
        return new ClassVideoSubcommentResource($classVideoComment->classVideoSubcomments()->findOrFail($classVideoSubcomment->id));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\ClassVideoComment  $classVideoComment
     * @param  \App\Http\Requests\UpdateClassVideoSubcommentRequest  $request
     * @param  \App\ClassVideoSubcomment  $classVideoSubcomment
     * @return \Illuminate\Http\Response
     */
    public function update(ClassVideoComment $classVideoComment, UpdateClassVideoSubcommentRequest $request, ClassVideoSubcomment $classVideoSubcomment)
    {
        $classVideoSubcomment->update([
            'subcomment' => $request->subcomment
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassVideoComment  $classVideoComment
     * @param  \App\ClassVideoSubcomment  $classVideoSubcomment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassVideoComment $classVideoComment, ClassVideoSubcomment $classVideoSubcomment)
    {
        $classVideoComment->classVideoSubcomments()->findOrFail($classVideoSubcomment->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);


    }
}
