<?php

namespace App;

class Order extends Model
{
    public function service(){
        return $this->belongsTo(Service::class);
    }
}
