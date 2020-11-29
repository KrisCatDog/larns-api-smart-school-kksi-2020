<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Announcement extends JsonResource
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
            'classroom_id' => $this->classroom_id,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at
        ];
    }
}
