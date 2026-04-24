<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TrainingApplication;
use App\Models\JobApplication;

class ApplicationDashboardController extends Controller
{
    public function index()
{
    
    $trainingApplications = TrainingApplication::count();
    $jobApplications = JobApplication::count();
    $approvedApplications = TrainingApplication::where('status','Approved')->count()
                            + JobApplication::where('status','Approved')->count();

    // Hired jobs
    $hiredJobs = JobApplication::where('status','Hired')->count();

    return view('company.dashboard', compact(

        'trainingApplications',
        'jobApplications',
        'approvedApplications',
        'hiredJobs'
    ));
}
}
