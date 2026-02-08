<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| JobConnect - Web Routes
|--------------------------------------------------------------------------
*/

/* ================= PUBLIC ROUTES ================= */

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Jobs (Public)
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

// About
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Contact
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');

// Apply Job
Route::post('/apply', [ApplicantController::class, 'store'])->name('apply');


/* ================= ADMIN AUTH ================= */

// Admin Login
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');

// Admin Logout
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


/* ================= ADMIN DASHBOARD ================= */

// Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');


/* ================= ADMIN JOBS ================= */

// Manage Jobs
Route::get('/admin/jobs', [JobController::class, 'adminJobs'])
    ->name('admin.jobs');

// Add Job
Route::get('/admin/jobs/create', [JobController::class, 'create'])
    ->name('admin.jobs.create');

// Store Job
Route::post('/admin/jobs/store', [JobController::class, 'store'])
    ->name('admin.jobs.store');

// Edit Job
Route::get('/admin/jobs/edit/{id}', [JobController::class, 'edit'])
    ->name('admin.jobs.edit');

// Update Job
Route::post('/admin/jobs/update/{id}', [JobController::class, 'update'])
    ->name('admin.jobs.update');

// Delete Job
Route::get('/admin/jobs/delete/{id}', [JobController::class, 'delete'])
    ->name('admin.jobs.delete');


/* ================= ADMIN APPLICANTS ================= */

// View Applicants
Route::get('/admin/applicants', [AdminController::class, 'applicants'])
    ->name('admin.applicants');

// Approve Applicant
Route::post('/admin/applicant/{id}/approve', [AdminController::class, 'approveApplicant'])
    ->name('admin.applicant.approve');

// Reject Applicant
Route::post('/admin/applicant/{id}/reject', [AdminController::class, 'rejectApplicant'])
    ->name('admin.applicant.reject');


/* ================= ADMIN CONTACT MESSAGES ================= */

// View + SEARCH Contact Messages
Route::get('/admin/contacts', function (Request $request) {

    $query = Contact::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%')
              ->orWhere('message', 'like', '%' . $request->search . '%');
    }

    $contacts = $query->latest()->get();

    return view('admin.contacts', compact('contacts'));

})->name('admin.contacts');

// DELETE Contact Message
Route::get('/admin/contacts/delete/{id}', function ($id) {
    Contact::findOrFail($id)->delete();
    return back()->with('success', 'Contact message deleted');
})->name('admin.contacts.delete');