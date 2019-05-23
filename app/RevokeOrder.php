<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RevokeOrder extends Model
{

    public function customer() {

        return $this->belongsTo('App\Customer');

    }

    public function showed(){

        $this->showed = 1;
        $this->save();

    }

    public function revoke_operation() {

        return $this->hasOne('App\RevokeOperation');

    }

}
