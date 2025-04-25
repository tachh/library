@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-8 col-sm-6 col-md-4 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="h3 text-center mb-3">
                        Login
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">
                                E-mail <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password <span class="text-danger">*</span>
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                   name="password" value="{{ old('password') }}" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
