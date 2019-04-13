<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    public function sub_categories(){

        return $this->hasMany('App\sub_category', 'category_id');

    }

    public function active_sub_categories(){

        return $this->hasMany('App\sub_category', 'category_id')->where('active', 1)->get();

    }

}
