<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceRespond extends Model
{
    protected $guarded = [];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
