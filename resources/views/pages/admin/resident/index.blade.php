@extends('layouts.admin')

@section('title', 'Residents Data')

@section('content')
    <!-- Page Heading -->
    <a href="{{ route('admin.resident.create') }}" class="btn btn-success mb-3">Add Resident Data</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-saintalk m-0 font-weight-bold">List of FST UIN JKT Residents Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Full Name</th>
                            <th>Identity Number</th>
                            <th>Study Program</th>
                            <th>Profile Picture</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($residents as $resident)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $resident->user->email }}</td>
                                <td>{{ $resident->user->name }}</td>
                                <td>{{ $resident->user->resident->id_number }}</td>
                                <td>{{ $resident->user->resident->major }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $resident->avatar) }}" alt="avatar" width="100">
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.resident.edit', $resident->id) }}"
                                        class="btn btn-warning btn-sm mr-1">
                                        <i class="fas fa-pencil-alt fa-fw"></i>
                                    </a>
                                    <a href="{{ route('admin.resident.show', $resident->id) }}"
                                        class="btn btn-info btn-sm mr-1">
                                        <i class="fas fa-eye fa-fw"></i>
                                    </a>
                                    <form action="{{ route('admin.resident.destroy', $resident->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-times fa-fw"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            const searchInput = $("#dataTable_filter input");

            searchInput.attr("id", "dataTableSearch");
            searchInput.attr("name", "dataTableSearch");
            searchInput.attr("aria-label", "Search Data Table");
            searchInput.attr("placeholder", "Search data...");
        });
    </script>
@endsection
