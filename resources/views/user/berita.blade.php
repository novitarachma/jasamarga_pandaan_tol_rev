@extends('layouts.user')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Berita</h2>
        </div>
    
    <div class="konten" id="artikel">
        
        <div class="content-container">
        @foreach ($ber as $item)
            <div class="card">
                <img src="{{ asset('./storage/'.$item->foto) }}" alt="artikel">
                <div class="card-body">
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ substr($item['paragraf1'], 0, 200) }}...</p>
                </div>
                <div class="card-footer">
                    <p>{{ $item->tanggal }}</p>
                    <a href="{{ route('detail-berita',$item->id) }}">
                        <p>Read more</p>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
    
    </div>
    
    </section>
<!-- End Hero -->
@endsection
