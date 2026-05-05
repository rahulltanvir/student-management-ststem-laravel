@extends('layouts.main')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-12">
        <div class="card shadow-sm p-3">

            <h5 class="text-center mb-3">Students List</h5>
            @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif

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
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($students as $key => $student)

                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $student->std_name }}</td>
                            <td>{{ $student->std_roll }}</td>
                            <td>{{ $student->studentClass->class_name ?? '' }}</td>
                            <td>{{ $student->section->section ?? '' }}</td>
                            <td>{{ $student->session->sessionyear ?? '' }}</td>
                            <td>{{ $student->std_phn }}</td>
                            <td>{{ $student->std_status }}</td>

                            <td>
                                <div class="d-flex justify-content-center gap-2">

                                    <a class="btn btn-info btn-sm" href="#">
                                        Edit
                                    </a>

                                    <a class="btn btn-danger btn-sm"
                                       href="#"
                                       onclick="return confirm('Are you sure?')">
                                        Delete
                                    </a>

                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="8" class="text-muted">
                                No Students Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>
</div>

@endsection