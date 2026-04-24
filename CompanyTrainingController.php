<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\TrainingApplication;
use Illuminate\Support\Facades\Storage;

class CompanyTrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::all();
        return view('company.trainings', compact('trainings'));
    }

    public function create()
    {
        return view('company.add_training');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'nullable|string|max:100',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $training = new Training();
        $training->title = $request->title;
        $training->duration = $request->duration;
        $training->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('trainings', 'public');
            $training->image = $path;
        }

        $training->save();

        return redirect()->route('company.index')
            ->with('success', 'Training added successfully');
    }

    public function edit($id)
    {
        $training = Training::findOrFail($id);
        return view('company.edit_training', compact('training'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'nullable|string|max:100',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $training = Training::findOrFail($id);
        $training->title = $request->title;
        $training->duration = $request->duration;
        $training->description = $request->description;

        if ($request->hasFile('image')) {
            if ($training->image && Storage::disk('public')->exists($training->image)) {
                Storage::disk('public')->delete($training->image);
            }
            $path = $request->file('image')->store('trainings', 'public');
            $training->image = $path;
        }

        $training->save();

        return redirect()->route('company.index')
            ->with('success', 'Training updated successfully');
    }

    public function destroy($id)
    {
        $training = Training::findOrFail($id);

        if ($training->image && Storage::disk('public')->exists($training->image)) {
            Storage::disk('public')->delete($training->image);
        }

        $training->delete();

        return redirect()->route('company.index')
            ->with('success', 'Training deleted successfully');
    }

    // ✅ Show all applied trainings to this company
    public function appliedTrainings()
    {
        // Fetch all applications (you can filter by company ID if needed)
        $applications = TrainingApplication::with('user', 'training')->get();

        return view('company.applied_trainings', compact('applications'));
    }

    // ✅ Update application status (approve/reject)
    public function updateStatus(Request $request, $id)
    {
        $application = TrainingApplication::findOrFail($id);
        $application->status = $request->status; // 'approved' or 'rejected'
        $application->save();

        return redirect()->back()->with('success', 'Application status updated successfully.');
    }
}
