<?php
namespace App\Http\Controllers;
use App\User;
use App\Ticket;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

use App\Notifications\Register;
class TicketsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    /**
     * Display all tickets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_type=='team lead') {
          $members = [];
					//

					$team = DB::table('team_lead_members')->where('teamlead_userid',Auth::user()->id)->get();
					foreach ($team as $key => $value) {
											array_push($members,$value->worker_userid);
									}
           $tickets    = Ticket::whereIn('user_id',$members)
													->paginate(10);
           $categories = Category::all();
           return view('tickets.ticketlist', compact('tickets', 'categories'));
        }
        if(Auth::user()->user_type=='supervisor') {

						$members = [] ;
            $supervisor   = DB::table('supervisor_members')->where('supervisor_userid',Auth::user()->id)->get();
              //$members = DB::table('team_lead_members')->whereIn('teamlead_userid',[$supervisor])->pluck('worker_userid')->toArray();
							foreach ($supervisor as $key => $value) {
												$teamMembers = DB::table('team_lead_members')->where('teamlead_userid',$value->teamlead_userid)->first(['worker_userid']);
													array_push($members,$teamMembers->worker_userid);
											}
              $tickets    = Ticket::whereIn('user_id',$members)->paginate(10);
              $categories = Category::all();
              return view('tickets.ticketlist', compact('tickets', 'categories'));
        }

        if(Auth::user()->user_type=='management'){
              $tickets    = Ticket::where('type',0)->paginate(10);
              $categories = Category::all();
              return view('tickets.ticketlist', compact('tickets', 'categories'));
        }
    }
    /**
     * Display all tickets by a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->where('type',0)->paginate(10);
        $categories = Category::all();
        return view('tickets.index', compact('tickets', 'categories'));
    }
    /**
     * Show the form for opening a new ticket.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = Category::all();
        return view('tickets.create', compact('categories'));
    }
    /**
     * Store a newly created ticket in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'message'   => 'required'
        ]);
        $ticket = new Ticket([
            'title'     => $request->input('title'),
            'user_id'   => Auth::user()->id,
            'ticket_id' => strtoupper(str_random(10)),
            'category_id'  => $request->input('category'),
            'priority'  => $request->input('priority'),
            'message'   => $request->input('message'),
            'status'    => "Open",
        ]);
        if($ticket->save()) {
              return redirect()->back()->with("status", "A concern with ID: #$ticket->ticket_id has been opened.");
        }
        else {
              return redirect()->back()->with("status", "Something went wrong");
        }

    }
    /**
     * Display a specified ticket.
     *
     * @param  int  $ticket_id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $comments = $ticket->comments;
        $category = $ticket->category;
        return view('tickets.show', compact('ticket', 'category', 'comments'));
    }
    /**
     * Close the specified ticket.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function close($ticket_id )
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = 'Solved';
				$ticket->resolved_by = Auth::user()->id;
        $ticket->save();
        $ticketOwner = $ticket->user;

        return redirect()->back()->with("status", "The ticket has been closed.");
    }

    public function escalateSuperVisor($ticket_id )
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = 'Escalated to Supervisor';
        $ticket->is_escalated_to_supervisor = 1;
        $ticket->save();
        $ticketOwner = $ticket->user;
        return redirect()->back()->with("status", "The ticket has been escalated to super visor.");
    }
    public function escalateManagement($ticket_id )
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
        $ticket->status = 'Escalated To Management';
        $ticket->is_escalated_to_management = 1;
        $ticket->save();
        $ticketOwner = $ticket->user;
        return redirect()->back()->with("status", "The ticket has been escalated to management.");
    }
		public function storeFeedback(Request $request)
		{
				$this->validate($request, [
						'title'     => 'required',
						'category'  => 'required',
						'priority'  => 'required',
						'message'   => 'required'
				]);
				$ticket = new Ticket([
						'title'     => $request->input('title'),
						'user_id'   => Auth::user()->id,
						'ticket_id' => strtoupper(str_random(10)),
						'category_id'  => $request->input('category'),
						'priority'  => $request->input('priority'),
						'message'   => $request->input('message'),
						'status'    => "Open",
						'type'			=> 1
				]);
				if($ticket->save()) {
							return redirect()->back()->with("status", "A feedback with ID: #$ticket->ticket_id has been opened.");
				}
				else {
							return redirect()->back()->with("status", "Something went wrong");
				}


		}
		public function userFeedbacks()
		{


				$tickets = Ticket::where('user_id', Auth::user()->id)->where('type',1)->paginate(10);
				$categories = Category::all();
				return view('tickets.feedbacks', compact('tickets', 'categories'));
		}
		public function feedbackList(){

			if(Auth::user()->user_type=='client') {
				$tickets = Ticket::where('user_id',Auth::user()->id)->where('type',1)->paginate(10);
				$categories = Category::all();
				return view('tickets.feedbacks', compact('tickets', 'categories'));
			}
			else {
				$tickets = Ticket::where('type',1)->paginate(10);
				$categories = Category::all();
				return view('tickets.feedbacks', compact('tickets', 'categories'));
			}

		}
		public function createFeedback()
		{
			$categories = Category::all();
				return view('tickets.createfeedback', compact('categories'));
		}

		public function showFeedback($ticket_id)
		{

				$ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();
				$comments = $ticket->comments;
				$category = $ticket->category;
				return view('tickets.showfeedback', compact('ticket', 'category', 'comments'));
		}
}
