<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HelplineNumber;
use Illuminate\Http\Request;

class HelplineNumberController extends Controller
{
    public function index()
{
    $helplines = \App\Models\HelplineNumber::latest()->get();
    return view('admin.helplines', compact('helplines'));
}
    public function create()
{
    return view('admin.helplines_create');
}




    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'description' => 'nullable',
        ]);

        HelplineNumber::create($request->all());

        return redirect()->route('admin.helplines.index')
                         ->with('success', 'Helpline added successfully');
    }


public function edit(HelplineNumber $helpline)
{
    return view('admin.helplines_edit', compact('helpline'));
}


    public function update(Request $request, HelplineNumber $helpline)
    {
        $helpline->update($request->all());

        return redirect()->route('admin.helplines.index')
                         ->with('success', 'Helpline updated successfully');
    }

    public function destroy(HelplineNumber $helpline)
    {
        $helpline->delete();

        return back()->with('success', 'Helpline deleted successfully');
    }
}
