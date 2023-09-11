@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <!-- <div class="row justify-content-center">

                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login</h2>

                </div>
            </div> -->
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <h3 class="mb-4 text-center">Have an account?</h3>
                    <form method="POST" action="{{ route('login') }}" class="signin-form">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="text" name="email"
                                class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                value="{{ old('email', null) }}" placeholder="Username" required>
                            @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="password" type="password" name="password"
                                class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                placeholder="Password" required>
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50">
                                <label class="checkbox-wrap checkbox-primary">Remember Me
                                    <input type="checkbox" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                            <div class="w-50 text-md-right">
                                <a href="{{ route('password.request') }}" style="color: #fff">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection