<?php


namespace Hillel\Model;


use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
public function posts(){
    return $this->belongsToMany(post::static)->withTimestamps();
}


}