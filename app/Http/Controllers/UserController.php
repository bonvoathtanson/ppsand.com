<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\User;

class UserController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth');
  }
  public function index()
  {
    $users = DB::table('users')->get();
    return view('users.index', ['users'=>$users]);
  }

  public function create()
  {
    return view('users.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
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

  public function login()
  {
    return view('auth.login');
  }

  public function dologin(Request $request)
  {
    $data = $request->all();
    if (Auth::attempt(['Name' => $data['name'], 'password' => $data['password']])) {
      return Redirect::intended('/');
      //return redirect('/');
    } else {
      return Redirect::back()->withErrors('That username/password combo does not exist.');
    }
  }

  public function logout()
  {
    Auth::logout();
    return Redirect::intended('/login');
  }
}
