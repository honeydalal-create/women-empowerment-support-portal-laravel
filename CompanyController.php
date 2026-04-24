<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\TrainingApplication;

class CompanyController extends Controller
{
    public function yearlyReport()
    {
        // -------------------------------
        // Job Report (2024-2026)
        // -------------------------------
        $years = [2024, 2025, 2026];
        $hiredData = [];
        $rejectedData = [];

        foreach ($years as $year) {
            $hiredData[] = JobApplication::where('status', 'hired')
                            ->whereYear('created_at', $year)
                            ->count();

            $rejectedData[] = JobApplication::where('status', 'rejected')
                            ->whereYear('created_at', $year)
                            ->count();
        }

        $totalHired = array_sum($hiredData);
        $totalRejected = array_sum($rejectedData);

        // -------------------------------
        // Training Report (Pie Chart) Approved vs Rejected
        // -------------------------------
        $totalApprovedTrainings = TrainingApplication::where('status', 'approved')->count();
        $totalRejectedTrainings = TrainingApplication::where('status', 'rejected')->count();

        // -------------------------------
        // Pass all variables to the Blade
        // -------------------------------
        return view('company.yearly-job-report', compact(
            'years',
            'hiredData',
            'rejectedData',
            'totalHired',
            'totalRejected',
            'totalApprovedTrainings',
            'totalRejectedTrainings'
        ));
    }
}
