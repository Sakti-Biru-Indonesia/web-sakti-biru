<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
