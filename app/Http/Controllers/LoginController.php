<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return $this->redirectBasedOnRole();
        }
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email must be filled',
            'email.email' => 'Email must follow email format',
            'password.required' => 'Password must be filled',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->has('remember_me')) {
                Cookie::queue('user_email', $request->email, 120); // 120 minutes = 2 hours
            }

            return $this->redirectBasedOnRole();
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

   public function redirectBasedOnRole()
   {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        switch ($user->role) {
            case 'mentor':
                return redirect()->route('halaman-utama');
            case 'user':
                return redirect()->route('halaman-utama');
            default:
                return redirect()->route('halaman-utama');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('halaman-utama');
    }
}
