@extends('layouts.admin')

@section('title', 'Resident Data Details')

@section('content')
    <!-- Page Heading -->
    <a href="{{ route('admin.resident.index') }}" class="btn btn-danger mb-3">Back</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-saintalk m-0 font-weight-bold">FST UIN JKT Resident Data Details</h6>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Full Name</td>
                    <td>{{ $resident->user->name }}</td>
                </tr>
                <tr>
                    <td>Identity Number</td>
                    <td>{{ $resident->user->resident->id_number }}</td>
                </tr>
                <tr>
                    <td>Study Program</td>
                    <td>{{ $resident->user->resident->major }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $resident->user->email }}</td>
                </tr>
                <tr>
                    <td>Profile Picture</td>
                    <td>
                        <img src="{{ asset('storage/' . $resident->avatar) }}" alt="avatar" width="200">
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
