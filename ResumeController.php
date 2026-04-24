<?php

namespace App\Http\Controllers\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Resume;

class ResumeController extends Controller
{
    // Show upload / edit form
    public function index()
    {
        $woman = Auth::guard('female_user')->user();
        $resume = Resume::where('female_user_id', $woman->id)->first();

        return view('woman.upload_resume', compact('woman', 'resume'));
    }

    // Store resume (FIRST TIME)
    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:5120',
        ]);

        $woman = Auth::guard('female_user')->user();

        // Prevent duplicate record
        if (Resume::where('female_user_id', $woman->id)->exists()) {
            return back()->with('error', 'Resume already exists. Please update it.');
        }

        $path = $request->file('resume')->store('resumes', 'public');

        Resume::create([
            'female_user_id' => $woman->id,
            'name' => $woman->name,
            'email' => $woman->email,
            'resume' => $path,
        ]);

        return back()->with('success', 'Resume uploaded successfully');
    }

    // Update resume
    public function update(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:5120',
        ]);

        $woman = Auth::guard('female_user')->user();
        $resume = Resume::where('female_user_id', $woman->id)->firstOrFail();

        // Delete old resume file
        if ($resume->resume && Storage::disk('public')->exists($resume->resume)) {
            Storage::disk('public')->delete($resume->resume);
        }

        $path = $request->file('resume')->store('resumes', 'public');

        $resume->update([
            'resume' => $path,
        ]);

        return back()->with('success', 'Resume updated successfully');
    }

    // View resume
    public function view()
    {
        $woman = Auth::guard('female_user')->user();
        $resume = Resume::where('female_user_id', $woman->id)->firstOrFail();

        $filePath = storage_path('app/public/' . $resume->resume);

        abort_if(!file_exists($filePath), 404, 'File not found');

        return response()->file($filePath);
    }
}
