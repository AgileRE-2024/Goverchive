<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/organisasi', function () {
    return view('organisasi');
});

Route::get('/unit', function () {
    return view('unit');
});

Route::get('/roadmap', function () {
    return view('roadmap');
});

Route::get('/histori', function () {
    return view('histori');
});