<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function edit()
    {
        return view('admin.edit-profile');
    }

    public function update(Request $request)
{
    /** @var \App\Models\Admin $admin */
    $admin = Auth::guard('admin')->user();

    if (!$admin) {
        return redirect()->route('admin.login')->with('error', 'Please login first.');
    }

    $request->validate([
        'full_name'     => 'required|string|max:255',
        'contact_no'    => 'nullable|string|max:20',
        'address'       => 'nullable|string',
        'city'          => 'nullable|string|max:100',
        'state'         => 'nullable|string|max:100',
        'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $dataToUpdate = $request->only([
        'full_name', 'contact_no', 'address', 'city', 'state'
    ]);

    if ($request->hasFile('profile_photo')) {
        if ($admin->profile_photo && Storage::disk('public')->exists($admin->profile_photo)) {
            Storage::disk('public')->delete($admin->profile_photo);
        }
        $dataToUpdate['profile_photo'] = $request->file('profile_photo')->store('admin_profiles', 'public');
    }

    $admin->fill($dataToUpdate)->save();

    return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
}

}
