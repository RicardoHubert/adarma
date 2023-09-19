@extends('layouts.auth.app')

@section('content')

            <h4>New here?</h4>
            <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
            <form class="pt-3" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                            <i class="mdi mdi-account-outline text-primary"></i>
                            </span>
                        </div>
                        <input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror form-control-lg border-left-0" placeholder="Your Name" autocomplete="name" autofocus required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                            <i class="mdi mdi-email-outline text-primary"></i>
                            </span>
                        </div>
                        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror form-control-lg border-left-0" placeholder="Your Email" value="{{ old('email') }}" autocomplete="email" required>
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
                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg border-left-0" placeholder="Password" required>                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                        </span>
                    </div>
                    <input id="password-confirm" name="password_confirmation" type="password" class="form-control form-control-lg border-left-0" placeholder="Confirm Password" autocomplete="new-password" required>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="form-check">
                    <label class="form-check-label text-muted">
                        <input type="checkbox" required class="form-check-input">
                        I agree to all Terms & Conditions
                    </label>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn">
                        SIGN UP
                    </button>
                    <a href="{{ url('/login')}}" class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn">
                        LOGIN
                    </a>
                </div>
                {{-- <div class="text-center mt-4 font-weight-light">
                    Already have an account? <a href="{{ url('/login')}}" class="text-primary">Login</a>
                </div> --}}
            </form>

@endsection