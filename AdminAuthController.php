<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminAuthController extends Controller
{
    // Show admin login page
    public function showLogin()
    {
        return view('visitor.admin');
    }

    // Handle admin login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect()->route('admin.penal');
        }

        return back()->with('error', 'Invalid Email or Password');
    }

    // Forgot password
    public function forgotForm()
    {
        return view('admin.forgot-password');
    }

    public function checkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return back()->with('error', 'Email not found!');
        }

        return redirect()->route('admin.reset', $admin->email);
    }

    // Reset password
    public function resetForm($email)
    {
        return view('admin.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        Admin::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('visitor.admin')
            ->with('success', 'Password reset successful. Login now!');
    }

    // Admin dashboard
    public function penal()
    {
        return view('admin.dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('visitor.admin');
    }
}
