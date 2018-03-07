<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sys_user extends Model
{
    protected $table = 'sys_user';

    public function tg()
    {
    	return $this->hasMany('App\tbl_tg', 'usr_id', 'usr_id');
    }
}
