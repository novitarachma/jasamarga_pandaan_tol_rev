@extends('layouts.admin')

@section('style')

@endsection

@section('title')
<div class="col-sm-6">
    <h1>Import File</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Import File</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Import File</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @elseif (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
            @endif
            <form method="post" action="{{ route('fileUpload') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label for="label">Tujuan Table</label>
                            <select class="form-control custom-select" style="width: 100%;" id="label" name="label">
                                @foreach($label as $v)
                                <option value="{{ $v }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="tahun" hidden>
                            <label for="tahun">Tahun Table</label>
                            <select class="form-control custom-select" style="width: 100%;" id="tahun" name="tahun">
                                @foreach($tahun as $v)
                                <option value="{{ $v->id }}" selected="selected">{{ $v->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group" id="bulan" hidden>
                            <label for="bulan">Bulan Table</label>
                            <select class="form-control custom-select" style="width: 100%;" id="bulan" name="bulan">
                                @foreach($bulan as $v)
                                <option value="{{ $v->id }}" selected="selected">{{ $v->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file"
                                        class="custom-file-input @error('file') is-invalid @enderror" id="file">
                                    <label class="custom-file-label" for="file">Choose file</label>
                                    @error('file')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <!-- <a href="{{ url('user') }}" class="btn btn-secondary">Cancel</a> -->
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('theme/adminlte') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function() {
    bsCustomFileInput.init();
});
</script>
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
@endsection