<?php

namespace App\Models;

use App\User;

class Course extends BasicModel
{

    protected $hidden = ["created_at", "updated_at", "instructor_id", "topic_id", 'pivot'];
    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function lectures ()
    {
        return $this->hasMany(Video::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_course');
    }
}
