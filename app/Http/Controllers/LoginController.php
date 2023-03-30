<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginMasyarakat()
    {
        return view('layouts.login');
    }
    public function loginMasyarakat (Request $request)
    {
        $validateData = $request->validate([
            'username' => "required",
            'password' => "required"
        ]);
        if (Auth::guard('masyarakat')->attempt(['username'=>$request->username, 'password'=>$request->password], $request->get('remember'))){
            $request->session()->regenerate();
            return redirect()->route('pengaduan.index');
        }
        return back()->with('error', 'message');
    }
    public function showLoginPetugas()
    {
        return view('layouts.login');
    }
    public function loginPetugas (Request $request)
    {
        $validateData = $request->validate([
            'username' => "required",
            'password' => "required"
        ]);
        if (Auth::guard('petugas')->attempt(['username'=>$request->username, 'password'=>$request->password], $request->get('remember'))){
            $request->session()->regenerate();
            return redirect()->route('petugas.index');
        }
        return back()->with ('error', 'Gagal Login!');
    }
     public function logout()
     {
        Auth::guard('masyarakat')->logout();
        Auth::guard('petugas')->logout();
        return redirect()->route('login')->with('success', "Berhasil Logout");
     }
}
