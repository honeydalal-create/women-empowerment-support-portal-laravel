<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Show contact form
    public function index() {
        return view('visitor.contact'); // make sure your blade is in visitor folder
    }

    // Store contact form submission
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Contact::create($request->only('name', 'email', 'mobile', 'message'));

        return back()->with('success', 'Your message has been sent successfully!');
    }

    // Show the form where visitor enters email
public function showCheckReplyForm() {
    return view('visitor.check-reply');
}

// Process the email and show admin replies
public function checkReply(Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    $contacts = Contact::where('email', $request->email)
                       ->whereNotNull('admin_reply')
                       ->get();

    return view('visitor.check-reply', compact('contacts', 'request'));
}


}
