<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    // ==========================
    // LOGIN
    // ==========================

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah input berupa email atau NIK
        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL)
                ? 'email'
                : 'nik';

        // Cari user berdasarkan email atau NIK
        $user = User::where($field, $request->login)->first();

        // Validasi user dan password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'login' => 'Email/NIK atau Password salah.'
            ]);
        }

        // Lakukan login
        Auth::login($user);

        // Redirect berdasarkan role
        if ($user->role == 'petugas') {
            return redirect()->route('petugas.dashboard');
        }

        return redirect()->route('warga.dashboard');
    }

    // ==========================
    // REGISTER
    // ==========================

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nik'      => 'required|unique:users,nik|digits:16',
            'name'     => 'required|max:100',
            'email'    => 'required|email|unique:users,email',
            'no_hp'    => 'required',
            'alamat'   => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        // 2. Simpan Data ke Database
        User::create([
            'nik'      => $request->nik,
            'name'     => $request->name,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'alamat'   => $request->alamat,
            'password' => Hash::make($request->password),
            'role'     => 'warga',
        ]);

        // 3. Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // ==========================
    // LUPA PASSWORD
    // ==========================

    public function forgotForm()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        // Logika lupa password
    }

    // ==========================
    // LOGOUT
    // ==========================

   public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('login');
}
}