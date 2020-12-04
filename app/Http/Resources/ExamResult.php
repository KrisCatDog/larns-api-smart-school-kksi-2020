<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamResult extends JsonResource
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
            'exam_id' => $this->exam_id,
            'user_id' => $this->user_id,
            'total_true_answer' => $this->total_true_answer,
            'total_wrong_answer' => $this->total_wrong_answer,
            'score' => $this->score,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at
        ];
    }
}
