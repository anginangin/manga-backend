@extends('layouts.app')
@section('title')
Iklan (Ads)
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Buat Iklan Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('adds.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Script Iklan</label>
                                        <textarea name="script" class="form-control form-control-sm" cols="30" rows="6"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Status</label>
                                        <select class="form-control form-control-sm" name="status">
                                            <option value="0">Aktif</option>
                                            <option value="1">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="feather mr-2 icon-check-circle"></i>
                                Simpan Data
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Iklan (Ads)</h5>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Iklan (Ads)</th>
                                        <th class="text-center">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adds as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ Str::limit($data->script, 50) }}
                                        </td>
                                        <td class="text-center">
                                            @if ($data->status == 0)                                                
                                            <span class="badge badge-pill badge-primary">Aktif</span>
                                            @else
                                            <span class="badge badge-pill badge-primary">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group float-right">
                                                <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Aksi</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#edit_{{ $data->id }}">
                                                        Ubah
                                                    </a>    
                                                    <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#hapus_{{ $data->id }}">
                                                        Hapus
                                                    </a>    
                                                </div>
                                            </div>
                                            <!-- Modal Edit -->
                                            @include('pages.adds.edit')

                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapus_{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Yakin hapus?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <form action="{{ route('adds.destroy', $data->id) }}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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