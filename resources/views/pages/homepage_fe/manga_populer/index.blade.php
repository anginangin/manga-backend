@extends('layouts.app')
@section('title')
Manga Populer
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
                        <form action="{{ route('update-title-mv', $title->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control form-control-sm" name="judul" value="{{ $title->most_view }}">
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">
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