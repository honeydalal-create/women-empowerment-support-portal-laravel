<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ViewcontactController extends Controller
{
    // Show all visitor messages
    public function index() {
        $contacts = Contact::latest()->get(); // latest messages first
        return view('admin.contacts', compact('contacts')); // Note: no "index" in the path
    }

    // Save admin reply
    public function reply(Request $request, $id) {
        $request->validate([
            'admin_reply' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->admin_reply = $request->admin_reply;
        $contact->save();

        return back()->with('success', 'Reply sent successfully!');
    }
}
