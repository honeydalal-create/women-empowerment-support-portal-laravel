<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;

class ViewComplaintController extends Controller
{
    // Show all complaints
    public function index()
    {
        $complaints = Complaint::latest()->get();
        return view('admin.view-complaints', compact('complaints'));
    }

    // Save admin reply
    public function reply(Request $request, $id)
    {
        $request->validate([
            'admin_reply' => 'required|string',
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->admin_reply = $request->admin_reply;
        $complaint->status = 'replied';
        $complaint->save();

        return redirect()->back()->with('success', 'Reply submitted successfully!');
    }
}
