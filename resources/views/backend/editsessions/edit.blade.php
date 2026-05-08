@extends('layouts.main')

@section('content')
    <div class="container mt-5">

        {{-- 🔥 Add Class Form --}}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">

                    <h5 class="mb-3 text-center">Update Session</h5>

                    {{-- Success message --}}
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

                    <form action="{{ route('update.session',$session_data->id) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <input class="form-control mb-2" type="text" name="up_session" value="{{ $session_data->sessionyear }}" required>

                        @error('up session')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <button type="submit" class="btn btn-success w-100 mt-2">
                           Update Session
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
