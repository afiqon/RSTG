<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comment;
use App\Categorie;
use Auth;
use App\User;
use App\tbl_tg;
use App\sys_user;
use Flash;
use App\DataTables\DataTableBase;
use DataTables;
use stdClass;

class TGController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }	

    public function TourismGuide()
    {
    	$tg=tbl_tg::with('user','tg_type');
    	ini_set('memory_limit', '-1');
    	  $columns = [  
                          ['data'=>'usr_id','title'=>'BIL'],
                          ['data'=>'usr_id','title'=>'NO RUJUKAN ISNM'], 
                          ['data'=>'usr_id','title'=>'NAMA PROGRAM'],
                    
                      ];
    	return $datatables =  DataTables::eloquent($tg);
    	return view('TourismGuide');
    }

}
