<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use app\User;
use Validator;
use Hash;
class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function index() {
        return view('users.index');
  }

  public function userlist() {
            $users = DB::table('users')->get();
            return response()->json($users);
  }

  public function registerUser(Request $request){
      $validator = Validator::make($request->all(), [
                'name'              => 'required',
                'email'             => 'required|unique:users',
                'username'          => 'required|unique:users',
                'user_type'         => 'required'
            ]);
            $plain_password = str_random(8);
            $password = Hash::make($plain_password);
            $response = ['message' => 'Something went wrong','type' => 'error'];

            if ($validator->fails()) {

                  $response = ['message' => $validator->messages()->first(),'type' => 'error'];

            } else {
                    $users = new User();
                    $users->name        = $request->input('name');
                    $users->username    = $request->input('username');
                    $users->email       = $request->input('email');
                    $users->user_type   = $request->input('user_type');
                    $users->password    = $password;
                    if( $users->save() ) {
                            $response = ['message' => 'New user has beed added with password : ' . $plain_password,'type' => 'success'];
                    }
                    else {
                          $response = ['message' => 'Something went wrong','type' => 'error'];

                    }

            }

            return response()->json($response, 200);
  }

  public function getUserinfo(Request $request) {

      $userinfo = DB::table('users')
                      ->where('id' ,$request->input('id'))
                      ->get();

      return response()->json($userinfo);

  }

  public function superVisorsView() {

        return view('users.supervisor');
  }
  public function teamleadersView() {

        return view('users.teamlead');
  }
  public function superVisors() {

      $supersVisors = DB::table('users')
                                ->where('user_type','supervisor')
                                ->get();

    return response()->json($supersVisors);
  }

  public function superVisorsMember(Request $request) {

      $supersVisorMembers = DB::table('supervisor_members')
                                ->join('users','supervisor_members.teamlead_userid','=','users.id')
                                ->where('supervisor_members.supervisor_userid',$request->input('id'))
                                ->select('users.*','supervisor_members.id as sv_id')
                                ->get();

    return response()->json($supersVisorMembers);
  }
  public function teamleadMember(Request $request) {

      $teamleadMember = DB::table('team_lead_members')
                                ->join('users','team_lead_members.worker_userid','=','users.id')
                                ->where('team_lead_members.teamlead_userid',$request->input('id'))
                                ->select('users.*','team_lead_members.id as sv_id')
                                ->get();

    return response()->json($teamleadMember);
  }
  public function teamleaders() {

      $teamlead = DB::table('users')
                        ->where('user_type','team lead')
                        ->get();

    return response()->json($teamlead);
  }
  public function workers() {

      $workers = DB::table('users')
                        ->where('user_type','worker')
                        ->get();

    return response()->json($workers);
  }

  public function teamcount(Request $request) {

    $count = DB::table('supervisor_members')
                      ->where('supervisor_userid',$request->input('id'))
                      ->count('teamlead_userid');
      return response()->json($count);

  }
  public function assignWorker(Request $request) {

    $validator = Validator::make($request->all(), [
              'teamlead_userid'     => 'required',
              'worker_userid'          => 'required|unique:team_lead_members',
          ]);


          if ($validator->fails()) {

                $response = ['message' => $validator->messages()->first(),'type' => 'error'];

          } else {
              DB::table('team_lead_members')
                ->insert([
                              'worker_userid'  => $request->input('worker_userid'),
                              'teamlead_userid'    => $request->input('teamlead_userid')
                          ]);
              $response = ['message' => 'New assignment submitted','type' => 'success'];

          }
      return response()->json($response, 200);
  }
  public function assign(Request $request) {

    $validator = Validator::make($request->all(), [
              'supervisor_userid'              => 'required',
              'teamlead_userid'          => 'required|unique:supervisor_members',
          ]);

          if ($validator->fails()) {

                $response = ['message' => $validator->messages()->first(),'type' => 'error'];

          } else {
              DB::table('supervisor_members')
                ->insert([
                            'supervisor_userid'  => $request->input('supervisor_userid'),
                            'teamlead_userid'    => $request->input('teamlead_userid')
                          ]);
              $response = ['message' => 'New assignment submitted','type' => 'success'];
          }
      return response()->json($response, 200);
  }
  public function remove(Request $request) {

              DB::table('supervisor_members')
                ->where('teamlead_userid',$request->input('id'))
                ->delete();
            $response = ['message' => 'Member has been removed','type' => 'success'];


      return response()->json($response, 200);
  }
  public function workerss() {

    $users = DB::table('team_lead_members')
                              ->join('users','team_lead_members.worker_userid','=','users.id')
                              ->where('team_lead_members.teamlead_userid',Auth::user()->id)
                              ->select('users.*','team_lead_members.id as sv_id')
                              ->get();

            return view('users.workers',compact('users'));
  }

}
