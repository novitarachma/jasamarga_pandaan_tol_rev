@extends('layouts.user')
@section('css')
<link href="{{ asset('assets/css/setprofile.css') }}" rel="stylesheet" />
@endsection
@section('content')

<section id="portfolio-details" class="portfolio-details">
    <br><br>
    <div class="container p-0">

        <div class="row">
            <div class="section-title">
                <h2>Slip Gaji Karyawan</h2>
            </div>
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Slip Gaji Karyawan</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('profil') }}" class="btn btn-sm btn-primary">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cetak.gaji')}}" id="myForm"
                            enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">Form Slip Gaji Karyawan</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                        <label for="label">Tahun</label>
                                        <select class="form-control custom-select" style="width: 100%;" id="label" name="tahun_id">
                                        <option value="" selected>-</option>
                                        @foreach($tahun as $th)
                                        <option value="{{ $th->id }}">{{ $th->name }}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                        <label for="label">Bulan</label>
                                        <select class="form-control custom-select" style="width: 100%;" id="label" name="bulan_id">
                                        <option value="" selected>-</option>
                                        @foreach($bulan as $bl)
                                        <option value="{{ $bl->id }}">{{ $bl->name }}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="submit" class="btn btn-sm btn-default center">Cetak</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type='text/javascript'>
$(window).load(function() {
    $("#label").change(function() {
        console.log($("#label option:selected").val());
        if ($("#label option:selected").val() == 'Gaji') {
            $('#bulan').prop('hidden', false);
            $('#tahun').prop('hidden', false);
        } else {
            $('#bulan').prop('hidden', 'true');
            $('#tahun').prop('hidden', 'true');
        }
    });
});
</script>
