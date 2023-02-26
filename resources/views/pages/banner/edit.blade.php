@extends('layouts.app')
@section('title')
Ubah Banner
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <h5 class="mb-3">Ubah Banner</h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Posisi</label>
                                        <select name="posisi" class="form-control form-control-sm">
                                            <option value="{{ $banner->posisi }}" selected readonly>{{ $banner->posisi }}</option>
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
                                        <img src="/banner/{{ $banner->gambar }}" class="img-fluid mb-3" style="max-height: 100px">
                                        <input type="file" class="form-control form-control-sm" name="gambar">
                                        <input type="hidden" class="form-control form-control-sm" name="valgambar" value="{{ $banner->gambar }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Link</label>
                                        <input type="text" class="form-control form-control-sm" name="link" value="{{ $banner->link }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Status</label>
                                        <select class="form-control form-control-sm" name="status">
                                            @if ($banner->status == 0)
                                            <option value="{{ $banner->status }}" selected readonly>Aktif</option>
                                            @else
                                            <option value="{{ $banner->status }}" selected readonly>Tidak Aktif</option>
                                            @endif
                                            <option value="0">Aktif</option>
                                            <option value="1">Tidak Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection