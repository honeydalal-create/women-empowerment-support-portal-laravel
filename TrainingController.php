<?php

// app/Http/Controllers/Visitor/TrainingController.php
namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Training;

class TrainingController extends Controller
{
    public function index()
    {
        $trainings = Training::latest()->get();
        return view('visitor.training', compact('trainings'));
    }
}


