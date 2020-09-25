<?php

namespace App\Models;

class Instructor extends BasicModel
{
    protected $hidden = ["created_at", "updated_at", "university_id", "major_id"];

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id');
    }
}
