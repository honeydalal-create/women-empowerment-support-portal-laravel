<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\FemaleUser;

class LoginController extends Controller
{
    public function index()
    {
        return view('visitor.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('female_user')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('woman.dashboard');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('female_user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    // Forgot password
    public function forgotForm()
    {
        return view('visitor.forgotpassword');
    }

    public function checkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $femaleUser = FemaleUser::where('email', $request->email)->first();

        if (!$femaleUser) {
            return back()->with('error', 'Email not found!');
        }

        return redirect()->route('visitor.resetpassword', $femaleUser->email);
    }

    // Reset password
    public function resetForm($email)
    {
        return view('visitor.resetpassword', compact('email'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        FemaleUser::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('login')
            ->with('success', 'Password reset successful. Login now!');
    }
}
