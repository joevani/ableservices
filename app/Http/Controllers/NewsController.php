<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Validator;

class NewsController extends Controller
{
  public function __construct(){
      $this->middleware('auth');
  }
  public function index() {
     return view('news/list');
  }

  public function create() {
       return view('news/create');
  }
  public function store(Request $request) {

  }
}
