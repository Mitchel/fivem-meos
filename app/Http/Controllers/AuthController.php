<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')) {
            $attributes = request()->validate([
                'username'  => ['required'],
                'password'  => ['required'],
            ]);

            if(auth()->attempt($attributes)) {
                session()->regenerate();

                $user = Auth::User();
                $user->last_login = now('Europe/Amsterdam')->format('d-m-Y H:i:s');
                $user->save();

                return redirect()->route('app.dashboard')->with('success', 'Ingelogd');
            }

            throw ValidationException::withMessages([
               'username'   => 'Je gegevens komen niet overeen.'
            ]);
        }

        return view('auth.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login')->with('success', 'Uitgelogd');
    }
}
