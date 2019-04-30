<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_order extends Model
{

    public function order(){

        return $this->belongsTo('App\Order');

    }

    public function customer(){

        return $this->belongsTo('App\Customer');

    }

}
