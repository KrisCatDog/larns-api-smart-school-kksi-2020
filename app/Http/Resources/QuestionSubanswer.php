<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionSubanswer extends JsonResource
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
            'question_answer_id' => $this->question_answer_id,
            'user_id' => $this->id,
            'subanswer' => $this->subanswer,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at
        ];
    }
}
