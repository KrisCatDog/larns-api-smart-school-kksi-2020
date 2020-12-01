<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    public function assignmentResults()
    {
        return $this->hasMany(AssignmentResult::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function attendanceResponds()
    {
        return $this->hasMany(AttendanceRespond::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function questionAnswers()
    {
        return $this->hasMany(QuestionAnswer::class);
    }

    public function questionSubanswers()
    {
        return $this->hasMany(QuestionSubanswer::class);
    }

    public function annoucementComments()
    {
        return $this->hasMany(AnnouncementComment::class);
    }

    public function classVideoComments()
    {
        return $this->hasMany(ClassVideoComment::class);
    }

    public function classVideoSubcomments()
    {
        return $this->hasMany(ClassVideoSubcomment::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }
}
