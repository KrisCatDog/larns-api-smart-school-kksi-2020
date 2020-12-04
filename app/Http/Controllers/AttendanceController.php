<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Classroom;
use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Http\Resources\Attendance as AttendanceResource;
use App\Mail\NewAttendanceMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

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
        return AttendanceResource::collection($classroom->attendances()->latest()->get());
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
        $attendance =  $classroom->attendances()->create(array_merge(
            $request->validated(),
            ['user_id' => auth()->id()],
        ));

        foreach ($classroom->members as $member) {
            Mail::to($member->email)->send(new NewAttendanceMail(
                $attendance->created_at->toFormattedDateString(),
                $member->name,
                $classroom
            ));
        }

        return new AttendanceResource($attendance);
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
        return new AttendanceResource($attendance);
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
        $attendance->update($request->validated());

        return new AttendanceResource($attendance);
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
