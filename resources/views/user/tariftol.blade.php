@extends('layouts.user')

@section('css')
<link href="{{ asset('assets/css/tarif.css') }}" rel="stylesheet" />
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/dist/css/adminlte.min.css">
@endsection

@section('content')
<section id="portfolio-details" class="portfolio-details">
    <br><br>
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Tarif Tol Pandaan</h2>
                <hr>
                </hr>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('cek-tarif') }}" id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <h2><label for="inputState">Golongan Kendaraan</label></h2>
                                    <select class="form-control" style="width: 100%;" id="golongan" name="golongan_id">
                                        <option selected="">-</option>
                                        @foreach($golongan as $gl)
                                        <option value="{{ $gl->id }}">{{ $gl->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <h2><label for="inputState">Gerbang Asal</label></h2>
                                    <select class="form-control" style="width: 100%;" id="asal" name="asal_id">
                                        <option selected="">-</option>

                                        @if ($batas == null){
                                        @foreach($asal as $as)
                                        <option value="{{ $as->id }}">{{ $as->name }}</option>
                                        @endforeach
                                        }@else{
                                        <option value="{{ $asal->id }}">{{ $asal->name }}</option>
                                        }@endif
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <h2><label for="inputState">Gerbang Tujuan</label></h2>
                                    <select class="form-control" style="width: 100%;" id="tujuan" name="tujuan_id">
                                        <option selected="">-</option>
                                        @foreach($tujuan as $tj)
                                        <option value="{{ $tj->id }}">{{ $tj->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="buttons-container">
                                    <button type="submit" class="button-arounder">Tambah Tarif</button>
                                </div>
                            </div>
                        </form>
                        <div class="cardC">
                            <div class="cardC-body">
                                <div class="sectiont-titlet">
                                    <h2><strong> Total Tarif </strong></h2>
                                    <strong>
                                        <p>Rp. {{$total}}</p>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><b> Tarif yang Tersimpan</b></h3>
                                    <div class="card-tools">
                                        <form method="POST" action="{{ route('record.delete') }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button-arounder">Bersihkan Tarif</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach($record as $rc)
                                    <div class="col-12">
                                        <div class="card" style="background-color:#F0F8FF;">
                                            <div class="card-body">
                                                <div class="sectionS-titleS">
                                                    <h3><strong>{{$rc->tarif->asal->name}} -
                                                            {{$rc->tarif->tujuan->name}}
                                                        </strong></h3>
                                                    <h7><strong>{{$rc->tarif->golongan->name}} = Rp.
                                                            {{$rc->tarif->harga}}</strong></h7>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<!-- AdminLTE App -->
<script src="{{ asset('theme/adminlte') }}/dist/js/adminlte.min.js"></script>
@endsection