<?php


namespace Hillel\Model;


use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function category()
    {
    return $this->belongsTo(category::class);
     }

     public function tags()
     {
         return $this->belongsToMany(tag::class)->withTimestamps();
     }


}