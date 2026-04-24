<?php

namespace App\Http\Controllers\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrainingApplication;
use App\Models\Training;

class TrainingApplicationController extends Controller
{
    // Show the training application form
    public function create()
    {
        $trainings = Training::all(); // fetch all trainings
        return view('woman.apply_training', compact('trainings'));
    }

    // Store the training application
    public function store(Request $request)
    {
        $request->validate([
    'name' => 'required|string|max:255',
    'email' => 'required|email|max:255',
    'phone' => 'required|string|max:20',
    'training_id' => 'required|exists:trainings,id',
    'payment_mode' => 'required|string|max:50',
]);

TrainingApplication::create([
    'user_id' => auth()->guard('female_user')->id(),
    'training_id' => $request->training_id,
    'name' => $request->name,
    'email' => $request->email,
    'phone' => $request->phone,
    'payment_mode' => $request->payment_mode,
    'status' => 'pending',
]);


        return redirect()->back()->with('success', 'Training application submitted successfully!');
    }

    // Show logged-in user's training applications
    public function myApplications()
    {
        $applications = TrainingApplication::with('training')
            ->where('user_id', auth()->guard('female_user')->id())
            ->get();

        return view('woman.user_training_applications', compact('applications'));
    }

    public function trainingCertificates()
{
    $applications = TrainingApplication::with('training')
        ->where('user_id', auth()->guard('female_user')->id())
        ->whereNotNull('certificate') // only applications with certificates
        ->get();

    return view('woman.training_certificates', compact('applications'));
}
}
