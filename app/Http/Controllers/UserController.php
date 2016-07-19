<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\User;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('users.index', ['users'=>$users]);
  }

  public function search()
  {
      $users = User::all();
      $this->SetData($users);
      return response()->json($this->Results);
  }

  public function create()
  {
    return view('users.create');
  }

  public function store(Request $request)
  {
    $user = new User();
    $user->Name = $request->name;
    $user->Email = $request->email;
    $user->Password = bcrypt($request->password);
    $item->DateCreated = date('Y-m-d H:i:s');
    $user->save();
    return response()->json($this->Results);
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    //
  }

  public function update(Request $request, $id)
  {
    //
  }

  public function destroy($id)
  {
    $rowaffect = User::find($id)->delete();
    if($rowaffect == 0){
      $this->SetError(true);
      $this->Results['Message'] = 'ការលុប​ទិន្នន័យមានបញ្ហាសូមព្យា​យាម​ម្តងទៀត';
    }
    return response()->json($this->Results);
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
