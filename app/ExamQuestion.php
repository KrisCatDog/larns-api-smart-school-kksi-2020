<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $guarded = [];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function examQuestionAnswers()
    {
        return $this->hasMany(ExamQuestionAnswer::class);
    }

    public function delete()
    {
        $this->examQuestionAnswers()->delete();

        return parent::delete();
    }
}
