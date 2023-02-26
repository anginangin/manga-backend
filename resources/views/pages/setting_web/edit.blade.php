@extends('layouts.app')
@section('title')
Logo & Deskripsi Web
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Logo & Deskripsi Web</h5>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('message'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <form action="{{ route('update-setting-web', $web->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold d-block">Icon</label>
                                        <img src="/logo/{{ $web->icon }}"
                                        style="max-height: 50px">
                                        <input type="file" class="form-control mt-3" name="icon">
                                        <input type="hidden" name="old_icon" value="{{ $web->icon }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold d-block">Logo</label>
                                        <img src="/logo/{{ $web->logo }}"
                                        style="max-height: 50px">
                                        <input type="file" class="form-control mt-3" name="logo">
                                        <input type="hidden" name="old_logo" value="{{ $web->logo }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Deskripsi Singkat</label>
                                        <textarea name="description" class="form-control form-control-sm" cols="30"
                                            rows="7">{!! $web->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-none">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Kontak Web</label>
                                        <input name="contact" class="form-control form-control-sm" value="{{ $web->contact }}">
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
    CKEDITOR.replace( 'description' );
</script>
@endpush