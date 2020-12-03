<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceRespond extends JsonResource
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
            'attendance_id' => $this->attendance_id,
            'user' => new User($this->user),
            'status' => $this->status,
            'created_at' => $this->created_at->toDayDateTimeString(),
            'updated_at' => $this->updated_at
        ];
    }
}
