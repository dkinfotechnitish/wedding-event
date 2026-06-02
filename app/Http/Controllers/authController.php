<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                if (Auth::user()) {
                    return redirect()->route('admin.category.index')->with('success', 'Admin login successful!');
                } else {
                    Auth::logout();
                    return redirect()->route('login')->withErrors([
                        'email' => 'Invalid credentials.',
                    ]);
                }
            }
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You Are Being Logged Out!');
    }
}
