@extends('layouts.auth')
@section('title', 'Login')
@section('content')
    <div class="card">
        <div class="card-body p-0 border shadow-sm">
            <div class="text-center mt-4 pb-0 mb-0">
                <img src="{{ asset('favicon.ico') }}" class="img-fluid" alt="logo" style="max-height: 150px;">
            </div>
            <div class="m-5 mx-5 mb-5 mt-4">
                {{-- <h5 class="text-center fw-bold text-sec pb-3">Login</h5> --}}
                <form class="mt-3" method="POST" action="{{ route('auth.login.store') }}">
                    @csrf
                    <div class="form-group mb-3 input-wrapper">
                        <label class="form-control-placeholder" for="username"><span>Username</span></label>
                        <input type="text" id="username" name="username" class="form-control form-control-lg @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder=" ">
                        {{-- <span class="input-icon text-sm text-sec @error('username') text-danger @enderror"><i class="far fa-user" id="toggle_username"></i></span> --}}
                        <div class="invalid-feedback">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-3 input-wrapper">
                        <label class="form-control-placeholder" for="password"><span>Password</span></label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder=" ">
                        <span class="input-icon text-sm text-sec @error('password') text-danger @enderror"><i class="far fa-eye" id="toggle_password"></i></span>
                        <div class="invalid-feedback">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="text-center mt-5 w-100">
                        <button type="submit" class="btn btn-lg btn-primary w-100 shadow">Login</button>
                        <small class="pt-3 d-block">
                            <a href="#">Hubungi admin apabila anda lupa password.</a>
                        </small>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
