<?php

namespace App\Models;

class Video extends BasicModel
{
    protected $hidden = ["created_at", "updated_at", "course_id", "status"];

    public function getDurationAttribute()
    {
        $seconds = $this->attributes['duration'];
        $minutes = floor($seconds / 60);
        if ($minutes > 60)
        {
            $duration = gmdate("H:i:s", $seconds);
        } else {
            $duration = gmdate("i:s", $seconds);
        }
        return $duration;
    }
}
