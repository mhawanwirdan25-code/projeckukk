<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    private function getUser() : array {
        return[
            [
                'username'  =>  'adminalumni',
                'password'  =>  '$2y$12$5PzW4cvPJC0E3G/lSEIOnOxPXn1ltfoW6dVhfMdtZQIc6ulf9oLua',
                'nama'      =>  'Hawan'
            ],
            [
                'username'  =>  'user',
                'password'  =>  '$2y$12$LL7EIZdZro04KRNU26mTk.90leE/VgPe0ZNj7Vg37.Q3mHOhdoAR.',
                'nama'      =>  'M.ZidanilArzak'
            ]
        ];
    }

    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $auth = $request->only('username', 'password');
        foreach($this->getUser() as $user){
            if($user['username'] == $auth['username'] && Hash::check($auth['password'], $user['password'])){
                session::put('user', $user);
                return redirect()->route('dashboard');
            }
        }
        return back()->withErrors(['error' => 'Username atau Password salah!']);
    }
    public function showDashboard() {
        if(!Session('user')){
            return redirect()->route('login');
        }
        $user = Session::get('user');
        return view('dashboard', compact('user'));
    }
    public function profil()
    {
        // Cek apakah user sudah login
        if (!Session::has('user')) {
            return redirect()->route('login');
        }

        // Ambil data user dari session
        $user = Session::get('user');

        // Kirim ke view profil.blade.php
        return view('profil', compact('user'));
    }

    public function logout() {
        Session::forget('user');
        return redirect()->route('login');
    }
}
