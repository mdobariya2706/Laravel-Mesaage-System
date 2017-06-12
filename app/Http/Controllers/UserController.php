<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\Store;
use DB;
use Auth;
use App\User;
use View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Store $session)
    {
		
		$id = Auth::user()->email;
		$subject = $request->subject;
		$receiver = $request->email;
		$details = $request->details;
		
        DB::table('messages')->insert(
		['sender' => $id,'receiver' => $receiver,'subject' => $subject,'details' => $details]);
		
		$session->flash('message_success', 'Message sent successfully');
		
		return view('pages.sendMessage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	
		//find profile
		$id = Auth::user()->id;
		//get data
		$user = DB::table('users')->where('id', $id)->first();

		//load the view and pass the nerds
        return View::make('pages.viewProfile')->with('user', $user);
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find profile
		$id = Auth::user()->id;
		//get data
		$user = DB::table('users')->where('id', $id)->first();

		//load the view and pass the nerds
        return View::make('pages.updateProfile')->with('user', $user);
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Store $session, $id)
    {
		$user = User::find($id);
		$user->name = $request->name;
		$user->email = $request->email;
        $user->save();
		
		$session->flash('profile_updated', 'Profile updated successfully');
		
		return view('pages.viewProfile', ['user' => $user]);
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
