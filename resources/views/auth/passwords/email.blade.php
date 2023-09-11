@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">{{ __('Reset Password') }}</h3>

                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="signin-form">
                        @csrf
                        <div class="form-group column">
                            <label for="email_address"
                                class="col-md-6 col-form-label text-md-left">{{ __('Email Address') }}</label>
                            <div class="form-group">
                                <input type="text" id="email_address"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                                    autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection