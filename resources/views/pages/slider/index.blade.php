@extends('layouts.app')
@section('title')
Slider
@endsection
@push('addon-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
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
                        <form action="{{ route('update-title-slider', $title->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control form-control-sm" name="judul"
                                    value="{{ $title->atas_rilisan_terbaru }}">
                            </div>
                            <div class="form-group">
                                <label>Is Active</label>
                                <select name="is_most_rating" id="is_most_rating" class="form-control form-control-sm">
                                    <option value="0" {{ $title->is_most_rating == 0 ? 'selected' : '' }}>No
                                    </option>
                                    <option value="1" {{ $title->is_most_rating == 1 ? 'selected' : '' }}>Yes
                                    </option>
                                </select>
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
                        <h5>Custom Slider {{ $title->atas_rilisan_terbaru }}</h5>
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
                        <form action="{{ route('sliders.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Cari Manga</label>
                                        <select name="manga_id" class="form-control form-control-sm p-2" id="select2">
                                            @foreach ($manga as $manga)
                                            <option value="{{ $manga->id }}">{{ $manga->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Urutan</label>
                                        <input type="number" class="form-control form-control-sm" name="urutan"
                                            required>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="text-white d-block">Urutan</label>
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="feather mr-1 icon-check-circle"></i>
                                        Simpan Data
                                    </button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">Thumbnail</th>
                                        <th>Judul</th>
                                        <th class="text-center">Urutan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($slider as $slider)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ $slider->manga->poster }}" class="img-fluid"
                                                style="max-height: 50px">
                                        </td>
                                        <td>{{ Str::limit($slider->manga->title,29) }}</td>
                                        <td class="text-center">{{ $slider->urutan }}</td>
                                        <td>
                                            <div class="btn-group mb-2 mr-2">
                                                <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">Aksi</button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#!" data-toggle="modal"
                                                        data-target="#ubah_{{ $slider->id }}">Ubah</a>
                                                    <a class="dropdown-item" href="#!" data-toggle="modal"
                                                        data-target="#hapus_{{ $slider->id }}">Hapus</a>
                                                </div>
                                            </div>
                                            <!-- Modal Ubah -->
                                            <div class="modal fade" id="ubah_{{ $slider->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Ubah Slider
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('sliders.update', $slider->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Manga</label>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="{{ $slider->manga->title }}" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Urutan</label>
                                                                    <input type="number"
                                                                        class="form-control form-control-sm"
                                                                        name="urutan" value="{{ $slider->urutan }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
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
                                            <div class="modal fade" id="hapus_{{ $slider->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Yakin Hapus?
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <form
                                                                action="{{ route('sliders.destroy', $slider->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">
                                                                    <i class="feather mr-2 icon-check-circle"></i>
                                                                    Hapus
                                                                </button>
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
@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
            $('#select2').select2();
        });
</script>
@endpush
