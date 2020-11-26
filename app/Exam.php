<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = [];

    public function examType()
    {
        return $this->belongsTo(ExamType::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function examQuestions()
    {
        return $this->hasMany(ExamQuestion::class);
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function delete()
    {
        $this->examQuestions()->delete();
        $this->examResults()->delete();

        return parent::delete();
    }
}
