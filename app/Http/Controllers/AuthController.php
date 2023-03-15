<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login()
  {
    return view('admin.auth.login');
  }

  public function authenticate(Request $request)
  {
    $credential = $request->validate([
      'username' => 'required',
      'password' => 'required',
    ]);

    if (Auth::attempt($credential)) {
      $request->session()->regenerate();
      return redirect()->intended('/');
    }

    return back()->with('loginError', 'Login Failed');
  }
  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
  }
}
