<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale_operation extends Model
{

    public function product(){

        return $this->belongsTo('App\Product');

    }

}
