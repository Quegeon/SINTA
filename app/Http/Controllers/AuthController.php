<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\Karyawan;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    public function isAdmin()
    {
        return Auth::check() && Auth::user()->role == 'Admin';
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);
        
        $credentials = $request->only('username', 'password');
        // dd($credentials);

        // dd($credentials,Auth::guard('karyawan')->attempt($credentials));
        if (Auth::guard('karyawan')->attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'username' => 'Akun tidak terdaftar !',
        ])->onlyInput('username');

    }

  // Logout
    public function logout(Request $request)
    {
        Auth::guard('karyawan')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Menampilkan halaman pendaftaran
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Memproses pendaftaran
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Karyawan::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    // Menampilkan halaman reset password
    public function showResetPasswordForm($token = null)
    {
        return view('auth.passwords.reset')->with(['token' => $token, 'email' => request('email')]);
    }

    // Mengirim link reset password
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    // Memproses reset password
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                // $user->setRememberToken(Str::random(60));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
