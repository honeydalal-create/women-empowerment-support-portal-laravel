<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingsController extends Controller
{
    // LIST TRAININGS
    public function index()
    {
        $trainings = Training::latest()->get();
        return view('admin.index', compact('trainings'));
    }

    // CREATE FORM
    public function create()
    {
        return view('admin.create');
    }

    // STORE TRAINING
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('trainings', 'public');
        }

        Training::create($data);

        return redirect()->route('admin.trainings.index')->with('success', 'Training Added Successfully');
    }

    // EDIT FORM
    public function edit($id)
    {
        $training = Training::findOrFail($id);
        return view('admin.edit', compact('training'));
    }

    // UPDATE TRAINING
    public function update(Request $request, $id)
    {
        $training = Training::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|string|max:100',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        if ($request->hasFile('image')) {
            if ($training->image && Storage::disk('public')->exists($training->image)) {
                Storage::disk('public')->delete($training->image);
            }
            $data['image'] = $request->file('image')->store('trainings', 'public');
        }

        $training->update($data);

        return redirect()->route('admin.trainings.index')->with('success', 'Training Updated Successfully');
    }

    // DELETE TRAINING
    public function destroy($id)
    {
        $training = Training::findOrFail($id);

        if ($training->image && Storage::disk('public')->exists($training->image)) {
            Storage::disk('public')->delete($training->image);
        }

        $training->delete();

        return redirect()->route('admin.trainings.index')->with('success', 'Training Deleted Successfully');
    }
}



