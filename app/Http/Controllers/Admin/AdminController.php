<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  public function login()
  {
    return view('admin.login');
  }

  public function postLoginAdmin(Request $req)
  {
    if (Auth::attempt(['email' => $req->email, 'password' => $req->password], $req->remember)) {
      return redirect()->route('admin.index');
    }
    return redirect()->back()->with('err', 'Login Failed');
  }
}
