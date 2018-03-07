<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_tg extends Model
{
     protected $table = 'tbl_tg';

     public function user()
{
    return $this->belongsTo('App\sys_user', 'usr_id','usr_id');
}
   public function tg_type()
{
    return $this->belongsTo('App\tg_type', 'tg_type_id','tg_type_id');
}
}
