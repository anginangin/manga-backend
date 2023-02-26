@extends('layouts.app')
@section('title')
SEO Artikel
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <h5 class="mb-3">SEO Artikel</h5>
        @if ($message = Session::get('message'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold">Meta Tag</label>
                                    <textarea name="meta_tag" class="form-control form-control-sm" cols="30" rows="10" readonly>{{ $seo['meta_tag'] }}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="floating-label font-weight-bold">Artikel</label>
                                    <textarea name="artikel" class="form-control form-control-sm" cols="30" rows="10" readonly>{!! $seo['artikel'] !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('edit-seo-artikel', $seo['id']) }}" class="btn btn-warning btn-block">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection