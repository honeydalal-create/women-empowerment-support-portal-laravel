<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        // Return the articles view
        return view('visitor.articles'); // Make sure this Blade file exists
    }
}
