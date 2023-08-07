@extends('layouts.app')
@section('title')
    Administrator
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <h5 class="mb-3">Administrator</h5>
            @if ($message = Session::get('message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('add-administrator') }}" class="btn btn-primary btn-sm">+ Admin Baru</a>
                            {{-- <a href="{{ route('permission') }}" class="btn btn-warning btn-sm"> Permissions</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Roles</th>
                                            <th>Tanggal Terdaftar</th>
                                            <th>Terakhir Login</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($administrator as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $data->name }}
                                                </td>
                                                <td>
                                                    {{ $data->email }}
                                                </td>
                                                <td>
                                                    {{ $data->roles()->pluck('name')->implode(' ') }}
                                                </td>
                                                <td>
                                                    {{ date('d-M-Y H:i:s', strtotime($data->created_at)) }}
                                                </td>
                                                <td>
                                                    {{ date('d-M-Y H:i:s', strtotime($data->updated_at)) }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('edit-administrator', $data->id) }}"
                                                        class="btn btn-info btn-sm"
                                                       >Edit</a>
                                                    <a href="{{ route('delete-administrator', $data->id) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ?')">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
