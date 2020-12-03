<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentResult extends JsonResource
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
            'user' => new User($this->user),
            'attachment_file' => $this->attachment_file,
            'file_name' => explode('/', $this->attachment_file)[6],
            'score' => $this->score,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at,
        ];
    }
}
