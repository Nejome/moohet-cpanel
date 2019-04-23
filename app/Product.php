<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function sub_category(){

        return $this->belongsTo('App\sub_category', 'sub_category_id');

    }

    public function images() {

        return $this->hasMany('App\Image', 'product_id');

    }


}
