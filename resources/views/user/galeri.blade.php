@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/galeri.css') }}" rel="stylesheet">
@endsection
@section('content')
<!-- ======= Galeri Section ======= -->
<section id="galeri" class="galeri">
    <div class="container">
    <div class="section-title">
        <h2>Galeri</h2>
        <p></p>
        </div>
    <ul class="controls">
        <li class="buttons active" data-filter="all">All</li>
        <li class="buttons" data-filter="2019">Tahun 2019</li>
        <li class="buttons" data-filter="2020">Tahun 2020</li>
        <li class="buttons" data-filter="2021">Tahun 2021</li>
        <li class="buttons" data-filter="2022">Tahun 2022</li>
        <li class="buttons" data-filter="2023">Tahun 2023</li>
        <li class="buttons" data-filter="2023">Tahun 2024</li>
    </ul>
        <div class="gallery-content">
        @foreach ($post as $item)
        
        @if($item->tahun == '2019')
          <div class="g-card">
            <a href="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" class="image 2019">
                <img src="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" alt="Net Error" />
                <h3>{{ $item->judul }}</h3>
            </a>
          </div>       
        @elseif($item->tahun == '2020')
          <div class="g-card">
            <a href="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" class="image 2020">
                <img src="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" alt="Net Error" />
                <h3>{{ $item->judul }}</h3>
            </a>
          </div>
        @elseif($item->tahun == '2021')
          <div class="g-card">
            <a href="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" class="image 2021">
                <img src="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" alt="Net Error" />
                <h3>{{ $item->judul }}</h3>
            </a>
          </div>
        @elseif($item->tahun == '2022')
          <div class="g-card">
            <a href="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" class="image 2022">
                <img src="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" alt="Net Error" />
                <h3>{{ $item->judul }}</h3>
            </a>
          </div>
        @elseif($item->tahun == '2023')
          <div class="g-card">
            <a href="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" class="image 2023">
                <img src="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" alt="Net Error" />
                <h3>{{ $item->judul }}</h3>
            </a>
          </div>
        @elseif($item->tahun == '2024')
          <div class="g-card">
            <a href="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" class="image 2024">
                <img src="https://statik.tempo.co/data/2015/06/12/id_409054/409054_620.jpg" alt="Net Error" />
                <h3>{{ $item->judul }}</h3>
            </a>
          </div>
        @endif

        @endforeach
        </div>

        <!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- magnific popup js cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

<script>

$(document).ready(function(){

    $('.buttons').click(function(){

        $(this).addClass('active').siblings().removeClass('active');

        var filter = $(this).attr('data-filter')

        if(filter == 'all'){
            $('.image').show(400);
        }else{
            $('.image').not('.'+filter).hide(200);
            $('.image').filter('.'+filter).show(400);
        }

    });

    $('.gallery-content').magnificPopup({

        delegate:'a',
        type:'image',
        gallery:{
            enabled:true
        }

    });

});

</script>
      </section>
    <!-- End Galeri Section -->
@endsection