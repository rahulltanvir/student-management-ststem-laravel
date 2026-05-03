<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
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
    <a href="#">Add Session</a>
    <a href="#">Add Student</a>
</div>

<!-- Dynamic Content -->
<div class="content">
    @yield('content')
</div>

</body>
</html>