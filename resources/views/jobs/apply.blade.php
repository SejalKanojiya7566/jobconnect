@extends('layouts.main')

@section('content')

<section class="section">
    <div class="form-card">
        <h2>Apply for {{ $job->title }}</h2>

        <form method="POST" action="/jobs/{{ $job->id }}/apply">
            @csrf

            <!-- NAME : Only letters -->
            <input type="text"
                   name="name"
                   placeholder="Full Name"
                   pattern="[A-Za-z\s]+"
                   title="Name should contain only letters"
                   required>

            <!-- EMAIL : Already validated by browser -->
            <input type="email"
                   name="email"
                   placeholder="Email Address"
                   required>

            <!-- PHONE : Exactly 10 digits -->
            <input type="tel"
                   name="phone"
                   placeholder="Phone Number"
                   pattern="[0-9]{10}"
                   maxlength="10"
                   title="Enter exactly 10 digit phone number"
                   required>

            <textarea name="message"
                      placeholder="Why should we hire you?"
                      rows="4"
                      required></textarea>

            <button type="submit" class="btn">
                Submit Application
            </button>
        </form>
    </div>
</section>

@endsection