<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('user.login', [
            'title' => 'User Login'
        ]);
    }

    public function loginRequest(Request $request){
        $validate =  $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with('invalid', 'Email atau password salah');
    }

    public function register(){

    }

    public function registerReqeust(){
        
    }
}
