@extends('layouts.user')

@section('css')
<link href="{{ asset('assets/css/setprofile.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
@endsection

@section('content')
  <div class="main-content">
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url({{ asset('./storage/'. $detail->foto_cover) }}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{ $user->name }}</h1>
            <p class="text-white mt-0 mb-5" style="colour: black">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>           
            <a href="{{route('edit.profile')}}" class="btn btn-info">Edit profile</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                    <img src="{{ asset('./storage/'.$detail->foto) }}" class="rounded-circle">
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            <div class="dropdown" style="float:right;">
              <button class="btn-sm btn-primary">Setting</button>
            <div class="dropdown-content">
              <a href="{{route('edit.account')}}">My Account</a>
              <a href="{{route('edit.profile')}}">Profile</a>
              <a href="{{route('change.password')}}">Change Password</a>
              <a href="{{route('gaji-user')}}">Slip Gaji</a>
              <a href="{{route('home')}}">Logout</a>
            </div>
            </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>
                {{ $user->name }}
                </h3>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>{{ $karyawan->jabatan }}
                </div>
                <hr class="my-4">
                <p>{{ $detail->description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
