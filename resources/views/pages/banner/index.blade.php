@extends('layouts.app')
@section('title')
Banner
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Buat Banner Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Posisi</label>
                                        <select name="posisi" class="form-control form-control-sm">
                                            <optgroup label="---">
                                                <option value="atas">Atas</option>
                                                <option value="tengah">Tengah</option>
                                                <option value="bawah">Bawah (Floating)</option>
                                            </optgroup>
                                            <optgroup label="---">
                                                <option value="atas_manga_populer">Atas Manga Populer</option>
                                                <option value="bawah_manga_populer">Bawah Manga Populer</option>
                                            </optgroup>
                                            <optgroup label="---">
                                                <option value="atas_rekomendasi">Atas Rekomendasi</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Gambar</label>
                                        <input type="file" class="form-control form-control-sm" name="gambar" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Link</label>
                                        <input type="text" class="form-control form-control-sm" name="link">
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
                        <h5>Data Banner</h5>
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
                                        <th>Posisi</th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($banner as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ str_replace('_',' ',ucwords($data->posisi)) }}</td>
                                        <td>
                                            <img src="/banner/{{ $data->gambar }}" class="img-fluid" style="max-height: 100px">
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-primary">{{ ($data->status == 0) ? 'Aktif' : 'Tidak Aktif' }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group mb-2 mr-2">
                                                <button class="btn btn-sm btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#ubah_{{ $data->id }}">Ubah</a>
                                                    <a class="dropdown-item" href="#!" data-toggle="modal" data-target="#hapus_{{ $data->id }}">Hapus</a>
                                                </div>
                                            </div>
                                            <!-- Modal Ubah -->
                                            <div class="modal fade" id="ubah_{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Banner</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('banners.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label font-weight-bold">Posisi</label>
                                                                        <select name="posisi" class="form-control form-control-sm">
                                                                            <option value="{{ $data->posisi }}" selected readonly>{{ $data->posisi }}</option>
                                                                            <optgroup label="---">
                                                                                <option value="atas">Atas</option>
                                                                                <option value="tengah">Tengah</option>
                                                                                <option value="bawah">Bawah (Floating)</option>
                                                                            </optgroup>
                                                                            <optgroup label="---">
                                                                                <option value="atas_manga_populer">Atas Manga Populer</option>
                                                                                <option value="bawah_manga_populer">Bawah Manga Populer</option>
                                                                            </optgroup>
                                                                            <optgroup label="---">
                                                                                <option value="atas_rekomendasi">Atas Rekomendasi</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label font-weight-bold d-block">Gambar</label>
                                                                        <img src="/banner/{{ $data->gambar }}" class="img-fluid mb-3" style="max-height: 100px">
                                                                        <input type="file" class="form-control form-control-sm" name="gambar">
                                                                        <input type="hidden" class="form-control form-control-sm" name="valgambar" value="{{ $data->gambar }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label font-weight-bold">Link</label>
                                                                        <input type="text" class="form-control form-control-sm" name="link" value="{{ $data->link }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <label class="floating-label font-weight-bold">Status</label>
                                                                        <select class="form-control form-control-sm" name="status">
                                                                            @if ($data->status == 0)
                                                                            <option value="{{ $data->status }}" selected readonly>Aktif</option>
                                                                            @else
                                                                            <option value="{{ $data->status }}" selected readonly>Tidak Aktif</option>
                                                                            @endif
                                                                            <option value="0">Aktif</option>
                                                                            <option value="1">Tidak Aktif</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">
                                                                <i class="feather mr-2 icon-check-circle"></i>
                                                                Simpan Perubahan
                                                            </button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapus_{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus?</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <form action="{{ route('banners.destroy', $data->id) }}" method="post">
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