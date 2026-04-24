<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\FemaleUser;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('visitor.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:100',
            'email'           => 'required|email|unique:female_users,email',
            'phone'           => 'required|string|max:15',
            'gender'          => 'required|in:Female,Other',
            'date_of_birth'   => 'required|date',
            'city'            => 'required|string|max:50',
            'state'           => 'required|string|max:50',
            'occupation'      => 'required|string|max:100',
            'address'         => 'required|string',
            'profile_photo'   => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'password'        => 'required|string|min:6|confirmed',
            'terms'           => 'required',
        ]);

        // Upload profile photo
        $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');

        // Save user
        FemaleUser::create([
            'name'          => $validated['name'],
            'email'         => $validated['email'],
            'phone'         => $validated['phone'],
            'gender'        => $validated['gender'],
            'date_of_birth' => $validated['date_of_birth'],
            'city'          => $validated['city'],
            'state'         => $validated['state'],
            'occupation'    => $validated['occupation'],
            'address'       => $validated['address'],
            'profile_photo' => $photoPath,
            'password'      => $validated['password'], // automatically hashed in model
            'role'          => 'User',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
}
