<?php

namespace App\Http\Controllers\woman;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JoblistingController extends Controller
{
    public function index()
    {
        // Return the jobs view
        return view('woman.joblisting'); // Make sure this Blade view exists
    }
}
