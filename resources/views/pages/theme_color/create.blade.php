@extends('layouts.app')
@section('title')
Tema Baru
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
                        <h5>+ Tema Warna Baru</h5>
                        <div class="card-header-right mt-1">
                            <a href="{{ route('theme-color.index') }}" class="btn btn-sm btn-warning">Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('theme-color.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Nama Tema</label>
                                        <input type="text" name="theme_name" class="form-control form-control-sm" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Background 1</label>
                                        <input type="color" name="primary_base_color" class="form-control form-control-sm" placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Background 2</label>
                                        <input type="color" name="secondary_base_color" class="form-control form-control-sm" placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Background 3</label>
                                        <input type="color" name="tertiary_base_color" class="form-control form-control-sm" placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Sub-Header</label>
                                        <input type="color" name="primary_color" class="form-control form-control-sm" placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Header</label>
                                        <input type="color" name="secondary_color" class="form-control form-control-sm" placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Button</label>
                                        <input type="color" name="button_color" class="form-control form-control-sm" placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Text</label>
                                        <input type="color" name="text_color" class="form-control form-control-sm" placeholder="Ex. #FFFFFF" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection