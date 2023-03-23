<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function loginol(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withInput()->withErrors(['email' => trans('auth.failed')]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/');
    }

    public function regView()
    {
        return view('auth.register');
    }
}