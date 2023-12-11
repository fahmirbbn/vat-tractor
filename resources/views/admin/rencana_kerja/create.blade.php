@extends('layouts.admin')

@section('title', 'Create Rencana Kerja')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Rencana Kerja</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.rencana_kerja.index') }}">Rencana Kerja</a></li>
                            <li class="breadcrumb-item active">Create Rencana Kerja</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.includes.messages')
        <section class="content">
            <form action="{{ route('admin.rencana_kerja.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="location_code" class="col-sm-2 col-form-label">Location Code</label>
                            <div class="col-sm-4">
                                <input type="text" name="location_code" value="{{ old('location_code') }}" class="form-control" id="location_code" placeholder="Location Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_name" class="col-sm-2 col-form-label">Unit Name</label>
                            <div class="col-sm-4">
                                <select name="mst_unit_id" class="form-control" id="mst_unit_id">
                                    <option value="">Select Unit</option>
                                    @foreach ($units as $id => $unit)
                                        <option value="{{ $id }}" {{ old('mst_unit_id') == $id ? 'selected' : '' }}>{{ $unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="implement_name" class="col-sm-2 col-form-label">Implement Name</label>
                            <div class="col-sm-4">
                                <select name="implement_id" class="form-control" id="implement_id">
                                    <option value="">Select Implement</option>
                                    @foreach ($implements as $id => $implement)
                                        <option value="{{ $id }}" {{ old('implement_id') == $id ? 'selected' : '' }}>{{ $implement }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="activity_name" class="col-sm-2 col-form-label">Activity Name</label>
                            <div class="col-sm-4">
                                <select name="mst_activity_id" class="form-control" id="mst_activity_id">
                                    <option value="">Select Activity</option>
                                    @foreach ($activities as $id => $activity)
                                        <option value="{{ $id }}" {{ old('mst_activity_id') == $id ? 'selected' : '' }}>{{ $activity }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="activity_date" class="col-sm-2 col-form-label">Activity Date</label>
                            <div class="col-sm-4">
                                <input type="text" name="activity_date" value="{{ old('activity_date') }}" class="form-control" id="activity_date" placeholder="Activity Date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="operator_name" class="col-sm-2 col-form-label">Operator Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="operator_name" value="{{ old('operator_name') }}" class="form-control" id="operator_name" placeholder="Operator Name">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.rencana_kerja.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </section>
    </div>

    @push('after-scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                flatpickr('#activity_date', {
                    enableTime: false, // Change to true if you want to enable time selection
                    dateFormat: 'Y-m-d', // Adjust the date format as needed
                });
            });
        </script>
    @endpush
@endsection
