<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class CompanyAuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('company.login');
    }

    // Login submit
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('company')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('company.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ])->onlyInput('email');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('company')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('company.login');
    }

    // Forgot password
    public function forgotForm()
    {
        return view('company.forgot-password');
    }

    public function checkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $company = Company::where('email', $request->email)->first();

        if (!$company) {
            return back()->with('error', 'Email not found!');
        }

        return redirect()->route('company.reset', $company->email);
    }

    // Reset password form
    public function resetForm($email)
    {
        return view('company.reset-password', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        Company::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('company.login')
            ->with('success', 'Password reset successful. Login now!');
    }

    // Company dashboard
    public function dashboard()
    {
        return view('company.dashboard');
    }
}
