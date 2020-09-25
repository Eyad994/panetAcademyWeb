<?php

namespace App\Models;

class University extends BasicModel
{
    protected $hidden = ["created_at", "updated_at"];
   /* protected $appends = ['logo'];

    public function getLogoAttribute($value)
    {
        return env('APP_URL'). '/images/university/' . $this->image;
    }*/

   public function majors()
   {
       return $this->hasMany(Major::class, 'university_id', 'id');
   }
}
