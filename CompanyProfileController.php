<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Company;

class CompanyProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::guard('company')->check()) {
                return redirect()->route('company.login');
            }
            return $next($request);
        });
    }


    public function index()
    {

        $company = Auth::guard('company')->user();
        return view('company.profile', compact('company'));
    }


    public function edit()
    {
        /** @var Company $company */
        $company = Auth::guard('company')->user();
        return view('company.profile_edit', compact('company'));
    }


    public function update(Request $request)
    {
        /** @var Company $company */
        $company = Auth::guard('company')->user();

        if (!$company) {
            return redirect()->route('company.login');
        }

        // Validate request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|min:6|confirmed',
        ]);

        // Update basic data
        $company->name = $request->name;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->address = $request->address;

        // Update password if provided
        if ($request->filled('password')) {
            $company->password = Hash::make($request->password);
        }

        // Update logo if uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($company->logo && Storage::exists($company->logo)) {
                Storage::delete($company->logo);
            }

            // Store new logo
            $path = $request->file('logo')->store('public/company_logos');
            $company->logo = str_replace('public/', '', $path);
        }

        // Save company
        $company->save();

        return redirect()->route('company.profile')
            ->with('success', 'Profile updated successfully');
    }
}
