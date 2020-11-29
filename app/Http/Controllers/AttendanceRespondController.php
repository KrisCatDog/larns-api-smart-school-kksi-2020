<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\AttendanceRespond;
use App\Http\Requests\StoreAttendanceRespondRequest;
use App\Http\Requests\UpdateAttendanceRespondRequest;
use App\Http\Resources\AttendanceRespond as AttendanceRespondResource;

class AttendanceRespondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function index(Attendance $attendance)
    {
        return AttendanceRespondResource::collection($attendance->attendanceResponds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Attendance  $attendance
     * @param  \App\Http\Requests\StoreAttendanceRespondRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Attendance $attendance, StoreAttendanceRespondRequest $request)
    {
        return new AttendanceRespondResource($attendance->attendanceResponds()->create(array_merge(
            $request->validated(),
            ['user_id' => auth()->id()]
        )));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @param  \App\AttendanceRespond  $attendanceRespond
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance, AttendanceRespond $attendanceRespond)
    {
        // return new AttendanceRespondResource($attendanceRespond);
        return new AttendanceRespondResource($attendance->attendanceResponds()->findOrFail($attendanceRespond->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Attendance  $attendance
     * @param  \App\Http\Requests\UpdateAttendanceRespondRequest  $request
     * @param  \App\AttendanceRespond  $attendanceRespond
     * @return \Illuminate\Http\Response
     */
    public function update(Attendance $attendance, UpdateAttendanceRespondRequest $request, AttendanceRespond $attendanceRespond)
    {

        $request->validated();

        $attendanceRespond->update([
            'status' => $request->status
        ]);

        return response([
            'message' => 'data updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @param  \App\AttendanceRespond  $attendanceRespond
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance, AttendanceRespond $attendanceRespond)
    {
        // $attendanceRespond->delete();
        $attendance->attendanceResponds()->findOrFail($attendanceRespond->id)->delete();

        return response([
            'message' => 'data deleted'
        ], 200);
    }
}
