<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payTabs_transaction extends Model
{

    public function customer(){

        return $this->belongsTo('App\Customer');

    }

}
