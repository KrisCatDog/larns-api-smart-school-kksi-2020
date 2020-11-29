<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Http\Resources\Classroom as ClassroomResource;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClassroomResource::collection(Classroom::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassroomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassroomRequest $request)
    {
        return new ClassroomResource(Classroom::create(array_merge(
            $request->validated(),
            ['user_id' => auth()->id()]
        )));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return new ClassroomResource($classroom);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassroomRequest  $request
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        $classroom->update([
            'name' => $request->name,
            'major' => $request->major,
            'grade' => $request->grade
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
