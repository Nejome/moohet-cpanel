<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet_information extends Model
{

    public function customer(){

        return $this->belongsTo('App\Customer');

    }

}
