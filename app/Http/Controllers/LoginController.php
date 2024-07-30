<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('frontoffice.login.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nim', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Mendapatkan pengguna yang sedang login
            $user = Auth::user();

            // Memeriksa peran pengguna dan mengarahkan ke halaman yang sesuai
            if ($user->role === 'admin') {
                return redirect()->intended('/backoffice/dashboard');
            } else {
                return redirect()->intended('/frontoffice/beranda');
            }
        }

        return back()->withErrors([
            'nim' => 'NIM salah',
            'password' => 'Password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/frontoffice/login');
    }
}
