<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function discussionQuestions()
    {
        return $this->hasMany(DiscussionQuestion::class);
    }

    public function classVideos()
    {
        return $this->hasMany(ClassVideo::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function delete()
    {
        $this->assignments()->delete();
        $this->announcements()->delete();
        $this->attendances()->delete();

        return parent::delete();
    }
}
