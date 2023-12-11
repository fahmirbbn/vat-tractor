@extends('layouts.admin')

@section('title', 'Master Implement')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Master Implement</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Master Implement</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        @include('admin.includes.messages')
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.implement.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Create</a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tb_data" class="table table-bordered table-hover dataTable dtr-inline" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Implement Code</th>
                                <th>Implement Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </section>
    </div>
@endsection

@push('after-scripts')
    <link rel="stylesheet" href="{{ asset('assets/plugins/dataTables/bootstrap4.min.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/plugins/dataTables/dataTables.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('assets/plugins/dataTables/bootstrap4.min.js') }}"></script>
    <script>
        var tabel = null;
        $(document).ready(function() {
            tabel = $('#tb_data').DataTable({
                order: [
                    [0, 'desc']
                ],
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.implement.datatable') }}",
                columns: [
                    { data: 'id', name: 'id', orderable: false, className: "text-center", orderable: false },
                    { data: 'implement_code', name: 'implement_code' },
                    { data: 'implement_name', name: 'implement_name' },
                    {
                        data: "id",
                        render: function(data, type, row, meta) {
                            var btn = ``;
                            btn +=
                                `<div class="btn-group" role="group">
                                    <a class="btn btn-warning" href="{{ route('admin.implement.index') }}/` + row.id + `/edit" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form method="POST" name="delete-item" action="{{ route('admin.implement.index') }}/` + row.id + `/destroy" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>`;
                            return btn;
                        },
                        className: "text-center",
                        orderable: false
                    },
                ]
            });
        });
    </script>
@endpush
