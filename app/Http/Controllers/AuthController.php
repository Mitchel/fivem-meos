<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')) {
            // Komt nog.
        }

        return view('auth.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login')->with('success', 'Uitgelogd');
    }
}
