<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function login()
  {
    return view('pages.dashboard.login');
  }

  public function signin(Request $request)
  {
    $email = $request->input('email');
    $password = $request->input('password');

    // check email and password
    $user = User::where('email', $email)->first();

    if ($user && Hash::check($password, $user->password)) {

      // login
      Auth::login($user);

      return redirect()->route('dashboard.home');
    } else {
      return redirect()->route('dashboard.login')->with('error', 'Invalid email or password')->withInput();
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('dashboard.login');
  }

  public function admin_create(Request $request)
  {
    return view('pages.dashboard.user.create');
  }

  public function create_user(Request $request)
  {
    $name = $request->input('name');
    $email = $request->input('email');
    $password = $request->input('password');

    if (Auth::user()->role !== 'ADMIN') {
      return redirect()->back()->with('error', 'You do not have permission to create user')->withInput();
    }

    // validate all fields
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
      'confirm_password' => 'required|same:password',
    ]);

    // create user
    try {
      User::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
      ]);

      // create user profile
      $user = User::where('email', $email)->first();

      UserProfile::create([
        'user_id' => $user->id,
        'professional_title' => 'Contributor',
      ]);

      return redirect()->back()->with('success', 'User created successfully');
    } catch (\Throwable $th) {

      return redirect()->back()->with('error', 'Failed to create user')->withInput();
    }
  }

  public function index(){
    $users = User::all();
    return view('pages.dashboard.user.index', compact('users'));
  }

  public function edit($id){
    $user = User::find($id);
    return view('pages.dashboard.user.edit', compact('user'));
  }

  public function update(Request $request, $id){
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email,' . $id,
      'role' => 'required|in:ADMIN,WRITER',
    ]);

    $user = User::findOrFail($id);
    $user->update($request->only('name', 'email', 'role'));


    return redirect()->route('users.index')->with('success'. 'User updated succesfully!');
  }

}
