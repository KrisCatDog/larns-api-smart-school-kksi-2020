<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Exam extends JsonResource
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
            'exam_type_id' => $this->exam_type_id,
            'classroom_id' => $this->classroom_id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'description' => $this->description,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at
        ];
    }
}
