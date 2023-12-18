@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/galeri.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- ======= Galeri Section ======= -->
<section id="galeri" class="galeri">
    <br><br>
    <div class="container">
        <div class="section-title">
            <h2>Galeri</h2>
            <p></p>
        </div>
    <ul class="controls">
        <li class="buttons active" data-filter="all">All</li>
        @foreach ($tahun as $item)
        <li class="buttons" data-filter="{{ $item->name }}">Tahun {{ $item->name }}</li>
        @endforeach
    </ul>
        <div class="gallery-content">
        @foreach ($post as $item)
          <div class="g-card">
            <a href="{{ asset('./storage/'.$item->foto) }}" class="{{ $item->tahun->name }}">
                <img src="{{ asset('./storage/'.$item->foto) }}" alt="Net Error" />
                <h3>{{ $item->judul }}</h3>
            </a>
          </div>       
        @endforeach
        </div>

        <!-- jquery cdn link  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- magnific popup js cdn link  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js">
        </script>

        <script>
        $(document).ready(function() {

            $('.buttons').click(function() {

                $(this).addClass('active').siblings().removeClass('active');

                var filter = $(this).attr('data-filter')

                if (filter == 'all') {
                    $('.image').show(400);
                } else {
                    $('.image').not('.' + filter).hide(200);
                    $('.image').filter('.' + filter).show(400);
                }

            });

            $('.gallery-content').magnificPopup({

                delegate: 'a',
                type: 'image',
                gallery: {
                    enabled: true
                }

            });

        });
        </script>
</section>
<!-- End Galeri Section -->
@endsection