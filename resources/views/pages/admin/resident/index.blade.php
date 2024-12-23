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
                                <td>
                                    <a href="{{ route('admin.resident.edit', $resident->id) }}" class="btn btn-warning"><i
                                            class="fas fa-pencil-alt"></i></a>

                                    <a href="{{ route('admin.resident.show', $resident->id) }}" class="btn btn-info"><i
                                            class="fas fa-eye"></i></a>

                                    <form action="{{ route('admin.resident.destroy', $resident->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-times"></i></button>
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
