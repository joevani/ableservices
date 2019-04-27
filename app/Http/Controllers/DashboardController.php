<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class DashboardController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index() {


    $type=  Auth::user()->user_type;

    if( $type =='management' ) {

            $news  = DB::table('news')
                        ->orderBy('id','desc')
                        ->paginate(10);

            return view('dashboard.index',compact('news'));
    }
    else {
          if( $type == 'supervisor' ) {

                $news = DB::table('news')
                            ->where('supervisor_can_see',1)
                            ->orderBy('id','desc')
                            ->paginate(10);
          }
          else if( $type == 'team lead') {

                $news = DB::table('news')
                            ->where('teamlead_can_see',1)
                            ->orderBy('id','desc')
                            ->paginate(10);
          }
          else if($type == 'worker') {
            $news = DB::table('news')
                        ->where('worker_can_see',1)
                        ->orderBy('id','desc')
                        ->paginate(10);
          }
          else if($type == 'client') {
            $news = DB::table('news')
                        ->where('client_can_see',1)
                        ->orderBy('id','desc')
                        ->paginate(10);
          }

        return view('dashboard.index',compact('news'));
    }


  }


}
