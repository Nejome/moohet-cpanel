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

    public function order(){

        return $this->belongsTo('App\Order');

    }

    public function customer_order(){

        return $this->belongsTo('App\Customer_order');

    }

}
