<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'started_at',
        'ended_at',
    ];

    public function setStartedAtAttribute($startedAt)
    {
        $this->attributes['started_at'] =  Carbon::parse(now()->format('Y-m-d') . ' ' . $startedAt);
    }

    public function setEndedAtAttribute($endedAt)
    {
        $this->attributes['ended_at'] =  Carbon::parse(now()->format('Y-m-d') . ' ' . $endedAt);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function attendanceResponds()
    {
        return $this->hasMany(AttendanceRespond::class);
    }

    public function delete()
    {
        $this->attendanceResponds()->delete();

        return parent::delete();
    }
}
