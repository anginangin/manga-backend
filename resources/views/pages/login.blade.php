@extends('layouts.login')
@section('content')
<div class="auth-wrapper">
    <div class="auth-content text-center">
        <h3 class="text-white mb-4">Sign In</h3>
        {{-- <img src="/assets/images/logo.png" alt="" class="img-fluid mb-4"> --}}
        <div class="card borderless">
            <div class="row align-items-center ">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4 class="mb-3 f-w-400">Welcome Back</h4>
                        <hr>
                        @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <form action="{{ route('authenticate') }}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" class="form-control form-control-sm" id="Email" placeholder="Email address"
                                    name="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control form-control-sm" id="Password" placeholder="Password"
                                    name="password">
                            </div>
                            <button class="btn btn-block btn-primary mb-4">Signin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection