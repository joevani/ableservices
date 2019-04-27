<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Validator;
use Auth;

class MemoController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

  public function index() {

    $type     =  Auth::user()->user_type;

    if( $type =='management' ) {

            $memo  = DB::table('memo')
                        ->orderBy('id','desc')
                        ->paginate(10);

                return view('memo.index',compact('memo'));
    }
    else {
          $memo  = DB::table('memo')
                      ->where('user_id',Auth::user()->id)
                      ->orderBy('id','desc')
                      ->paginate(10);

                    return view('memo.index',compact('memo'));

    }


  }

  public function create() {


    $users = DB::table('users')
                  ->where('user_type','<>','client')
                  ->get();

          return view('memo.create',compact('users'));
  }

  public function store(Request $request) {

      $subject    = $request->input('subject');
      $user_id    = $request->input('user_id');
      $content    = $request->input('content');

      DB::table('memo')
              ->insert([
                        'user_id'   => $user_id,
                        'subject'   => $subject,
                        'content'   => $content
                    ]);

      return redirect()->back()->with("status", "Memo Submitted");
  }
}