<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingApplication;

class AppliedTrainingController extends Controller
{
    // Show all applications
   public function index()
{
    $applications = \App\Models\TrainingApplication::with([
        'user',
        'training',
        'certificate'   // relation for certificate
    ])
    ->whereIn('status', ['approved', 'rejected'])
    ->latest()
    ->get();

    return view('admin.approved_rejected_trainings', compact('applications'));



}
}
