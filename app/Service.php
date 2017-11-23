<?php

namespace App;

class Service extends Model
{
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
