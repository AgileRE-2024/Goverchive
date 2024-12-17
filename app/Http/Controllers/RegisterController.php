<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required',],
            'email' => ['required','unique:users','email:dns'],
            'password' => ['required'],
            'divisi' => ['required'],
            'posisi' => ['required'],
            'unit-kerja' => ['required'],
        ]);



        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Sucessfull! Please Login');

    }


}
