@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/dokumen-karyawan.css') }}" rel="stylesheet" />
@endsection
@section('content')

<section class="our-webcoderskull padding-lg">
  <div class="container">
    <div class="row heading heading-icon">
      <h2>Divisi</h2>
    </div>
    
    <ul class="row">
      @foreach ($kar as $item)
      <li class="col-12 col-md-6 col-lg-3">
          <div class="cnt-block equal-hight" style="height: 349px;">
          <img src="{{ asset('./storage/'.$item->foto) }}" alt="" title="">
            <h3>{{ $item->user->name }}</h3>
            <p>NIP : {{ $item->user->nip }}</p>
            <p>Jabatan : {{ $item->jabatan }}</p>
          </div>
      </li>
      @endforeach
    </ul>
      
    </section>
@endsection