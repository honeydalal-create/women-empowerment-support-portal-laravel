<?php

namespace App\Http\Controllers\Woman;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Use the correct guard
        $user = Auth::guard('female_user')->user();
        return view('woman.dashboard', compact('user'));
    }
}
