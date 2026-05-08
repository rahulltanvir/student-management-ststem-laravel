@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                {{-- Success message --}}


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
                    <h5 style="text-align:center">update Student</h5>

                    <form action="{{ route('students.update', $students->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <label>Name:</label>
                        <input type="text" name="up_name" class="form-control mb-2" placeholder="{{ $students->std_name }}">

                        <label>Roll:</label>
                        <input type="text" name="up_roll" class="form-control mb-2"
                            placeholder="{{ $students->std_roll }}">

                        <label>Class:</label>
                        <select name="up_class" class="form-control mb-2">
                            <option value="">Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}" {{ $students->std_class_id == $class->id ? 'selected' : '' }}>
                                    {{ $class->class_name }}
                                </option>
                            @endforeach
                        </select>

                        <label>Section:</label>
                        <select name="up_section" class="form-control mb-2">
                            <option value="">Select Section</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}" {{ $students->std_section_id  == $section->id ? 'selected' : ''}}>{{ $section->section }}</option>
                            @endforeach
                        </select>

                        <label>Session:</label>
                        <select name="up_session" class="form-control mb-2">
                            <option value="">Select Session</option>
                            @foreach ($sessionYears as $session)
                                <option value="{{ $session->id }}" {{ $students->std_session_id == $session->id ? 'selected' : '' }}>{{ $session->sessionyear }}</option>
                            @endforeach
                        </select>

                        <label>Phone:</label>
                        <input type="text" name="up_phn" class="form-control mb-2" placeholder="{{ $students->std_phn }}">

                        <label>Status:</label>
                        <select name="up_status" class="form-control mb-2">
                            <option value="Active" {{ $students->std_status =='Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ $students->std_status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>

                        <button class="btn btn-success w-100">Update Student</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
