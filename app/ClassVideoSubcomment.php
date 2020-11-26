<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassVideoSubcomment extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classVideoComment()
    {
        return $this->belongsTo(ClassVideoComment::class);
    }
}
