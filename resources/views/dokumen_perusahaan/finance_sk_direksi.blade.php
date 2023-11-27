@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/dokumen.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
@endsection
@section('content')
<section id="dokumen" class="dokumen">
    <div class="container">
        <div class="section-title">
            <h2>   </h2>
            <h2>Category : Surat Keputusan Direksi</h2>
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
                <img src="https://ptjpt.co.id/wp-content/uploads/2018/01/PEMBENTUKAN-TIM-AUDIT-INTERNAL-370x290.png" alt="">
                <div class="card-body">
                    <h2>SK PEMBENTUKAN TIM AUDIT INTERNAL</h2>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" position="center">Download</button>
                </div>
            </div>
        
    </section>
@endsection