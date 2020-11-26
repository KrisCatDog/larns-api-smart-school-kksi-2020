<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassVideoComment extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classVideo()
    {
        return $this->belongsTo(ClassVideo::class);
    }

    public function classVideoSubcomments()
    {
        return $this->hasMany(ClassVideoSubcomment::class);
    }

    public function delete()
    {
        $this->classVideoSubcomments()->delete();

        return parent::delete();
    }
}
