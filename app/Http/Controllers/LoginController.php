<?php

namespace App\Http\Controllers;

use App\Models\userAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // View login di resources/views/auth/login.blade.php
    }

public function login(Request $request)
{
    //Validasi input
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ], [
        'username.required' => 'Username wajib diisi.',
        'password.required' => 'Password tidak boleh kosong.',
    ]);

    $credentials = $request->only('username', 'password');
    // dd($request->password);
    $user = userAdmin::where('username', $request->username)->first();
    // dd($user);
    // Data login statis

    if (!$user || !Hash::check( $request->password, $user->password)) {
        return redirect()->back()->withErrors([
            'login' => 'username atau password salah !',
        ]);
    }
    
    session(['logged_in' => true, 'username' => $user->username]);
    auth()->login($user);
    return redirect()->route('dataAnggota');

    // $allowedUsers = [
    //     'fahdganteng' => '27November2008',
    // ];

    // if (!array_key_exists($credentials['username'], $allowedUsers)) {
    //     return back()->withErrors(['username' => 'Username tidak dikenali']);
    // }

    // if ($allowedUsers[$credentials['username']] !== $credentials['password']) {
    //     return back()->withErrors(['password' => 'Password salah']);
    // }

    // Login sukses - simpan session

    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
