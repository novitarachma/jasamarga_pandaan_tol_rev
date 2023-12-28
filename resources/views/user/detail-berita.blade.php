@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/detail.css') }}" rel="stylesheet" />
@endsection
@section('content')
<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <br><br>
    <div class="container">
        <div class="section-title">
        
            <h2>Berita</h2>
        </div>
        <div class="row no-gutters">
            <div class="thumbanail right">
                <img src="{{ asset('./storage/'.$data->foto) }}" alt="" />
            </div>           
            <h4>{{ $data->judul }}</h4>
            <p>
                {{ $data->paragraf1 }}
            </p>
            <p>
                {{ $data->paragraf2 }}
            </p>
            <p>
                {{ $data->paragraf3 }}
            </p>
          
            <div class="thumbanail left">
                <img src="{{ asset('./storage/'.$data->foto) }}" alt="" />
            </div>           
            <h4>{{ $data->judul }}</h4>
            <p>
                {{ $data->paragraf1 }}
            </p>
            <p>
                {{ $data->paragraf2 }}
            </p>
            <p>
                {{ $data->paragraf3 }}
            </p>
 	
	    </div>
    </div>
</section><!-- End Portfolio Details Section -->
@endsection