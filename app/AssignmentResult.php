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
        return [
        	'assignment_id' => $this->assignment_id,
        	'user_id' => $this->user_id,
        	'attachment_file' => $this->attachment_file,
        	'score' => $this->score,
        	'created_at' => $this->created_at,
        	'updated_at' => $this->updated_at
        ];
    }
}
