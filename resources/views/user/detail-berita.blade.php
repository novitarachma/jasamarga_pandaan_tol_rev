@extends('layouts.user')

@section('content')
<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
    <br><br>
    <div class="container">
        <div class="section-title">
            <h2> </h2>
            <h2>Berita</h2>
        </div>

        <div class="row gy-12">

            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">

                        <div class="img">
                            <img src="https://ptjpt.co.id/wp-content/uploads/2019/05/052319_Site-Visit-Bank-Sindikasi.png"
                                alt="artikel">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3>{{ $data->judul }}</h3>
                    <ul>
                        <li><strong>News date</strong>: {{ $data->tanggal }}</li>
                    </ul>
                </div>
                <div class="portfolio-description">
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

        </div>

    </div>
</section><!-- End Portfolio Details Section -->
@endsection