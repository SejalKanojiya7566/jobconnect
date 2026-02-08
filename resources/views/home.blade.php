@extends('layouts.main')

@section('content')

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <h1>Find the Right Job.<br>Build Your Career.</h1>
        <p>
            JobConnect helps job seekers find verified jobs and
            employers hire the right talent faster.
        </p>
        <a href="/jobs">Browse Jobs</a>
    </div>
</section>

<!-- FEATURES -->
<section class="section">
    <div class="section-title">
        <h2>Why JobConnect?</h2>
    </div>

    <div class="job-grid">
        <div class="job-card">
            <h3>Verified Jobs</h3>
            <p>All job listings are verified by trusted employers.</p>
        </div>

        <div class="job-card">
            <h3>Easy Apply</h3>
            <p>Apply for jobs with a simple and fast process.</p>
        </div>

        <div class="job-card">
            <h3>Career Growth</h3>
            <p>Opportunities that match your skills and goals.</p>
        </div>
    </div>
</section>

@endsection
