<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Validator;
use App\User;
use App\Notifications\Register;

class NewsController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index() {

        $type=  Auth::user()->user_type;

        if( $type =='management' ) {

                $news  = DB::table('news')
                            ->orderBy('id','desc')
                            ->paginate(10);

                return view('news/list',compact('news'));
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

            return view('news/list',compact('news'));
        }


  }
  public function show($id) {
          $details = DB::table('news')
                      ->where('id',$id)
                      ->first(['subject','thumbnail','content']);
         return view('news/details',compact('details'));
  }

  public function create() {
       return view('news/create');
  }
  public function store(Request $request) {

        $supervisor_visibility    = $request->input('supervisor') + 0;
        $teamlead_visibility      = $request->input('teamlead') +0;
        $worker_visibility        = $request->input('worker') +0 ;
        $client_visibility        = $request->input('client') + 0;
        $title                    = $request->input('title') ;
        $content                  = $request->input('content');

        $this->validate($request, [
                                    'thumbail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                                ]);

          if( $request->hasFile('thumbail') ) {
                        $image            = $request->file('thumbail');
                        $name             = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath  = public_path('/capstone/Template/assets/images');
                        $image->move($destinationPath, $name);
                            DB::table('news')
                                    ->insert([
                                              'subject'               => $title ,
                                              'content'               => $content,
                                              'client_can_see'        => $client_visibility,
                                              'supervisor_can_see'    => $supervisor_visibility,
                                              'teamlead_can_see'      => $teamlead_visibility,
                                              'worker_can_see'        => $worker_visibility,
                                              'admin_can_see'         => 1,
                                              'thumbnail'             => $name
                                    ]);

                      return redirect()->back()->with("status", "Updated News");
                }
              return redirect()->back()->with("status", "Something went wrong");
  }
  public function delete($id) {
        DB::table('news')
              ->where('id',$id)
              ->delete();
      return redirect()->back()->with("status", "News has been deleted");
  }
}
