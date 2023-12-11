@extends('layouts.admin')

@section('title', 'Edit Unit')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Unit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.unit.index') }}">Unit</a></li>
                            <li class="breadcrumb-item active">Edit Unit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.includes.messages')
        <section class="content">
                <form action="{{ route('admin.unit.update', ['id' => $data->id]) }}" method="post">
                @csrf
                @method('PUT') 
                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="unit_code" class="col-sm-2 col-form-label">Unit Code</label>
                            <div class="col-sm-4">
                                <input type="text" name="unit_code" value="{{ old('unit_code', $data->unit_code) }}" class="form-control" id="unit_code" placeholder="Unit Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit_name" class="col-sm-2 col-form-label">Unit Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="unit_name" value="{{ old('unit_name', $data->unit_name) }}" class="form-control" id="unit_name" placeholder="Unit Name">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="pg_id" class="col-sm-2 col-form-label">Plantation Group</label>
                            <div class="col-sm-4">
                                <input type="text" name="pg_id" value="{{ old('pg_id', $data->pg_id) }}" class="form-control" id="pg_id" placeholder="Plantation Group">
                            </div>
                        </div>                     
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.unit.index') }}" class="btn btn-secondary">Back</a>
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
