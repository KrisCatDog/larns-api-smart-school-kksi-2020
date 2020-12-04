<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignmentAttachment extends JsonResource
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
            'assignment_id' => $this->assignment_id,
            'attachment_file' => $this->attachment_file,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at
        ];
    }
}
