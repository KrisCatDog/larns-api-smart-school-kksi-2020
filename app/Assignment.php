<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $guarded = [];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function assignmentAttachments()
    {
        return $this->hasMany(AssignmentAttachment::class);
    }

    public function assignmentResults()
    {
        return $this->hasMany(AssignmentResult::class);
    }

    public function delete()
    {
        $this->assignmentAttachments()->delete();
        $this->assignmentResults()->delete();

        return parent::delete();
    }
}
