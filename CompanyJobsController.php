<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;   
use App\Models\Job;
use App\Models\JobApplication;

class CompanyJobsController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            // logout aur login ko allow karo
            if (
                $request->routeIs('company.login') ||
                $request->routeIs('company.logout')
            ) {
                return $next($request);
            }

            // agar company login nahi hai
            if (!Auth::guard('company')->check()) {
                return redirect()->route('company.login')
                    ->with('error', 'Please login first');
            }

            return $next($request);
        });
    }

    /* ================= JOBS ================= */

    public function index()
    {
        $jobs = Job::latest()->get();
        return view('company.jobs', compact('jobs'));
    }

    public function create()
    {
        return view('company.jobscreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|string|max:100',
            'status' => 'required|in:active,inactive',
        ]);

        Job::create($request->only([
            'title','company','location','salary','skills','description','status'
        ]));

        return redirect()->route('company.jobs')
            ->with('success','Job Added Successfully');
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('company.jobsedit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:100',
            'skills' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $job = Job::findOrFail($id);
        $job->update($request->only([
            'title','company','location','salary','skills','description','status'
        ]));

        return redirect()->route('company.jobs')
            ->with('success','Job updated successfully!');
    }

    public function delete($id)
    {
        Job::findOrFail($id)->delete();
        return back()->with('success','Job Deleted Successfully');
    }

    public function view($id)
    {
        $job = Job::findOrFail($id);
        return view('company.jobsdetails', compact('job'));
    }

    /* ================= JOB APPLICATIONS ================= */

    public function jobApplications()
    {
        $applications = JobApplication::latest()->get();
        return view('company.job_applications', compact('applications'));
    }

    public function updateApplicationStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Hired,Rejected',
        ]);

        $application = JobApplication::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        return back()->with('success', 'Status updated successfully!');
    }

    /* ================= LOGOUT ================= */

    public function logout(Request $request)
    {
        Auth::guard('company')->logout();   // ✅ company guard

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('company.login')
            ->with('success','Logout successfully');
    }
}
