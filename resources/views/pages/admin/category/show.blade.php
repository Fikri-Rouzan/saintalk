@extends('layouts.admin')

@section('title', 'Category Data Details')

@section('content')
    <!-- Page Heading -->
    <a href="{{ route('admin.category.index') }}" class="btn btn-danger mb-3">Back</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-saintalk m-0 font-weight-bold">Category Data Details</h6>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <td>Icon</td>
                    <td>
                        <img src="{{ asset('storage/' . $category->image) }}" alt="image" width="200">
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
