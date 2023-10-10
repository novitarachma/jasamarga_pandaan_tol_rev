@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">{{ __('Reset Password') }}</h3>
                    <form method="POST" action="{{ route('password.update') }}" class="signin-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <input type="text" id="email_address"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email Address" value="{{ $email ?? old('email') }}" required
                                autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" placeholder="New Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autofocus>
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" id="password-confirm"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation" placeholder="Password Confirm" required autofocus>
                            <span toggle="#password-confirm" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">
                                Reset Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection