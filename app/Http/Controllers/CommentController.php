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
use stdClass;
class CommentController extends Controller
{
	
    public function __construct()
    {
        $this->middleware('auth');
    }	

     public function home()
     {
     	// $comments=User::whereHas('comment')->get();
      //   $comment2=comment::with('categorie')->get();
      //   $cat=Categorie::with('comment')->get();
        $tg=tbl_tg::with('user','tg_type')->where('usr_id','=','A3456739')->get();
     	// foreach ($comments as $key => $comment) {
     	// 	 foreach ($comment->comment as $key1 => $value) {
     		
     	// 	   }
     	// 	$pre=new stdClass();
      //       $pre->name=$comment->name;
      //       $pre->y=$key1+1;
      //       $pie[]=$pre;
     	// }
     	  	
            // return $tg;
     	return view('home2');
     }

     public function addComment(Request $request)
    {
    	  if(!empty($request['id'])){
    	  		$id=$request['id'];
                $applicant=comment::find($id);
        }
        else{
        	 $applicant = new comment;
        }
       
        $applicant->description = $request->note;
        $applicant->author = $request->nama;
        $applicant->user_id=Auth::user()->id;
        $applicant->categorie_id=$request->categorie;

         if ($applicant->save())
         {    
           if(!empty($request['id'])){
            Flash::warning('Comment has been edited');
        } else{
          Flash::info('Comment has been added');
        }
         	   
         }
        return redirect() -> route('home');
    }

    public function deleteComment(Request $request)
    {	$id=$request['id'];
    	$comment=comment::find($id);
    	$comment->delete();
    	Flash::success('Comment has been deleted');
    	return redirect() -> route('home');
    }

    public function findComment()
    {
    	 $comment = comment::with('user','categorie');
       // if(!empty($request['specialize_0'])){
       //          $sp0= $request['specialize_0'];
       //           $specialize->where('specialized','!=',$sp0);
       //  }
       //  if(!empty($request['specialize_1'])){
       //          $sp1= $request['specialize_1'];
       //           $specialize->where('specialized','!=',$sp1);
       //  }
       //  if(!empty($request['specialize_2'])){
       //          $sp2= $request['specialize_2'];
       //           $specialize->where('specialized','!=',$sp2);
       //  }
       //  if(!empty($request['specialize_3'])){
       //          $sp3= $request['specialize_3'];
       //           $specialize->where('specialized','!=',$sp3);
       //  }
        
        	$comment=$comment->get();
           $res=new stdClass();
           $res->data=$comment;
    return json_encode($res);
    }
      public function pieChart()
     {
     	$comments=User::whereHas('comment')->get();
     	foreach ($comments as $key => $comment) {
     		foreach ($comment->comment as $key1 => $value) {
     		
     		}
     		$pre=new stdClass();
            $pre->name=$comment->name;
            $pre->y=$key1+1;
            $pie[]=$pre;
     	}
     	  	
            // return $comments;
     	return json_encode($pie);
     }
       public function findTg(Request $request)
    {
       $data = tbl_tg::with('user','tg_type');
              if(!empty($request['name'])){
                $name= $request['name'];
                $data->whereHas('user', function($query) use ($name) {
            $query->where('usr_fullname', 'like', '%'.$name.'%');
        });
               }
              if(!empty($request['ic'])){
                $ic= $request['ic'];
                $data->where('usr_id','=',$ic);
           }
              if(!empty($request['licenseno'])){
                $licenseno= $request['licenseno'];
                $data->where('tg_no_lesen','=',$licenseno);
           }
           $data->whereHas('user');
        // $datatables =  Datatables::eloquent($data);

        // $datatables   ->addIndexColumn()
        //     ->addColumn('action', function ($data) {
                
        //             $list = '<a class="btn btn-info btn-xs btn-rounded edit" data-tooltip="true" data-placement="bottom" title="View"  ><i class="fa fa-eye fa-2x"></i></a>';
                                
        //         $buttons = $list;
        //         return $buttons;
               
        //     });
     // $base = new DataTableBase($data, $datatables);
     //        return $base->render(null);
           ini_set('memory_limit', '-1');
          $tg=$data->get();
           $res=new stdClass();
           $res->data=$tg;
    return json_encode($res);
    }

}
