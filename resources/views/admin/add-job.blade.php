@extends('layouts.admin')

@section('content')

<h2 style="margin-bottom:20px;">Add New Job</h2>

<div class="form-card">

    @if ($errors->any())
        <div style="color:red;margin-bottom:15px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('admin.jobs.store') }}" method="POST">
        @csrf

        <input type="text" name="title" placeholder="Job Title" required>

        <input type="text" name="company" placeholder="Company Name" required>

        <input type="text" name="location" placeholder="Location" required>

        <select name="job_type" required>
            <option value="">Select Job Type</option>
            <option value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
            <option value="Internship">Internship</option>
            <option value="Remote">Remote</option>
        </select>

        <!-- &#9989; SALARY FIELD -->
        <input 
            type="text" 
            name="salary" 
            placeholder="Salary (in LPA)" 
            required
        >

        <textarea 
            name="description" 
            rows="5" 
            placeholder="Job Description" 
            required>
        </textarea>

        <button class="btn">Add Job</button>
    </form>
</div>

@endsection