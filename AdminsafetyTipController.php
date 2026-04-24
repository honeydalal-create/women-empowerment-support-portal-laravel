<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SafetyTip;
use Illuminate\Support\Facades\Storage;

class AdminsafetyTipController extends Controller
{
    public function index()
    {
        $tips = SafetyTip::latest()->get();
        return view('admin.safety_tips', compact('tips')); // matches your current blade name
    }

    public function create()
    {
        return view('admin.saftycreate'); // matches your current blade name
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('safety_tips', 'public');
        }

        SafetyTip::create($data);

        return redirect()->route('admin.safety_tips.index')->with('success', 'Safety tip added successfully!');
    }

    public function edit(SafetyTip $safetyTip)
    {
        return view('admin.saftyedit', compact('safetyTip')); // matches your current blade name
    }

    public function update(Request $request, SafetyTip $safetyTip)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('photo')) {
            if ($safetyTip->photo) {
                Storage::disk('public')->delete($safetyTip->photo);
            }
            $data['photo'] = $request->file('photo')->store('safety_tips', 'public');
        }

        $safetyTip->update($data);

        return redirect()->route('admin.safety_tips.index')->with('success', 'Safety tip updated successfully!');
    }

    public function destroy(SafetyTip $safetyTip)
    {
        if ($safetyTip->photo) {
            Storage::disk('public')->delete($safetyTip->photo);
        }

        $safetyTip->delete();
        return redirect()->route('admin.safety_tips.index')->with('success', 'Safety tip deleted successfully!');
    }
}
