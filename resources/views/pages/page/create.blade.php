@extends('layouts.app')
@section('title')
    Create Pages
@endsection
@section('content')
    <div class="pcoded-main-container">
        <div class="pcoded-content">
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
                            <h5>Pages</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pages.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label font-weight-bold">Title</label>
                                            <input type="text" name="title"
                                                class="form-control form-control-sm @error('title') is-invalid @enderror"
                                                value="{{ old('title') }}" required>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label font-weight-bold">Content</label>
                                            <textarea name="content" class="form-control form-control-sm" cols="30" rows="10" required>{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label font-weight-bold">Urutan</label>
                                            <input type="number" name="urutan" class="form-control form-control-sm"
                                                value="{{ old('urutan') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="floating-label font-weight-bold">Status</label>
                                            <select class="form-control form-control-sm" name="status">
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Aktif
                                                </option>
                                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Tidak
                                                    Aktif</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary float-right">
                                    <i class="feather mr-2 icon-check-circle"></i>
                                    Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
        $("form").submit(function(e) {
            var totalcontentlength = CKEDITOR.instances['content'].getData().replace(/<[^>]*>/gi, '').length;
            if (!totalcontentlength) {
                alert('Content Tidak Boleh Kosong!');
                e.preventDefault();
            }
        });
    </script>
@endpush
