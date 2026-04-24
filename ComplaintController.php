<?php

namespace App\Http\Controllers\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    
    protected $guard = 'female_user';

    public function create()
    {
        $user = Auth::guard($this->guard)->user();
        return view('woman.submit-complaint', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        $user = Auth::guard($this->guard)->user();

        Complaint::create([
            'user_id' => $user->id,
            'name'    => $user->name,
            'email'   => $user->email,
            'phone'   => $user->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('woman.complaint.status')
            ->with('success','Complaint submitted successfully');
    }

    public function status()
    {
        $complaints = Complaint::where('user_id', Auth::guard($this->guard)->id())
            ->latest()
            ->get();

        return view('woman.complaint-status', compact('complaints'));
    }
}
