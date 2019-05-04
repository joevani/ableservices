<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class NotificationController extends Controller
{
  public function __construct(){
        $this->middleware('auth');
  }

  public function getMessage(Request $request) {


    $feed = DB::table('feedbacks')->where('user_id',Auth::user()->id)->where('is_read',0)->count('id');
    $feeds = DB::table('feedbacks')->where('is_read',0)->count('id');

    return response()->json(['feed'=>$feed ,'feeds' => $feeds]);
  }

  public function getChat() {

    $message = DB::table('reply')->where('user_id',Auth::user()->id)->where('status',0)->count('id');
    $chat = DB::table('chat')->where('to_user',Auth::user()->id)->count('id');

    return response()->json(['chat'=>$chat ,'message' => $message]);

  }
  public function getMemo() {

    $memo =DB::table('memo')->where('user_id',Auth::user()->id)->where('is_read',0)->count('id');

    return response()->json(['memo'=>$memo ]);

  }
}
