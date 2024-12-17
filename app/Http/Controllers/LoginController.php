<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;





use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required','email:dns'],
            'password' => ['required']
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()-> divisi = 'karyawan'){
                return redirect('/organisasi');
            }elseif(Auth::user()-> divisi == 'admin'){
                return redirect('/admin');
            }
        }
        return back()->with('loginError', 'Login failed!');
    }

    public function logout() {
        Auth::logout();

        return redirect('/home');
    }
}
