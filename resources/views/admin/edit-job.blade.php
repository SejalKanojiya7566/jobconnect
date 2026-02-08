@extends('layouts.admin')

@section('content')

<h2 style="margin-bottom:20px;">Edit Job</h2>

<div class="form-card">

<form action="{{ route('admin.jobs.update',$job->id) }}" method="POST">
    @csrf

    <input type="text" name="title" value="{{ $job->title }}" required>
    <input type="text" name="company" value="{{ $job->company }}" required>
    <input type="text" name="location" value="{{ $job->location }}" required>

    <select name="job_type" required>
        <option value="Full Time" {{ $job->job_type=='Full Time'?'selected':'' }}>Full Time</option>
        <option value="Part Time" {{ $job->job_type=='Part Time'?'selected':'' }}>Part Time</option>
        <option value="Internship" {{ $job->job_type=='Internship'?'selected':'' }}>Internship</option>
        <option value="Remote" {{ $job->job_type=='Remote'?'selected':'' }}>Remote</option>
    </select>

    <textarea name="description" rows="5" required>{{ $job->description }}</textarea>

    <button class="btn">Update Job</button>
</form>

</div>

@endsection
