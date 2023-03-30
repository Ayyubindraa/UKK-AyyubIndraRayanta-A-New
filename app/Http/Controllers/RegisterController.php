<?php

namespace App\Http\Controllers;
use App\Models\Masyarakat;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegisterMasyarakat()
    {
        return view('layouts.register');
    }
    public function registerMasyarakat(Request $request)
    {
        $validateData = $request->validate([
            'nama' => "required",
            'username' => "required|unique:masyarakat",
            'password' => "required",
            'alamat_masyarakat' => "required",
            'telp' => "required",
            'jk' => "required",
            'nik' => "required|unique:masyarakat",
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        Masyarakat::create($validateData);
        return redirect('login')->with('success', 'Registrasi Berhasil');
    }
}
