<?php

namespace App\Http\Controllers\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplication;

class JobApplicationController extends Controller
{
    // Store a new job application
    public function store(Request $request)
    {
        $request->validate([
            'job_title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'resume' => 'required|file|mimes:pdf,doc,docx',
            'message' => 'nullable|string',
        ]);

        // Upload resume
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Save job application
        JobApplication::create([
            'job_title' => $request->job_title,
            'company_name' => $request->company_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'resume' => $resumePath,
            'message' => $request->message,
            'user_id' => auth()->guard('female_user')->id(),
        ]);

        return redirect()->back()->with('success', 'Job application submitted successfully!');
    }

    // Show jobs applied by logged-in user
    public function appliedJobsPage()
    {
        $appliedJobs = JobApplication::where('user_id', auth()->guard('female_user')->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('woman.applied_jobs', compact('appliedJobs'));
    }

}
