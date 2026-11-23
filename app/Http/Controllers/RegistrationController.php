<?php

namespace App\Http\Controllers;

use App\Models\Mentee;
use App\Models\Mentor;
use App\Models\Organization;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function mentor(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:mentors,email',
            'phone' => 'required|string|max:30',
            'expertise' => 'required|string|max:255',
            'experience' => 'required|in:5–10 years,10–15 years,15–20 years,20+ years',
            'terms_accepted' => 'accepted',
        ]);

        Mentor::create($validated);

        return redirect()->back()->with(
            'success',
            'Your mentor registration has been submitted successfully!'
        );
    }

    public function mentee(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:mentees,email',
            'phone' => 'required|string|max:30',
            'goals' => 'required|string|max:5000',
            'profession' => 'nullable|string|max:255',
            'terms_accepted' => 'accepted',
        ]);

        Mentee::create($validated);

        return redirect()->back()->with(
            'success',
            'Your mentee registration has been submitted successfully!'
        );
    }

    public function organization(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:organizations,email',
            'phone' => 'required|string|max:30',
            'organization_name' => 'required|string|max:255',
            'requirements' => 'required|string|max:5000',
            'terms_accepted' => 'accepted',
        ]);

        Organization::create($validated);

        return redirect()->back()->with(
            'success',
            'Your organization registration has been submitted successfully!'
        );
    }
}
