<?php


namespace Hillel\Model;


use Illuminate\Database\Eloquent\Model;

class category extends Model {

    public function posts(){
        return $this->hasMany(post::class);
    }

}