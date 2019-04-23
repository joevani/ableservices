<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;
use DB;
class AuthController extends Controller
{
  public function __construct()
  {
      //$this->middleware('auth');
  }


  public function postLogin(Request $request) {
      $username = $request->input('username');
      $password = $request->input('password');
      $userCount = DB::table('users')
                          ->where('username',$username)
                          ->count('id');
        if($userCount > 0) {
          $user_id = DB::table('user_registration')
                            ->where('username',$username)
                            ->where('password',$password)

                    Auth::loginUsingId($user_id);



                 return redirect()->intended('dashboard');
        }

        else {
            return back()->with(['message' => 'Invalid Login']);
        }


}
}
