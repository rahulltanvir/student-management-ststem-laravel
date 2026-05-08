@extends('layouts.main')

@section('content')
    <div class="container mt-5">

        {{-- 🔥 Add Class Form --}}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">

                    <h5 class="mb-3 text-center">Session</h5>

                    {{-- Success message --}}
                    @if (session('success'))
                        @if (session('success'))
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

                    <form action="{{ route('store.session') }}" method="POST">
                        @csrf

                        <input class="form-control mb-2" type="text" name="std_session" placeholder="add Session" required>

                        @error('add Session')
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
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('edit.session', $session_name->id) }}">
                                                Edit
                                            </a>

                                            <form id="delete-form-{{ $session_name->id }}"
                                                action="{{ route('session.delete', $session_name->id) }}" method="POST"
                                                style="display:inline;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete({{ $session_name->id }})">
                                                    Delete
                                                </button>

                                            </form>
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
  <script>
function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This data will be deleted permanently!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#16a34a",
        cancelButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>s
@endsection
