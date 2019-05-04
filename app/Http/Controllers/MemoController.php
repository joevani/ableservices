<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Validator;
use Auth;
use PDF;

use App\User;
use App\Notifications\Register;
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
                DB::table('memo')
                        ->where('user_id',Auth::user()->id)
                        ->update(['is_read' => 1]);
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
                        'user_id'     => $user_id,
                        'subject'     => $subject,
                        'content'     => $content,
                        'created_by'  => Auth::user()->id
                    ]);

      return redirect()->back()->with("status", "Memo Submitted");
  }
  public function viewMemo($id) {

      $memo =DB::table('memo')->where('id',$id)->first(['id','user_id','subject','content','created_at','created_by']);
      $data   = [
          'memo' => $memo,
      ];
      $pdf = PDF::loadView('memo.memo', $data);
      return $pdf->download('memo.pdf');

  }

  public function submitReport(Request $request) {

    $this->validate($request, [
                                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,pdf,docx',
                            ]);

                        if( $request->hasFile('file') ) {
                                          $image            = $request->file('file');
                                          $names             = time().'.'.$image->getClientOriginalExtension();
                                          $destinationPath  = public_path('/capstone/Template/assets/images');
                                          $image->move($destinationPath, $names);

                                          DB::table('reports')
                                              ->insert([
                                                  'user_id'     => Auth::user()->id,
                                                  'subject'     => $names,
                                                  'content'     => $request->input('content'),
                                                  'is_read'      => 0 ,
                                                  'created_by'   => Auth::user()->id

                                              ]);
                                return redirect()->back()->with("status", "Report has been submitted");

                          }
                          return redirect()->back()->with("status", "Report has been submitted");

  }
public function createReport() {

  return view('memo.createreport');

}
  public function viewReport() {
          $usr = Auth::user()->user_type;
          if($usr =="management") {

            $reports = DB::table('reports')
                        ->get();
                        DB::table('reports')
                              ->update(['is_read' => 1]);
              return view('memo.reports',compact('reports'));

          }
          if($usr =="supvervisor") {
              $reports = DB::tabel('reports')
                          ->where('user_id',Auth::user()->id)
                          ->get();
                return view('memo.reports',compact('reports'));

          }

  }
}
