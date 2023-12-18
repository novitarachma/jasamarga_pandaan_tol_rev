@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/tarif.css') }}" rel="stylesheet" />
@endsection
@section('content')
<section id="portfolio-details" class="portfolio-details">
<div class="container p-0">

    <div class="row">
        <div class="section-title">
            <h2>   </h2>
            <h2>   </h2>
            <h2>   </h2>
            <p>     </p>
            <h2>Profile</h2>
        </div>
        <div class="col-md-7 col-xl-8">
            <div class="card-body">
            </div>
        </div>
            <div class="card">
                <div class="card-header">
                    <div class="card-actions float-right">
                        <h5 class="card-title mb-0"></h5>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <h2><label for="inputState">Golongan Kendaraan</label></h2>
                                <select id="inputState" class="form-control">
                                    <option selected="">Pilih Golongan</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <h2><label for="inputState">Gerbang Asal</label></h2>
                                <select id="inputState" class="form-control">
                                    <option selected="">Pilih Gerbang Asal</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <h2><label for="inputState">Gerbang Tujuan</label></h2>
                                <select id="inputState" class="form-control">
                                    <option selected="">Pilih Gerbang Tujuan</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="buttons-container">
                                <button class="button-arounder">Tambah Tarif</button>
                                    &nbsp;
                                <button class="button-arounder">Bersihkan Tarif</button>
                            </div>
                        </div>
                        <div class="cardC">
                            <div class="cardC-body">
                                <div class="sectiont-titlet">
                                    <h2><strong> Total Tarif </strong></h2>
                                    <strong> <p>Rp.0</p> </strong>
                                </div>
                            </div>
                        </div>
                        <hr></hr>
                        <div class="cardt">
                            <div class="cardt-body">
                                <div class="sectionc-titlec">
                                    <h2><strong> Tarif yang Tersimpan </strong></h2>
                                    <div class="cardS">
                                    <div class="cardS-body">
                                        <div class="sectionS-titleS">
                                            <h3><strong> AsalGerbang+TujuanGerbang </strong></h3>
                                            <p><strong>Golongan  = Rp.0</strong></p>
                                        </div>
                                    </div>
                                    </div>
                                    &nbsp;
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    &ensp;
                                    <div class="cardS">
                                    <div class="cardS-body">
                                        <div class="sectionS-titleS">
                                            <h3><strong> AsalGerbang+TujuanGerbang </strong></h3>
                                            <p><strong>Golongan  = Rp.0</strong></p>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
