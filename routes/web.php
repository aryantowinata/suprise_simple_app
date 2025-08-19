<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    // Simpan session kalau sudah pernah buka welcome
    $request->session()->put('visited_welcome', true);
    return view('welcome');
});

Route::get('/surprise', function (Request $request) {
    // Cek apakah sudah pernah buka welcome
    if (!$request->session()->has('visited_welcome')) {
        return redirect('/')->with('error', 'Kamu harus akses halaman utama dulu!');
    }

    $name = $request->query('name', 'Tamu'); // default 'Tamu' kalau tidak ada input
    return view('surprise', compact('name'));
});

Route::post('/surprise', function (Request $request) {
    if (!$request->session()->has('visited_welcome')) {
        return redirect('/')->with('error', 'Kamu harus akses halaman utama dulu!');
    }

    $name = $request->input('name');
    return view('surprise', compact('name'));
});