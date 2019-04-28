<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Validator;
use Hash;

class ProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
                    ->where('user_type' ,'<>','client')
                    ->get();

          return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations =DB::table('locations')->get();
          return view('users.create',compact('locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username       = $request->input('username');
        $name           = $request->input('name');
        $email          = $request->input('email');
        $address        = $request->input('address');
        $dob            = $request->input('dob');
        $user_type      = $request->input('user_type');
        $photo          = $request->input('photo');

        $plain_password = str_random(8);
        $password = Hash::make($plain_password);
        $this->validate($request, [
                                    'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:285',
                                    'name'              => 'required',
                                    'email'             => 'required|unique:users',
                                    'username'          => 'required|unique:users',
                                    'user_type'         => 'required',
                                    'dob'               => 'required',
                                    'address'           => 'required',
                                ]);

          if( $request->hasFile('photo') ) {
                        $image            = $request->file('photo');
                        $names             = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath  = public_path('/capstone/Template/assets/images');
                        $image->move($destinationPath, $names);
                            DB::table('users')
                                    ->insert([
                                                'user_pic'    => $names,
                                                'username'    => $username,
                                                'email'       => $email,
                                                'name'        => $name,
                                                'user_type'   => $user_type,
                                                'dob'         => $dob,
                                                'address'     => $address,
                                                'password'    => $password
                                    ]);
                      return redirect()->back()->with("status", "Added Employee with password $plain_password");
                }
              return redirect()->back()->with("status", "Something went wrong");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $users = DB::table('users')
                  ->where('id',$id)
                  ->where('user_type' ,'<>','client')
                  ->first(['id',
                  'username'  ,
                  'email'    ,
                  'name'      ,
                  'user_type'   ,
                  'dob'       ,
                  'address'  ,]);

        return view('users.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $username       = $request->input('username');
      $name           = $request->input('name');
      $email          = $request->input('email');
      $address        = $request->input('address');
      $dob            = $request->input('dob');

      DB::table('users')
              ->where('id',$request->input('id'))
              ->update([
                          'username'    => $username,
                          'email'       => $email,
                          'name'        => $name,
                          'dob'         => $dob,
                          'address'     => $address
              ]);
            return redirect()->back()->with("status", "Employee info has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function clients()
    {
      $users = DB::table('users')
                  ->where('user_type' ,'=','client')
                  ->get();

        return view('users.clientlist',compact('users'));
    }
    public function createClient()
    {
        $locations =DB::table('locations')->get();
          return view('users.client',compact('locations'));
    }
    public function storeClient(Request $request)
    {
        $username       = $request->input('username');
        $name           = $request->input('name');
        $email          = $request->input('email');
        $address        = $request->input('address');
        $dob            = $request->input('dob');
        $user_type      = $request->input('user_type');
        $photo          = $request->input('photo');
        $company         = $request->input('company');

        $plain_password = str_random(8);
        $password = Hash::make($plain_password);
        $this->validate($request, [
                                    'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:285',
                                    'name'              => 'required',
                                    'email'             => 'required|unique:users',
                                    'username'          => 'required|unique:users',
                                    'user_type'         => 'required',
                                    'dob'               => 'required',
                                    'address'           => 'required',
                                    'company'           => 'required',
                                ]);

          if( $request->hasFile('photo') ) {
                        $image            = $request->file('photo');
                        $names             = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath  = public_path('/capstone/Template/assets/images');
                        $image->move($destinationPath, $names);
                            DB::table('users')
                                    ->insert([
                                                'user_pic'    => $names,
                                                'username'    => $username,
                                                'email'       => $email,
                                                'name'        => $name,
                                                'user_type'   => $user_type,
                                                'dob'         => $dob,
                                                'address'     => $address,
                                                'password'    => $password,
                                                'company'    => $company
                                    ]);
                      return redirect()->back()->with("status", "Added Client with password $plain_password");
                }
              return redirect()->back()->with("status", "Something went wrong");
    }
    public function showClient($id)
    {
      $users = DB::table('users')
                  ->where('id',$id)
                  ->where('user_type' ,'=','client')
                  ->first(['id',
                  'username'  ,
                  'email'    ,
                  'name'      ,
                  'user_type'   ,
                  'dob'       ,
                  'address'  ,
                'company']);

        return view('users.clientshow',compact('users'));
    }

    public function updateClient(Request $request)
    {
      $username       = $request->input('username');
      $name           = $request->input('name');
      $email          = $request->input('email');
      $address        = $request->input('address');
      $dob            = $request->input('dob');
      $company            = $request->input('company');

      DB::table('users')
              ->where('id',$request->input('id'))
              ->update([
                          'username'    => $username,
                          'email'       => $email,
                          'name'        => $name,
                          'dob'         => $dob,
                          'address'     => $address,
                          'company'     => $company
              ]);
            return redirect()->back()->with("status", "Client info has been updated");
    }

    public function myProfile(){
      return view('users/profile');
    }

    public function updatePhoto(Request $request) {

      $this->validate($request, [
                                  'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:285',
                              ]);

                      if( $request->hasFile('photo') ) {
                                            $image            = $request->file('photo');
                                            $names             = time().'.'.$image->getClientOriginalExtension();
                                            $destinationPath  = public_path('/capstone/Template/assets/images');
                                            $image->move($destinationPath, $names);
                                                DB::table('users')
                                                        ->where('id',$request->input('id'))
                                                        ->update([
                                                                    'user_pic'    => $names,

                                                        ]);
                                return redirect()->back()->with("status", "Photo uploaded");
                    }

    }
      public function updatePassword(Request $request) {
        $plain_password = $request->input('password');
        $password = Hash::make($plain_password);
                                  DB::table('users')
                                          ->where('id',$request->input('id'))
                                          ->update([
                                                      'password'    => $password,
                                          ]);
                  return redirect()->back()->with("status", "Password updated");


}

}
