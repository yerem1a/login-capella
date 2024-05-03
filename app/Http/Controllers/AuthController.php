<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'tanggal_lahir' => 'nullable|date_format:d/m/Y',
        ]);

        // Buat pengguna baru
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Login pengguna setelah registrasi
        Auth::login($user);
        $user->is_login = true;

        // Redirect ke halaman welcome setelah registrasi
        return redirect('/welcome');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Coba melakukan login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Set is_login ke true untuk pengguna yang berhasil login
            $user = Auth::user();
            $user->is_login = true;
            $user->save();

            // Jika berhasil, redirect ke halaman welcome
            return redirect('/welcome');
        } else {
            // Jika gagal, kembali ke halaman login dengan pesan error
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'Email atau password salah']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
