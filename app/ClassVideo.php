<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassVideo extends Model
{
    protected $guarded = [];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function classVideoComments()
    {
        return $this->hasMany(ClassVideoComment::class);
    }


    public function delete()
    {
        $this->classVideoComments()->delete();

        return parent::delete();
    }
}
