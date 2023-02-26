@extends('layouts.app')
@section('title')
Edit Admin
@endsection
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <h5 class="mb-3">Edit Admin</h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update-administrator', $administrator->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Nama</label>
                                        <input type="text" name="name" class="form-control form-control-sm" value="{{ $administrator->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="floating-label font-weight-bold">Email</label>
                                        <input type="email" name="email" class="form-control form-control-sm" value="{{ $administrator->email }}">
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