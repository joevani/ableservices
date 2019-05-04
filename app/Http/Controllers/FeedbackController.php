<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Validator;
use Auth;

use App\User;
use App\Notifications\Register;
class FeedbackController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }

  public function index() {

    $feedbacks  = DB::table('feedbacks')
                ->orderBy('id','desc')
                ->paginate(10);

          DB::table('feedbacks')
              ->update(['is_read' => 1]);

      return view('memo.feedback',compact('feedbacks'));
  }

  public function create() {



          return view('memo.createdfeeback');
  }

    public function store(Request $request) {

        $subject    = $request->input('subject');
        $user_id    = Auth::user()->id;
        $content    = $request->input('content');

        DB::table('feedbacks')
                ->insert([
                          'user_id'   => $user_id,
                          'subject'   => $subject,
                          'content'   => $content
                      ]);


              User::find(1)->notify(new Register('New Feedback',$request->input('message')));

        return redirect()->back()->with("status", "Feed Submitted");
    }
}
