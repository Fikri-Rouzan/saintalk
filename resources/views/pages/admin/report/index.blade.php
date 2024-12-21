@extends('layouts.admin')

@section('title', 'Reports Data')

@section('content')
    <!-- Page Heading -->
    <a href="{{ route('admin.report.create') }}" class="btn btn-success mb-3">Add Report Data</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-saintalk m-0 font-weight-bold">List of Reports Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Report Code</th>
                            <th>User</th>
                            <th>Report Category</th>
                            <th>Report Title</th>
                            <th>Report Evidence</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $report->code }}</td>
                                <td>{{ $report->resident->user->name }}</td>
                                <td>{{ $report->reportCategory->name }}</td>
                                <td>{{ $report->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $report->image) }}" alt="image" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('admin.report.edit', $report->id) }}" class="btn btn-warning"><i
                                            class="fas fa-pencil-alt"></i></a>

                                    <a href="{{ route('admin.report.show', $report->id) }}" class="btn btn-info"><i
                                            class="fas fa-eye"></i></a>

                                    <form action="{{ route('admin.report.destroy', $report->id) }}" method="POST"
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
