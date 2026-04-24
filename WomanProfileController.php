<?php

namespace App\Http\Controllers\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class WomanProfileController extends Controller
{
    // Show profile edit page
    public function edit()
    {
        $user = Auth::guard('female_user')->user();
        return view('woman.profile', compact('user'));
    }

    // Update profile
    public function update(Request $request)
    {
        $user = Auth::guard('female_user')->user();

        // Validate input
        $request->validate([
            'name'            => 'required|string|max:100',
            'email'           => 'required|email|unique:female_users,email,' . $user->id,
            'phone'           => 'nullable|string|max:20',
            'gender'          => 'required|in:Female,Other',
            'date_of_birth'   => 'required|date',
            'city'            => 'nullable|string|max:50',
            'state'           => 'nullable|string|max:50',
            'occupation'      => 'nullable|string|max:100',
            'address'         => 'nullable|string|max:255',
            'profile_photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password'        => 'nullable|confirmed|min:6',
        ]);

        // Collect data to fill
        $data = $request->only([
            'name','email','phone','gender','date_of_birth','city','state','occupation','address'
        ]);

        // Handle profile photo
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('photos', 'public');
        }

        // Handle password separately
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        // Fill data and save
        $user->fill($data);
        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
