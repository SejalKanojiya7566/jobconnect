@extends('layouts.admin')

@section('content')

<h2 class="page-title">Applicants</h2>

<div class="applicants-grid">

@forelse($applicants as $a)

  <div class="applicant-card">

    <!-- HEADER -->
    <div class="applicant-header">
      <h3>{{ $a->name }}</h3>

      @php
        $status = $a->status ?? 'Pending';
      @endphp

      <span class="status 
        {{ strtolower($status) }}">
        {{ $status }}
      </span>
    </div>

    <!-- BODY -->
    <div class="applicant-body">
      <p><strong>Email:</strong> {{ $a->email }}</p>

      <p>
        <strong>Applied For:</strong>
        {{ $a->job->title ?? 'N/A' }}
      </p>
    </div>

    <!-- ACTIONS -->
    <div class="applicant-actions">

      {{-- Resume --}}
      @if($a->resume)
        <a href="{{ asset('storage/'.$a->resume) }}"
           target="_blank"
           class="btn btn-resume">
           View Resume
        </a>
      @else
        <span class="no-resume">No Resume</span>
      @endif

      {{-- STATUS ACTIONS --}}
      @if($status === 'Pending')
        <form action="{{ route('admin.applicant.approve',$a->id) }}"
              method="POST" style="display:inline;">
          @csrf
          <button class="btn btn-approve">Approve</button>
        </form>

        <form action="{{ route('admin.applicant.reject',$a->id) }}"
              method="POST" style="display:inline;">
          @csrf
          <button class="btn btn-reject">Reject</button>
        </form>
      @endif

    </div>

  </div>

@empty
  <p>No applicants found.</p>
@endforelse

</div>

@endsection