<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;

class AddjobsController extends Controller
{
    public function hiredRejectedApplications()
    {
        $applications = JobApplication::whereIn('status', ['Hired', 'Rejected'])
            ->latest()
            ->get();

        return view('admin.job_applications_status', compact('applications'));
    }
}
