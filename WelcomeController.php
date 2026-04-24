<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class welcomeController extends Controller
{
    public function index()
    {
        return view('visitor.welcome'); // Make sure this view exists
    }
}
