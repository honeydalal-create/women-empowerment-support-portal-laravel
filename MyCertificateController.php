<?php

namespace App\Http\Controllers\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TrainingCertificate;

class MyCertificateController extends Controller
{
    public function index()
    {
        $user = Auth::guard('female_user')->user();

        $certificates = TrainingCertificate::with('application.training')
            ->where('user_id', $user->id)
            ->get();

        return view('woman.training_certificates', compact('certificates'));
    }

    public function download($id)
    {
        $user = Auth::guard('female_user')->user();

        $certificate = TrainingCertificate::where('id', $id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        $path = public_path('uploads/certificates/' . $certificate->certificate_file);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->download($path);
    }
}
