<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    protected $guarded = [];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questionSubanswers()
    {
        return $this->hasMany(QuestionSubanswer::class);
    }

    public function delete()
    {
        $this->questionSubanswers()->delete();

        return parent::delete();
    }
}
