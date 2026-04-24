<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingApplication;
use App\Models\TrainingCertificate;

class TrainingCertificateController extends Controller
{
    // Show approved applications to upload certificates
    public function create()
    {
        $applications = TrainingApplication::where('status', 'approved')->with('user')->get();
        return view('admin.training_certificates_upload', compact('applications'));
    }

    // Store uploaded certificate
    public function store(Request $request)
    {
        $request->validate([
            'application_id' => 'required|exists:training_applications,id',
            'certificate' => 'required|file|mimes:pdf,jpg,png|max:2048',
        ]);

        $application = TrainingApplication::findOrFail($request->application_id);

        $fileName = time() . '_' . $request->certificate->getClientOriginalName();
        $request->certificate->move(public_path('certificates'), $fileName);

        TrainingCertificate::create([
            'application_id' => $application->id,
            'user_id' => $application->user_id,
            'training_program' => $application->training_program,
            'certificate_file' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Certificate uploaded successfully!');
    }
}
