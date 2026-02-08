<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function store(Request $request)
    {
        // &#128274; STRONG BACKEND VALIDATION
        $request->validate([
            'job_id' => 'required|exists:jobs,id',

            // Name: only letters & spaces, min 3 chars
            'name' => [
                'required',
                'regex:/^[A-Za-z\s]+$/',
                'min:3',
                'max:50'
            ],

            // Email: valid format
            'email' => 'required|email',

            // Phone: exactly 10 digits ONLY
            'phone' => 'required|digits:10',

            // Resume: only allowed files
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
        ], [
            // &#10024; Custom error messages (optional but professional)
            'name.regex' => 'Name should contain only letters.',
            'phone.digits' => 'Phone number must be exactly 10 digits.',
            'resume.mimes' => 'Resume must be a PDF or Word file.',
        ]);

        // &#10060; SAME JOB + SAME EMAIL CHECK
        $alreadyApplied = Applicant::where('job_id', $request->job_id)
            ->where('email', $request->email)
            ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'You have already applied for this job.');
        }

        // &#128193; UPLOAD RESUME
        $resumePath = $request->resume->store('resumes', 'public');

        // &#128190; SAVE DATA
        Applicant::create([
            'job_id' => $request->job_id,
            'name'   => $request->name,
            'email'  => $request->email,
            'phone'  => $request->phone,
            'resume' => $resumePath,
            'status' => 'Pending',
        ]);

        return back()->with('success', 'Applied successfully');
    }
}