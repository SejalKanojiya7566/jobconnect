@extends('layouts.main')

@section('content')

<section class="section job-detail">

    <h2>{{ $job->title }}</h2>
    <p>
        <strong>{{ $job->company }}</strong> &bull; {{ $job->location }}
    </p>

    <p style="margin-top:20px;">
        {{ $job->description }}
    </p>

    <hr style="margin:40px 0;">

    <h3>Apply for this job</h3>

    {{-- &#9989; SUCCESS MESSAGE --}}
    @if(session('success'))
        <div style="
            background:#dcfce7;
            color:#166534;
            padding:12px;
            border-radius:6px;
            margin-bottom:15px;
        ">
            {{ session('success') }}
        </div>
    @endif

    {{-- &#10060; ERROR MESSAGE (Already Applied) --}}
    @if(session('error'))
        <div style="
            background:#fee2e2;
            color:#991b1b;
            padding:12px;
            border-radius:6px;
            margin-bottom:15px;
        ">
            {{ session('error') }}
        </div>
    @endif

    {{-- &#10060; VALIDATION ERRORS --}}
    @if($errors->any())
        <div style="
            background:#fff7ed;
            color:#9a3412;
            padding:12px;
            border-radius:6px;
            margin-bottom:15px;
        ">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="form-card">
        <form action="{{ route('apply') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="job_id" value="{{ $job->id }}">

            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="phone" placeholder="Your Phone Number" required>

            <input type="file" name="resume" required accept=".pdf,.doc,.docx">

            <button class="btn">
                Apply Now
            </button>
        </form>
    </div>

</section>

@endsection