@extends('layouts.admin')

@section('title', 'Edit Report Data')

@section('content')
    <!-- Page Heading -->
    <a href="{{ route('admin.report.index') }}" class="btn btn-danger mb-3">Back</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-saintalk m-0 font-weight-bold">Edit Report Data</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.report.update', $report->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="code">Report Code</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                        name="code" value="{{ $report->code }}" disabled>
                    @error('code')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="resident">User</label>
                    <select name="resident_id" class="form-control @error('resident_id') is-invalid @enderror">
                        @foreach ($residents as $resident)
                            <option value="{{ $resident->id }}" @if (old('resident_id', $report->resident_id) == $resident->id) selected @endif>
                                {{ $resident->user->email }} - {{ $resident->user->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('resident')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category">Report Category</label>
                    <select name="report_category_id"
                        class="form-control @error('report_category_id') is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if (old('report_category_id', $report->report_category_id) == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('report_category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">Report Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $report->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Report Description</label>
                    <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" value="{{ old('description', $report->description) }}" rows="5">{{ old('description', $report->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Report Evidence</label>
                    <br>
                    <img src="{{ asset('storage/' . $report->image) }}" alt="image" width="100">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image" value="{{ old('image') }}">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude"
                        name="latitude" value="{{ old('latitude', $report->latitude) }}" readonly>
                    @error('latitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude"
                        name="longitude" value="{{ old('longitude', $report->longitude) }}" readonly>
                    @error('longitude')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="location">Report Location</label>
                    <textarea type="text" class="form-control @error('location') is-invalid @enderror" id="location" name="location"
                        value="{{ old('location', $report->location) }}" rows="5">{{ old('location', $report->location) }}</textarea>
                    @error('location')
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
