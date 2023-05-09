<?php

namespace App\Http\Controllers;

use Alert;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('detail-produk.index');
        }
        return view('auth.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username'  => 'required|string|max:255',
            'password'  => 'required|string|min:5'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user) {
            $checkPassword = Hash::check($request->password, $user->password);
            if (!$checkPassword) {
                Alert::error('Gagal', 'Username dan password tidak sesuai');
                return redirect()->route('login')->withInput();
            }
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                Alert::success('Hi, ' . $user->name, 'Selamat datang di Traceabiity System');
                return redirect()->route('detail-produk.index');
            }
        }
        Alert::error('Gagal', 'User tidak ditemukan');
        return redirect()->route('login')->withInput();
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        Alert::success('Logout Berhasil', 'Sesi anda telah di hapus');
        return redirect()->route('login');
    }
}
