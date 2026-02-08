@extends('layouts.admin')

@section('content')

<div class="section">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;">
        <h2>Manage Jobs</h2>

        <a href="{{ route('admin.jobs.create') }}" class="btn">
            + Add Job
        </a>
    </div>

    <div class="admin-jobs-grid">
        @foreach($jobs as $job)
            <div class="admin-job-card">

                <h3>{{ $job->title }}</h3>

                <p class="company">{{ $job->company }}</p>

                <p class="location">{{ $job->location }}</p>

                <span class="job-type">{{ $job->job_type }}</span>

                <p class="status">
                    Status:
                    <strong>{{ $job->status }}</strong>
                </p>

                <div class="job-actions">
                    <a href="{{ route('admin.jobs.edit',$job->id) }}"
                       class="btn-sm">
                        Edit
                    </a>

                    <a href="{{ route('admin.jobs.delete',$job->id) }}"
                       class="btn-sm danger"
                       onclick="return confirm('Delete this job?')">
                        Delete
                    </a>
                </div>

            </div>
        @endforeach
    </div>

</div>

@endsection
