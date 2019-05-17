<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    public function product(){

        return $this->belongsTo('App\Product');

    }

    public function customer(){

        return $this->belongsTo('App\Customer');

    }

}
