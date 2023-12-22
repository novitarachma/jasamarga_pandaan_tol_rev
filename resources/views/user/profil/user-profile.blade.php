@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/setprofile.css') }}" rel="stylesheet" />
@endsection
@section('content')
<section id="portfolio-details" class="portfolio-details">
    <br><br>
    <div class="container p-0">

        <div class="row">
            <div class="section-title">
                <h2>Profile</h2>
            </div>
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('profil') }}" class="btn btn-sm btn-primary">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update.account')}}" id="myForm"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-name">Name</label>
                                            <input type="text" id="input-name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Name" value="{{ $user->name }}">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Username</label>
                                            <input type="text" id="input-username" name="username"
                                                class="form-control @error('username') is-invalid @enderror"
                                                placeholder="Username" value="{{ $user->username }}" disabled>
                                            @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-email">Email</label>
                                            <input type="email" id="input-email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="jesse@example.com" value="{{ $user->email }}">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="submit" class="btn btn-sm btn-default center">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection