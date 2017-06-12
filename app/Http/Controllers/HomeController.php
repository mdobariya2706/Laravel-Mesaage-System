<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use View;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//find profile
		$email = Auth::user()->email;
		//get data
		//$messages = DB::table('messages')->where('id', $email);
		//select * from messages m, users u where m.receiver=u.email and u.email = 'mahesh1@gmail.com'
			
		$messages = DB::table('messages')
            ->join('users', 'users.email', '=', 'messages.sender')
            ->select('users.name', 'messages.*')
			->where('messages.receiver', $email)
            ->get();
		//print_r ($messages);
		//exit;
		
		//load the view and pass the nerds
        return View('home')->with('messages', $messages);

	}
}
