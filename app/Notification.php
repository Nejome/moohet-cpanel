<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    public function showed() {

        $this->showed = 1;
        $this->save();

    }

}
