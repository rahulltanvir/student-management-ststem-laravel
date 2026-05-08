@extends('layouts.main')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-12">

            <div class="card shadow-sm p-3">

                <h5 class="text-center mb-3">Students List</h5>

                {{-- SEARCH BOX --}}
                <div class="mb-3">
                    <input type="search" id="myInput" class="form-control" placeholder="Search student name or roll..."
                        onkeyup="myFunction()">
                </div>

                {{-- SUCCESS MESSAGE --}}
                @if (session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: "{{ session('success') }}",
                            confirmButtonColor: '#16a34a',
                            confirmButtonText: 'OK'
                        });
                    </script>
                @endif

                {{-- TABLE --}}
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody">

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
                                        <a class="btn btn-info btn-sm" href="{{ route('students.edit', $student->id) }}">
                                            Edit
                                        </a>

                                        <form id="delete-form-{{ $student->id }}"
                                          action="{{ route('students.delete', $student->id) }}"
                                          method="POST"
                                          style="display:inline;">

                                        @csrf
                                        @method('DELETE')

                                        <button type="button"
                                            class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{$student->id }})">
                                            Delete
                                        </button>

                                    </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-muted">
                                    No Students Found
                                </td>
                            </tr>
                        @endforelse

                        {{-- NO DATA FOUND ROW (FOR SEARCH) --}}
                        <tr id="noDataRow" style="display:none;">
                            <td colspan="9" class="text-danger text-center">
                                No Data Found
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>
        </div>
    </div>

    {{-- SEARCH SCRIPT --}}
    <script>
        function myFunction() {

            let input = document.getElementById("myInput");
            let filter = input.value.toLowerCase();

            let table = document.querySelector("table tbody");
            let tr = table.getElementsByTagName("tr");

            let visibleCount = 0;

            for (let i = 0; i < tr.length; i++) {

                // skip no data row
                if (tr[i].id === "noDataRow") continue;

                let nameTd = tr[i].getElementsByTagName("td")[1];
                let rollTd = tr[i].getElementsByTagName("td")[2];

                let name = nameTd ? nameTd.textContent.toLowerCase() : "";
                let roll = rollTd ? rollTd.textContent.toLowerCase() : "";

                if (name.includes(filter) || roll.includes(filter)) {
                    tr[i].style.display = "";
                    visibleCount++;
                } else {
                    tr[i].style.display = "none";
                }
            }

            let noDataRow = document.getElementById("noDataRow");

            if (visibleCount === 0) {
                noDataRow.style.display = "";
            } else {
                noDataRow.style.display = "none";
            }
        }
    </script>
    <script>
function confirmDelete(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}
</script>
@endsection
