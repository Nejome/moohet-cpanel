<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    public function product(){

        return $this->belongsTo('App\Product');

    }

    public function customers_orders(){

        return $this->hasMany('App\Customer_order');

    }

}
