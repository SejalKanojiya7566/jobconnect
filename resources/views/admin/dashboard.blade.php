@extends('layouts.admin')

@section('content')

<h2 class="page-title">Admin Dashboard</h2>

<div class="dashboard-grid">

    <!-- TOTAL JOBS -->
    <a href="{{ route('admin.jobs') }}" class="dash-card">
        <p>Total Jobs</p>
        <h1>{{ $totalJobs }}</h1>
    </a>

    <!-- TOTAL APPLICANTS -->
    <a href="{{ route('admin.applicants') }}" class="dash-card">
        <p>Total Applicants</p>
        <h1>{{ $totalApplicants }}</h1>
    </a>

    <!-- PENDING -->
    <a href="{{ route('admin.applicants', ['status'=>'Pending']) }}" class="dash-card pending">
        <p>Pending</p>
        <h1>{{ $pendingCount }}</h1>
    </a>

    <!-- APPROVED -->
    <a href="{{ route('admin.applicants', ['status'=>'Approved']) }}" class="dash-card approved">
        <p>Approved</p>
        <h1>{{ $approvedCount }}</h1>
    </a>

    <!-- REJECTED -->
    <a href="{{ route('admin.applicants', ['status'=>'Rejected']) }}" class="dash-card rejected">
        <p>Rejected</p>
        <h1>{{ $rejectedCount }}</h1>
    </a>

</div>

@endsection