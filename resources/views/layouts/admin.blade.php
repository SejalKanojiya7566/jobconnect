<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - JobConnect</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2>JobConnect</h2>

        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.jobs') }}">Manage Jobs</a>
        <a href="{{ route('admin.applicants') }}">Applicants</a>
        <a href="{{ route('admin.contacts') }}">Contact Messages</a>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="logout-btn">
                Logout
            </button>
        </form>
    </aside>

    <!-- CONTENT -->
    <main class="admin-content">
        @yield('content')
    </main>

</div>

</body>
</html>
