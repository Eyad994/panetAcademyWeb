<?php

namespace App\Models;

class Topic extends BasicModel
{
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
