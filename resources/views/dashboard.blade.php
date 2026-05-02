@extends('layouts.main')

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
                    <h2 class="fw-bold">6</h2>
                </div>
            </div>
        </div>

        {{-- Active Students --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-white bg-success">
                <div class="card-body">
                    <h5>Active Students</h5>
                    <h2 class="fw-bold">4</h2>
                </div>
            </div>
        </div>

        {{-- Inactive Students --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 text-white bg-danger">
                <div class="card-body">
                    <h5>Inactive Students</h5>
                    <h2 class="fw-bold">2</h2>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection