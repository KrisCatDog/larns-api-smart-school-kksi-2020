<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Http\Requests\JoinClassRequest;
use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Http\Resources\Classroom as ClassroomResource;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role->name === "Teacher") {
            return ClassroomResource::collection(auth()->user()->classrooms()->latest()->get());
        }

        return ClassroomResource::collection(auth()->user()->classroomsJoined()->orderBy('classroom_user.created_at')->get());
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
            ['user_id' => auth()->id(), 'uuid' => Uuid::uuid4(), 'join_code' => Str::random(6)],
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
        $classroom->update($request->validated());

        return new ClassroomResource($classroom);
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

    public function joinClass(JoinClassRequest $request)
    {
        $data = $request->validated();

        $classroom = Classroom::where('join_code', $data['join_code'])->firstOrFail();

        $classroom->members()->attach(auth()->user());

        return new ClassroomResource($classroom);
    }
}
