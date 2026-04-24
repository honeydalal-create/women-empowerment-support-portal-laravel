<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        // Return the jobs view
        return view('visitor.jobs'); // Make sure this Blade view exists
    }
}
