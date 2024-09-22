<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect to intended or default dashboard
            return redirect()->intended('/dashboard');
        }

        // Redirect back with error message if login fails
        return back()->withErrors([
            'username' => 'please check username and password !!',
        ])->onlyInput('username');
    }

    // Handle the logout process
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidate and regenerate session token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login page
        return redirect('/login');
    }
}
