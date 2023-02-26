@extends('layouts.app')
@section('title')
Rilisan Terbaru
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Judul</h5>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('title'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <form action="{{ route('rilisan-terbaru.update', $title->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control form-control-sm" name="judul" value="{{ $title->rilisan_terbaru }}">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">
                                <i class="feather mr-2 icon-check-circle"></i>
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>30 {{ $title->rilisan_terbaru }}</h5>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if ($error = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <b>Gagal!</b> {{ $error }}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-sm" id="datatable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Thumbnail</th>
                                        <th>Judul</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mangas as $manga)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ $manga->poster }}" class="img-fluid"
                                                style="max-height: 50px">
                                        </td>
                                        <td>{{ Str::limit($manga->title,29) }}</td>
                                        <td>
                                            <div class="btn-group mb-2 mr-2">
                                                <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Aksi</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('manga.show', $manga->slug) }}">Detail</a>
                                                    <a class="dropdown-item" href="#!" data-toggle="modal"
                                                        data-target="#hapus_{{ $manga->id }}">Hapus</a>
                                                </div>
                                            </div>
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapus_{{ $manga->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <form action="{{ route('blacklist', $manga->id) }}" method="post">
                                                                @method('PUT')
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary">Ya, hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
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