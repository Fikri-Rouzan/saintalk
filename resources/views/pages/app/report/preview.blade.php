@extends('layouts.no-nav')

@section('title', 'Preview Photo')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <img alt="image" id="image-preview" class="img-fluid rounded-2">

        <div class="d-flex justify-content-center mt-3 gap-3">
            <a href="{{ route('report.take') }}" class="btn btn-outline-primary">
                Retake Photo
            </a>

            <a href="{{ route('report.create') }}" class="btn btn-primary">
                Use Photo
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var image = localStorage.getItem('image');
        var imagePreview = document.getElementById('image-preview');
        imagePreview.src = image;
    </script>
@endsection
