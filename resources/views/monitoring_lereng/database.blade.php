@extends('layouts.user')
@section('content')
<section id="dokumen" class="dokumen">
    <div class="container">
        <div class="section-title">
            <h2>   </h2>
            <h2>Category : Database</h2>
        </div>
    </div>
        <div class="container">
        <div class="example" action="action_page.php">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
        </div>

    <div class="row portfolio-container"></div>
    <div class="konten" id="artikel">
        <div class="content-container">
            <div class="card">
                <img src="https://ptjpt.co.id/wp-content/uploads/2020/09/laporan-inspeksi.jpg" alt="">
                <div class="card-body">
                    <h2>Hasil Pengamatan/Inspeksi</h2>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </div>

            <div class="card">
                <img src="https://ptjpt.co.id/wp-content/uploads/2020/09/penanganan-longsor.jpg" alt="">
                <div class="card-body">
                    <h2>Penanganan Kejadian Longsor</h2>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </div>

            <div class="card">
                <img src="https://ptjpt.co.id/wp-content/uploads/2020/09/kajian-teknik-longsor.jpg" alt="">
                <div class="card-body">
                    <h2>Kajian Teknis</h2>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </div>

            <div class="card">
                <img src="https://ptjpt.co.id/wp-content/uploads/2020/09/historis-longsor.jpg" alt="">
                <div class="card-body">
                    <h2>Data Historis Longsor</h2>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </div>
    </section>
@endsection