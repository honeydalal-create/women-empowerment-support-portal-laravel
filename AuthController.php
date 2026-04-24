<?php

namespace App\Http\Controllers\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FemaleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Registration Form
    public function showRegister() {
        return view('visitor.register');
    }

    // Register User
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:female_users,email',
            'password' => 'required|confirmed|min:6',
            'date_of_birth' => 'nullable|date',
        ]);

        FemaleUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'date_of_birth' => $request->date_of_birth ?? '2000-01-01',
        ]);

        return redirect()->route('home')->with('success', 'Account created successfully.');
    }

    // Show Login Form
    public function showLogin() {
        return view('visitor.login');
    }

    // Login User
    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email','password');

        if (Auth::attempt($credentials)) { // default guard
            return redirect()->route('woman.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Logout
    public function logout() {
        Auth::logout(); // default guard
        return redirect()->route('welcome')->with('success', 'You have logged out successfully.');
    }
}
