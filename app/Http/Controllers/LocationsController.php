<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Validator;

class LocationsController extends Controller
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

        $locations = DB::table('locations')
                    ->get();
        return view('location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

          DB::table('locations')
                ->insert(['location' => $request->location,'company' => $request->company]);
            return redirect()->back()->with("status", "New location has been added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
      $locations = DB::table('locations')
                  ->where('id',$id)
                  ->first(['id','location','company']);
      return view('location.show',compact('locations'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function assign()
    {
      $locations = DB::table('locations')->get();
      $workers = DB::table('users')->where('user_type','worker')->get();
      return view('location.assignment',compact('locations','workers'));
    }
    public function assignworker(Request $request){
      DB::table('location_assigment')
            ->insert(['location_id' => $request->location_id,'user_id' => $request->worker_id]);
        return redirect()->back()->with("status", "New assignment has been added");

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
      DB::table('locations')
            ->where('id',$request->input('id'))
            ->update(
                        ['location' => $request->location,'company' => $request->company]
                      );
        return redirect()->back()->with("status", "New location has been updated");
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
