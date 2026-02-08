@extends('layouts.main')

@section('content')

<section class="section">

    <div class="section-title">
        <h2>Latest Jobs</h2>
        <p>Find jobs that match your skills and career goals</p>
    </div>

    <!-- &#128270; JOB FILTERS -->
    <form method="GET" action="{{ route('jobs') }}" class="job-filter-form">

        <select name="location">
            <option value="">All Locations</option>
            @foreach($jobs->pluck('location')->unique() as $location)
                <option value="{{ $location }}" {{ request('location')==$location ? 'selected' : '' }}>
                    {{ $location }}
                </option>
            @endforeach
        </select>

        <select name="job_type">
            <option value="">All Job Types</option>
            @foreach($jobs->pluck('job_type')->unique() as $type)
                <option value="{{ $type }}" {{ request('job_type')==$type ? 'selected' : '' }}>
                    {{ $type }}
                </option>
            @endforeach
        </select>

        <button class="btn">Filter</button>
        <a href="{{ route('jobs') }}" class="btn-sm danger">Reset</a>

    </form>

    <!-- &#129513; JOB CARDS -->
    <div class="jobs-grid">

     @forelse($jobs as $job)
    <div class="job-card-ui">

        <h3>{{ $job->title }}</h3>

        <p class="company">{{ $job->company }}</p>

        <p class="location">{{ $job->location }}</p>

        <!--JOB META (TYPE + SALARY) -->
        <div class="job-meta">
            <span class="badge">{{ $job->job_type }}</span>

            @if($job->salary)
                <span class="salary">{{ $job->salary }}</span>
            @endif
        </div>

        <div class="job-actions">
            <a href="{{ route('jobs.show',$job->id) }}" class="btn-sm">
                View Job
            </a>
        </div>

    </div>
@empty            <p style="text-align:center;width:100%;color:#64748b;">
                No jobs found for selected filters.
            </p>
        @endforelse

    </div>

</section>

@endsection
