<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use Carbon\Carbon;

class JobController extends Controller
{
    /* ================= PUBLIC ================= */

    // Public jobs list + FILTERS
    public function index(Request $request)
    {
        $query = Job::where('status', 'Active');

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('job_type')) {
            $query->where('job_type', $request->job_type);
        }

        $jobs = $query->latest()->get();

        return view('jobs.index', compact('jobs'));
    }

    // Job detail page
    public function show($id)
    {
        $job = Job::where('status', 'Active')->findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    /* ================= APPLY JOB ================= */

    public function apply(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/',
                'min:3',
                'max:50'
            ],
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^[0-9]{10}$/'],
            'message' => 'required|min:10|max:500',
        ], [
            'name.required'  => 'Full name is required',
            'name.regex'    => 'Name should contain only letters',
            'email.required'=> 'Email is required',
            'email.email'   => 'Enter a valid email address',
            'phone.required'=> 'Phone number is required',
            'phone.regex'   => 'Phone number must be exactly 10 digits',
            'message.required' => 'Message is required',
            'message.min'   => 'Message must be at least 10 characters',
        ]);

        Application::create([
            'job_id'  => $id,
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'message' => $request->message,
            'status'  => 'Pending',
        ]);

        return back()->with('success', 'Application submitted successfully');
    }

    /* ================= ADMIN ================= */

    // Show all jobs (Admin)
    public function adminJobs()
    {
        $jobs = Job::latest()->get();
        return view('admin.jobs', compact('jobs'));
    }

    // Show add job form
    public function create()
    {
        return view('admin.add-job');
    }

    // Store Job
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'company'     => 'required',
            'location'    => 'required',
            'job_type'    => 'required',
            'salary'      => 'nullable',
            'description' => 'required',
        ]);

        Job::create([
            'title'       => $request->title,
            'company'     => $request->company,
            'location'    => $request->location,
            'job_type'    => $request->job_type,
            'salary'      => $request->salary,
            'description' => $request->description,
            'status'      => 'Active',
            'expires_at'  => Carbon::now()->addDays(30),
        ]);

        return redirect('/admin/jobs')->with('success', 'Job Added Successfully');
    }

    // Edit job form
    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('admin.edit-job', compact('job'));
    }

    // Update job
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'company'     => 'required',
            'location'    => 'required',
            'job_type'    => 'required',
            'salary'      => 'nullable',
            'description' => 'required',
        ]);

        Job::findOrFail($id)->update([
            'title'       => $request->title,
            'company'     => $request->company,
            'location'    => $request->location,
            'job_type'    => $request->job_type,
            'salary'      => $request->salary,
            'description' => $request->description,
        ]);

        return redirect('/admin/jobs')->with('success', 'Job Updated Successfully');
    }

    // Delete job
    public function delete($id)
    {
        Job::findOrFail($id)->delete();
        return back()->with('success', 'Job Deleted');
    }
}