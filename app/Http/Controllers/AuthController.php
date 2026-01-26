<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menangani proses login user.
     */
    public function login(Request $request)
    {
        // 1. Validasi input: memastikan email dan password tidak kosong
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // 2. Cek kecocokan data dengan tabel users di database
        if (Auth::attempt($credentials)) {
            // Jika berhasil, buat session baru (tiket login)
            $request->session()->regenerate();
            
            // Pindahkan user ke halaman dashboard
            return redirect()->intended('dashboard');
        }

        // 3. Jika gagal (email tidak terdaftar atau password salah)
        // Akan menampilkan pesan error di halaman login
        return back()->withErrors([
            'loginError' => 'The login information you entered is incorrect.',
        ])->withInput($request->only('email')); 
    }

    /**
     * Menangani proses logout user.
     */
    public function logout(Request $request)
    {
        // Menghapus status login user
        Auth::logout();
 
        // Menghancurkan session agar tidak bisa diakses kembali
        $request->session()->invalidate();
 
        // Membuat ulang token CSRF untuk keamanan
        $request->session()->regenerateToken();
 
        // Lempar user kembali ke halaman awal (login)
        return redirect('/');
    }
}