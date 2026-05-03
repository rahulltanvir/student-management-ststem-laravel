@extends('layouts.main')

@section('content')

<div class="container mt-5">

    {{-- 🔥 Add Class Form --}}
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">

                <h5 class="mb-3 text-center">Session</h5>

                {{-- Success message --}}
                @if(session('success'))
                    @if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        confirmButtonColor: '#16a34a',
        // timer: 2000,
        timerProgressBar: true
    });
</script>
@endif
                @endif

                <form action="{{ route('session-year') }}" method="POST">
                    @csrf

                    <input
                        class="form-control mb-2"
                        type="text"
                        name="std_session"
                        placeholder="add Session"
                        required
                    >

                    @error('std_session')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <button type="submit" class="btn btn-success w-100 mt-2">
                        Add Session
                    </button>
                </form>

            </div>
        </div>
    </div>

    {{-- 🔥 TABLE --}}
    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card shadow-sm p-3">

                <h5 class="text-center mb-3">Session List</h5>

                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th style="width:10%">SL</th>
                            <th>Session</th>
                            <th style="width:25%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($Sessions as $key => $session_name)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $session_name->sessionyear }}</td>
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
                                <td colspan="3" class="text-muted">
                                    No Class Found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>

            </div>
        </div>
    </div>

</div>

@endsection