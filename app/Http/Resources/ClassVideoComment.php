<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassVideoComment extends JsonResource
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
            'user_id' => $this->user_id,
            'class_video_id' => $this->class_video_id,
            'comment' => $this->comment,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at
        ];
    }
}
