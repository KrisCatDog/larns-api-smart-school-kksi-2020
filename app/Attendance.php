<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
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
