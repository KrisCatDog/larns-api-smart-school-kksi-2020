<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Classroom;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Http\Resources\Attendance as AttendanceResource;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function index(Classroom $classroom)
    {
        return AttendanceResource::collection($classroom->attendances);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Classroom $classroom, StoreAttendanceRequest $request)
    {

        $request->validated();

        Attendance::create([
            'started_at' => $request->started_at,
            'ended_at' => $request->ended_at,
            'classroom_id' => $classroom->id,
            'user_id' => 1
        ]);
        
        return response([
            'message' => 'data saved'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom, Attendance $attendance)
    {
        return new AttendanceResource($classroom->attendances()->findOrFail($attendance->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Http\Requests\UpdateAttendanceRequest  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Classroom $classroom, UpdateAttendanceRequest $request, Attendance $attendance)
    {
        $attendance->update([
            'started_at' => $request->started_at,
            'ended_at' => $request->ended_at
        ]);
        
        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $classroom
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom, Attendance $attendance)
    {
        // $attendance->delete();
        $classroom->attendances()->findOrFail($attendance->id)->delete();
        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
