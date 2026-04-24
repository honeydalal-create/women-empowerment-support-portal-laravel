<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FemaleUser; // or App\Models\User

class UserController extends Controller
{
    // Show list of users
    public function index(Request $request)
    {
        $query = FemaleUser::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%");
            });
        }

        $users = $query->paginate(10);

        return view('admin.manageuser', compact('users'));
    }

    // Show user details
    public function show($id)
    {
        $user = FemaleUser::findOrFail($id);
        return view('admin.show', compact('user'));
    }

    // Edit user form
    public function edit($id)
    {
        $user = FemaleUser::findOrFail($id);
        return view('admin.useredit', compact('user'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $user = FemaleUser::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:female_users,email,'.$id,
            'phone' => 'nullable|string|max:15',
            'gender' => 'required|in:Female,Other',
            'date_of_birth' => 'nullable|date',
            'city' => 'nullable|string|max:50',
            'state' => 'nullable|string|max:50',
            'occupation' => 'nullable|string|max:100',
            'address' => 'nullable|string',

            'profile_photo' => 'nullable|image|max:2048',
        ]);

        // Handle profile photo
        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $validated['profile_photo'] = $path;
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Delete user
    public function destroy($id)
    {
        $user = FemaleUser::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
