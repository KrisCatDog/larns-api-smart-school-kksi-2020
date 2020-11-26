<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementComment extends Model
{
    protected $guarded = [];

    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
