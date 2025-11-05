<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            // Email tidak ditemukan -> anggap password juga salah
            return back()->with('login_error', 'Email tidak ditemukan');
        }
    
        if (!Hash::check($request->password, $user->password)) {
            // Email benar, password salah
            return back()->with('login_error', 'Password salah.');
        }
    
        // Login berhasil
        Auth::login($user);
        return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda telah logout.');
    }
}
