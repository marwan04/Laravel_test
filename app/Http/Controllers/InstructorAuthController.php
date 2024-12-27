<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.instructor-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('instructor')->attempt($credentials)) {
            return redirect()->intended(route('instructor.dashboard'));
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::guard('instructor')->logout();
        return redirect()->route('instructor.login');
    }
}
