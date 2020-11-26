<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignmentAttachment extends Model
{
    protected $guarded = [];

    public function assignment()
    {
        return $this->belongsTo(Assignment::class);
    }
}
