<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentResult extends Model
{
    protected $guarded = [];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAttachmentFileAttribute($attachmentFile)
    {
        return asset('storage/' . $attachmentFile);
    }
}
