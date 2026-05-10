@extends('layouts.main')
@section('title')
Dashboard
@endsection
@section('content')

<div class="container-fluid">

    {{-- Page Title --}}
    <div class="mb-4">
        <h3 class="fw-bold">Dashboard</h3>
        <p class="text-muted">Overview of your system</p>
    </div>

    {{-- Cards Row --}}
    <div class="row g-4">

        {{-- Total Students --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-white bg-primary">
                <div class="card-body">
                    <h5>Total Students</h5>
                    <h2 class="fw-bold">{{ $totalStudent }}</h2>
                </div>
            </div>
        </div>

        {{-- Active Students --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-white bg-success">
                <div class="card-body">
                    <h5>Active Students</h5>
                    <h2 class="fw-bold">{{ $ActiveStudent }}</h2>
                </div>
            </div>
        </div>

        {{-- Inactive Students --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-white bg-danger">
                <div class="card-body">
                    <h5>Inactive Students</h5>
                    <h2 class="fw-bold">{{ $InactiveStudent }}</h2>
                </div>
            </div>
        </div>

    </div>

</div>
{{-- table --}}
<div class="col-md-12 p-3">
           <h5 class="text-center">Recent Students</h5>  
</div>
<table class="table table-bordered table-hover text-center align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Session</th>
                            <th>Phone</th>
                            <th>Time & Date</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody">
                        <h3></h3>
                        @forelse($recentStudents as $key => $student)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $student->std_name }}</td>
                                <td>{{ $student->std_roll }}</td>
                                <td>{{ $student->studentClass->class_name ?? '' }}</td>
                                <td>{{ $student->section->section ?? '' }}</td>
                                <td>{{ $student->session->sessionyear ?? '' }}</td>
                                <td>{{ $student->std_phn }}</td>
                                <td>{{ $student->created_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-muted">
                                    No Students Found
                                </td>
                            </tr>
                        @endforelse

                        {{-- NO DATA FOUND ROW (FOR SEARCH) --}}
                        <tr id="noDataRow" style="display:none;">
                            <td colspan="9" class="text-danger text-center">
                                No Data Found
                            </td>
                        </tr>

                    </tbody>

                </table>

@endsection