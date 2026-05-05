@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            {{-- Success message --}}
            @if(session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        // timer: 2000,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "{{ route('students.list') }}";
                    });
                </script>
            @endif

            {{-- Error message (ONLY SWEETALERT) --}}
            @if ($errors->any())
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error!',
                        html: `{!! implode('<br>', $errors->all()) !!}`,
                        confirmButtonColor: '#dc2626'
                    });
                </script>
            @endif

            <div class="card p-4">
                <h5 style="text-align:center">Add Student</h5>

                <form action="{{ route('students.store') }}" method="POST">
                    @csrf

                    <label>Name:</label>
                    <input type="text" name="std_name" class="form-control mb-2" placeholder=" name">

                    <label>Roll:</label>
                    <input type="text" name="std_roll" class="form-control mb-2" placeholder=" roll">

                    <label>Class:</label>
                    <select name="std_class" class="form-control mb-2">
                        <option value="">Select Class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>

                    <label>Section:</label>
                    <select name="std_section" class="form-control mb-2">
                        <option value="">Select Section</option>
                        @foreach($Sections as $section)
                            <option value="{{ $section->id }}">{{ $section->section }}</option>
                        @endforeach
                    </select>

                    <label>Session:</label>
                    <select name="std_session" class="form-control mb-2">
                        <option value="">Select Session</option>
                        @foreach($SessionYears as $session)
                            <option value="{{ $session->id }}">{{ $session->sessionyear }}</option>
                        @endforeach
                    </select>

                    <label>Phone:</label>
                    <input type="text" name="std_phn" class="form-control mb-2" placeholder="phone">

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