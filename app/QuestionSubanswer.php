<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSubanswer extends Model
{
    protected $guarded = [];

    public function questionAnswer()
    {
        return $this->belongsTo(QuestionAnswer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
