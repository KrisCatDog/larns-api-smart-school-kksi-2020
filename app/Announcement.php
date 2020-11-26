<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
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

    public function announcementComments()
    {
        return $this->hasMany(AnnouncementComment::class);
    }

       public function delete()
    {
        $this->announcementComments()->delete();

        return parent::delete();
    }
}
