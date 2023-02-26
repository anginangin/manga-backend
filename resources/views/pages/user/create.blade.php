@extends('layouts.app')
@section('title')
Admin Baru
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <h5 class="mb-3">Admin Baru</h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('store-administrator') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Nama</label>
                                        <input type="text" name="name" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Email</label>
                                        <input type="email" name="email" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Password</label>
                                        <input type="password" name="password" class="form-control form-control-sm">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="store">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection