<!DOCTYPE html>
<html>
<head>
    <title>Student Management - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<!-- Topbar -->
<div class="topbar">
    <div><a href="{{ route('dashboard') }}">Admin Dashboard</a></div>
    <div>
        Welcome Admin
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>
</div>

<!-- Sidebar -->
<div class="sidebar">
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('class') }}">Add Class</a>
    <a href="{{ route('section') }}">Add Section</a>
    <a href="{{ route('session-year') }}">Add Session</a>
    <a href="{{ route('students.create') }}">Add Student</a>
    <a href="{{ route('students.list') }}">Student List</a>
</div>

<!-- Dynamic Content -->
<div class="content">
    @yield('content')
</div>

</body>
</html>
   