<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sub_category extends Model
{

    public function parent_category(){

        return $this->belongsTo('App\Categorie', 'category_id');

    }

}
