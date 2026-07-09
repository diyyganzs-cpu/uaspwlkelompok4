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

        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL)
                ? 'email'
                : 'nik';

        $user = User::where($field, $request->login)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'login' => 'Email/NIK atau Password salah.'
            ]);
        }

        Auth::login($user);

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
        $request->validate([
            'nik'      => 'required|unique:users,nik|digits:16',
            'name'     => 'required|max:100',
            'email'    => 'required|email|unique:users,email',
            'no_hp'    => 'required',
            'alamat'   => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'nik'      => $request->nik,
            'name'     => $request->name,
            'email'    => $request->email,
            'no_hp'    => $request->no_hp,
            'alamat'   => $request->alamat,
            'password' => Hash::make($request->password),
            'role'     => 'warga',
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // ==========================
    // LUPA PASSWORD
    // ==========================

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::where('nik', $request->nik)
                    ->where('email', $request->email)
                    ->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'NIK atau Email tidak ditemukan.'
            ]);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')
            ->with('success', 'Password berhasil diubah.');
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