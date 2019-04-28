<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Validator;
use Hash;
use Auth;

class MessageController extends Controller
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
    public function sent() {
        $messages = DB::table('chat')
                    ->where('from_user',Auth::user()->id)
                    ->get();
        return view('messages.inbox',compact('messages'));
    }

    public function inbox() {
        $messages = DB::table('chat')
                    ->where('to_user',Auth::user()->id)
                    ->get();
          return view('messages.message',compact('messages'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_type = Auth::user()->user_type;

        $users = DB::table('users')->get();

            return view('messages.create',compact('users'));



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('chat')
              ->insert([
                      'from_user'   => Auth::user()->id,
                      'to_user'     => $request->input('to_user'),
                      'message'     => $request->input('message'),
                      'status'      => 0

              ]);
              return redirect()->back()->with("status", "Message has been sent");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
