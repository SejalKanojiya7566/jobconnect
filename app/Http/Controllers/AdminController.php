<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Job;
use App\Models\Applicant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /* ================= LOGIN ================= */

    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Session::put('admin_logged_in', true);
            Session::put('admin_id', $admin->id);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid email or password');
    }

    /* ================= DASHBOARD ================= */

    public function dashboard()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect('/admin/login');
        }

        return view('admin.dashboard', [
            'totalJobs'        => Job::count(),
            'totalApplicants'  => Applicant::count(),
            'pendingCount'     => Applicant::where('status', 'Pending')->count(),
            'approvedCount'    => Applicant::where('status', 'Approved')->count(),
            'rejectedCount'    => Applicant::where('status', 'Rejected')->count(),
        ]);
    }

    /* ================= APPLICANTS ================= */

    public function applicants(Request $request)
    {
        if (!Session::get('admin_logged_in')) {
            return redirect('/admin/login');
        }

        $query = Applicant::with('job')->latest();

        // Status filter (Pending / Approved / Rejected)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return view('admin.applicants', [
            'applicants' => $query->get()
        ]);
    }

    /* ================= APPROVE / REJECT ================= */

    public function approveApplicant($id)
    {
        Applicant::where('id', $id)->update([
            'status' => 'Approved'
        ]);

        return back()->with('success', 'Applicant Approved');
    }

    public function rejectApplicant($id)
    {
        Applicant::where('id', $id)->update([
            'status' => 'Rejected'
        ]);

        return back()->with('success', 'Applicant Rejected');
    }

    /* ================= LOGOUT ================= */

    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_id');

        return redirect('/admin/login');
    }
}