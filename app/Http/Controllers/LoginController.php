<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');
    
        if (Auth::attempt($credentials)){
            $user = Auth::user();
            return redirect()->intended('/dashboard');
        }

        return redirect()->route('login', ['status' => 'error'])->withInput();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/');
    }
}
