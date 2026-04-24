<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingApplication;
use App\Models\TrainingCertificate;

class CompanyTrainingCertificateController extends Controller
{
    public function index()
    {
        $applications = TrainingApplication::with('user', 'training')
            ->where('status', 'approved')
            ->get();

        return view('company.upload_certificates', compact('applications'));
    }

    public function store(Request $request)
{
    $request->validate([
        'application_id' => 'required|exists:training_applications,id',
        'certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $application = TrainingApplication::with('training')->findOrFail($request->application_id);

    // Upload file
    if ($request->hasFile('certificate')) {
        $file = $request->file('certificate');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/certificates'), $filename);

        // Save to DB
        TrainingCertificate::create([
            'application_id'   => $application->id,
            'user_id'          => $application->user_id,
            'training_program' => $application->training->title ?? 'N/A',
            'certificate_file' => $filename,
        ]);

        return redirect()->back()->with('success', 'Certificate uploaded successfully!');
    }

    return redirect()->back()->with('error', 'File upload failed!');
}

}
