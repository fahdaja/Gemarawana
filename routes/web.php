<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/homepage', function () {
    return view('homepage');
});

Route::get('/galerikegiatan', function () {
    return view('galerikegiatan');
});

Route::get('/halamankegiatan', function () {
    return view('halamankegiatan');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/keanggotaan', function () {
    return view('keanggotaan');
});

Route::get('/detailanggotamuda', function () {
    return view('detailanggotamuda');
});

Route::get('/detailanggotapenuh', function () {
    return view('detailanggotapenuh');
});
