<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\HelplineNumber;

class HelplineController extends Controller
{
    public function index()
    {
        // Admin dwara add kiye gaye helplines
        $helplines = HelplineNumber::latest()->get();

        return view('visitor.helpline', compact('helplines'));
    }
}
