<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\SafetyTip;

class SafetytipsController extends Controller
{
    public function index()
    {
        $tips = SafetyTip::latest()->get();
        return view('visitor.safety-tips', compact('tips'));
    }
}
