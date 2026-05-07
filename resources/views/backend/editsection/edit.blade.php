@extends('layouts.main')

@section('content')
    <div class="container mt-5">

        {{-- 🔥 Add Class Form --}}
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">

                    <h5 class="mb-3 text-center">Section</h5>

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
                    <form action="{{ route('section.update', $section->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input class="form-control mb-2" type="text" name="up_section" placeholder="{{ $section->section }}"
                            required>

                        @error('up_section')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                        <button type="submit" class="btn btn-success w-100 mt-2">
                            Update Section
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
