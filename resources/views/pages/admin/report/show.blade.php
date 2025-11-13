@extends('layouts.admin')

@section('title', 'Report Data Details')

@section('content')
    <!-- Page Heading -->
    <a href="{{ route('admin.report.index') }}" class="btn btn-secondary mb-3">Back</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-saintalk m-0 font-weight-bold">Report Data Details</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Report Code</td>
                    <td>{{ $report->code }}</td>
                </tr>
                <tr>
                    <td>User</td>
                    <td>{{ $report->resident->user->email }} - {{ $report->resident->user->name }}</td>
                </tr>
                <tr>
                    <td>Report Category</td>
                    <td>{{ $report->reportCategory->name }}</td>
                </tr>
                <tr>
                    <td>Report Title</td>
                    <td>{{ $report->title }}</td>
                </tr>
                <tr>
                    <td>Report Description</td>
                    <td>{{ $report->description }}</td>
                </tr>
                <tr>
                    <td>Report Evidence</td>
                    <td>
                        <img src="{{ asset('storage/' . $report->image) }}" alt="image" width="200">
                    </td>
                </tr>
                <tr>
                    <td>Latitude</td>
                    <td>{{ $report->latitude }}</td>
                </tr>
                <tr>
                    <td>Longitude</td>
                    <td>{{ $report->longitude }}</td>
                </tr>
                <tr>
                    <td>Map View</td>
                    <td>
                        <div id="map" style="height: 300px">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Report Location</td>
                    <td>{{ $report->location }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-5">
        <div class="card-header py-3">
            <h6 class="text-saintalk m-0 font-weight-bold">List of Report Progress Data</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('admin.report-status.create', $report->id) }}" class="btn btn-success mb-3">Add Report
                Progress Data</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Report Progress Evidence</th>
                            <th>Report Progress Status</th>
                            <th>Report Progress Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($report->reportStatuses as $status)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($status->image)
                                        <img src="{{ asset('storage/' . $status->image) }}" alt="image" width="100">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    {{ $status->status }}
                                </td>
                                <td>
                                    {{ $status->description }}
                                </td>
                                <td class="text-nowrap">
                                    <a href="{{ route('admin.report-status.edit', $status->id) }}"
                                        class="btn btn-warning btn-sm mr-1"><i class="fas fa-pencil-alt fa-fw"></i></a>
                                    <form action="{{ route('admin.report-status.destroy', $status->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                class="fas fa-times fa-fw"></i></button>
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
        var mymap = L.map('map').setView([{{ $report->latitude }}, {{ $report->longitude }}], 13);
        var marker = L.marker([{{ $report->latitude }}, {{ $report->longitude }}]).addTo(mymap);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 18,
        }).addTo(mymap);

        marker.bindPopup("<b>Report Location</b><br />located at {{ $report->location }}").openPopup();

        $(document).ready(function() {
            const searchInput = $("#dataTable_filter input");

            searchInput.attr("id", "dataTableSearch");
            searchInput.attr("name", "dataTableSearch");
            searchInput.attr("aria-label", "Search Data Table");
            searchInput.attr("placeholder", "Search data...");
        });
    </script>
@endsection
