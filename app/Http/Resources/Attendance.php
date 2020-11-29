<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Attendance extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'classroom_id' => $this->classroom_id,
            'user_id' => $this->user_id,
            'started_at' => $this->started_at->format('H:i'),
            'ended_at' => $this->ended_at->format('H:i'),
            'attendance_responds' => AttendanceRespond::collection($this->attendanceResponds),
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at
        ];
    }
}
