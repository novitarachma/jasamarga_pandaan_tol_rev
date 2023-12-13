@extends('layouts.admin')

@section('style')

@endsection

@section('title')
<div class="col-sm-6">
    <h1>Update Galeri</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Galeri</a></li>
        <li class="breadcrumb-item active">Update Galeri</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Update Galeri</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{ route('galeri.update', $galeri->id) }}" id="myForm"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                name="judul" value="{{ $galeri->judul }}" placeholder="Enter Judul">
                            @error('judul')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select class="form-control custom-select" style="width: 100%;" id="tahun" name="tahun_id"
                                value="{{ $galeri->tahun->name }}">
                                @foreach($tahun as $th)
                                <option value="{{ $th->id }}">{{ $th->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="foto">File Foto</label>
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                            id="foto" value="{{ $galeri->foto }}">
                        @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <img style="width: 100px" src="{{ asset('./storage/'. $galeri->foto) }}" alt="">
                    </div>
                </div>

                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Cancel</a>
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
@endsection