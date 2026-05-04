@extends('layouts.main')

@section('content')

    {{-- 🔥 TABLE --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">
            <div class="card shadow-sm p-3">

                <h5 class="text-center mb-3"> Students List</h5>

                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width:10%">SL</th>
                            <th>Name</th>
                            <th>Roll</th>
                            <th>Class</th>
                            <th>Section</th>
                            <th>Session</th>
                            <th>Phone</th>
                            <th style="width:25%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        {{-- @forelse($Sessions as $key => $session_name) --}}
                            <tr>
                                {{-- <td>{{ $key + 1 }}</td> --}}
                                {{-- <td>{{ $session_name->sessionyear }}</td> --}}
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
                        {{-- @empty --}}
                            <tr>
                                <td colspan="3" class="text-muted">
                                    No Class Found
                                </td>
                            </tr>
                        {{-- @endforelse --}}
                    </tbody>

                </table>

            </div>
        </div>
    </div>

@endsection