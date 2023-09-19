@extends('layouts.auth.app')

@section('content')

  
        <h4>Welcome back!</h4>
        <h6 class="font-weight-light">Happy to see you again!</h6>
        <form class="pt-3" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                    </span>
                    </div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus class="form-control @error('email') is-invalid @enderror form-control-lg border-left-0" placeholder="Email" required>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                    </span>
                    </div>
                    <input id="password" type="password" name="password" autocomplete="current-password" class="form-control @error('password') is-invalid @enderror form-control-lg border-left-0" placeholder="Password" required>
                    
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input" required>
                    Keep me signed in
                    </label>
                </div>
                <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
            </div>
            <div class="my-3">
                <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">
                    {{ __('LOGIN') }}
                </button>
                <a href="{{ url('/register') }}" class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn">
                    {{ __('SIGN UP') }}
                </a>
            </div>
            {{-- <div class="mb-2 d-flex">
            <button type="button" class="btn btn-facebook auth-form-btn flex-grow mr-1">
                <i class="mdi mdi-facebook mr-2"></i>
                Facebook
            </button>
            <button type="button" class="btn btn-google auth-form-btn flex-grow ml-1">
                <i class="mdi mdi-google mr-2"></i>
                Google
            </button>
            </div>
            <div class="text-center mt-4 font-weight-light">
            Don't have an account? <a href="{{ url('/register') }}" class="text-primary">Create</a>
            </div> --}}
        </form>
    
@endsection
