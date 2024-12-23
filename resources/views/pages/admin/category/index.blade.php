@extends('layouts.admin')

@section('title', 'Categories Data')

@section('content')
    <!-- Page Heading -->
    <a href="{{ route('admin.category.create') }}" class="btn btn-success mb-3">Add Category Data</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-saintalk m-0 font-weight-bold">List of Categories Data</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="image" width="100">
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning"><i
                                            class="fas fa-pencil-alt"></i></a>

                                    <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-info"><i
                                            class="fas fa-eye"></i></a>

                                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
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
