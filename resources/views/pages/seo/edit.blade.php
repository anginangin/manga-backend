@extends('layouts.app')
@section('title')
Edit SEO Artikel
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
                        <h5>SEO Artikel</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-seo-artikel', $seo->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Title</label>
                                        <input name="title" class="form-control form-control-sm" value="{{ $seo['title'] }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Meta Tag</label>
                                        <textarea name="meta_tag" class="form-control form-control-sm" cols="30" rows="10">{{ $seo['meta_tag'] }}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Artikel</label>
                                        <textarea name="artikel" class="form-control form-control-sm" cols="30" rows="10">{!! $seo['artikel'] !!}</textarea>
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
    CKEDITOR.replace( 'artikel' );
</script>
@endpush