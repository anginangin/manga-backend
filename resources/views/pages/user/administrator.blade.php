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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('add-administrator') }}" class="btn btn-primary btn-sm">+ Admin Baru</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal Terdaftar</th>
                                        <th>Terakhir Login</th>
                                        {{-- <th></th> --}}
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
                                            {{ date('d-M-Y H:i:s', strtotime($data->created_at)) }}
                                        </td>
                                        <td>
                                            {{ date('d-M-Y H:i:s', strtotime($data->updated_at)) }}
                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('edit-administrator', $data->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        </td> --}}
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