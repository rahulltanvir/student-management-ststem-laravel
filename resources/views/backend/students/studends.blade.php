@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card p-4">
                <h5 style="text-align:center">Add Student</h5>

                <form action="#" method="POST">
                    @csrf

                    <label>Name:</label>
                    <input type="text" name="std_name" class="form-control mb-2">

                    <label>Roll:</label>
                    <input type="text" name="std_roll" class="form-control mb-2">

                    <label>Class:</label>
                    <select name="std_class" class="form-control mb-2">
                        {{-- @foreach($classes as $class) --}}
                            {{-- <option value="{{ $class->id }}">{{ $class->s_class }}</option> --}}
                        {{-- @endforeach --}}
                    </select>

                    <label>Section:</label>
                    <select name="std_section" class="form-control mb-2">
                        {{-- @foreach($sections as $section) --}}
                            {{-- <option value="{{ $section->id }}">{{ $section->s_section }}</option> --}}
                        {{-- @endforeach --}}
                    </select>

                    <label>Session:</label>
                    <select name="std_session" class="form-control mb-2">
                        {{-- @foreach($sessions as $session) --}}
                            {{-- <option value="{{ $session->id }}">{{ $session->sessionyear }}</option> --}}
                        {{-- @endforeach --}}
                    </select>

                    <label>Phone:</label>
                    <input type="text" name="std_phn" class="form-control mb-2">

                    <label>Status:</label>
                    <select name="std_status" class="form-control mb-2">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>

                    <button class="btn btn-success w-100">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection


