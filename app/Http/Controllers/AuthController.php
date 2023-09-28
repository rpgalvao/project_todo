<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\returnValueMap;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }
    
    public function signin(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($validator)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->withErrors('E-mail e/ou senha não conferem');
        }
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.register');
    }

    public function saveUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $req = $request->only(['name', 'email', 'password']);
        $req['password'] = Hash::make($req['password']);

        User::create($req);
        
        return redirect(route('login'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
