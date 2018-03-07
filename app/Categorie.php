<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
      public function comment(){
        return $this->belongsTo('App\comment');
    }
}
