<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamQuestionAnswer extends Model
{
    protected $guarded = [];

    public function examQuestions()
    {
        return $this->belongsTo(ExamQuestion::class);
    }

}
