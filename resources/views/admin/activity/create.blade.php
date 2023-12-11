@extends('layouts.admin')

@section('title', 'Create Activity')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Activity</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.activity.index') }}">Activity</a></li>
                            <li class="breadcrumb-item active">Create Activity</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.includes.messages')
        <section class="content">
            <form action="{{ route('admin.activity.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="activity_code" class="col-sm-2 col-form-label">Activity Code</label>
                            <div class="col-sm-4">
                                <input type="text" name="activity_code" value="{{ old('activity_code') }}" class="form-control" id="activity_code" placeholder="Activity Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="activity_name" class="col-sm-2 col-form-label">Activity Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="activity_name" value="{{ old('activity_name') }}" class="form-control" id="activity_name" placeholder="Activity Name">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.activity.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </form>
        </section>
    </div>

    @push('after-scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            // document.addEventListener('DOMContentLoaded', function() {
            //     flatpickr('#activity_date', {
            //         enableTime: false, // Change to true if you want to enable time selection
            //         dateFormat: 'Y-m-d', // Adjust the date format as needed
            //     });
            // });
        </script>
    @endpush
@endsection
