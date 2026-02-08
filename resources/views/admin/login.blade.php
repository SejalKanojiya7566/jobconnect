@extends('layouts.main')

@section('content')

<section class="section" style="max-width:420px;margin:auto;">
    
    <div class="form-card">

        <h2 style="text-align:center;margin-bottom:10px;">
            Admin Login
        </h2>

      
        {{-- ERROR MESSAGE --}}
        @if(session('error'))
            <p style="color:#ef4444;margin-bottom:15px;text-align:center;">
                {{ session('error') }}
            </p>
        @endif

        <form method="POST" action="{{ route('admin.authenticate') }}">
            @csrf

            <input 
                type="email" 
                name="email" 
                placeholder="Admin Email"
                required>

            <input 
                type="password" 
                name="password" 
                placeholder="Password"
                required>

            <button type="submit" class="btn" style="width:100%;">
                Login
            </button>
        </form>

    </div>

</section>

@endsection
