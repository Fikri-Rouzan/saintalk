@extends('layouts.admin')

@section('title', 'Add Resident Data')

@section('content')
    <!-- Page Heading -->
    <a href="{{ route('admin.resident.index') }}" class="btn btn-danger mb-3">Back</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-saintalk m-0 font-weight-bold">Add FST UIN JKT Resident Data</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.resident.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" placeholder="Type the resident's full name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_number">Identity Number</label>
                    <input type="number" class="form-control @error('id_number') is-invalid @enderror" id="id_number"
                        name="id_number" value="{{ old('id_number') }}" placeholder="Type the resident's identity number">
                    @error('id_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="major">Study Program</label>
                    <input type="text" class="form-control @error('major') is-invalid @enderror" id="major"
                        name="major" value="{{ old('major') }}" placeholder="Type the resident's study program">
                    @error('major')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" placeholder="Type the resident's email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Type the resident's password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="avatar">Profile Picture</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar"
                        name="avatar">
                    @error('avatar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@endsection
