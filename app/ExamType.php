<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $guarded = [];

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
    
    public function delete()
    {
        $this->exams()->delete();

        return parent::delete();
    }
}
