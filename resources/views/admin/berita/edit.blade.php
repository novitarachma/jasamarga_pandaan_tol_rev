@extends('layouts.admin')

@section('style')

@endsection

@section('title')
<div class="col-sm-6">
    <h1>Update Berita</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('berita.index') }}">Berita</a></li>
        <li class="breadcrumb-item active">Update Berita</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Update Berita</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{ route('berita.update') }}" id="myForm" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                name="judul" value="{{ $berita->judul }}" placeholder="Enter Judul">
                            @error('judul')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="paragraf1">Paragraf 1</label>
                            <textarea class="form-control @error('paragraf1') is-invalid @enderror" rows="3"
                                id="paragraf1" name="paragraf1" value="{{ $berita->paragraf1 }}"
                                placeholder="Enter Paragraph 1"></textarea>
                            @error('paragraf1')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ $berita->tanggal }}" placeholder="Enter Tanggal">
                            @error('tanggal')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="paragraf2">Paragraf 2</label>
                            <textarea class="form-control @error('paragraf2') is-invalid @enderror" rows="3"
                                id="paragraf2" name="paragraf2" value="{{ $berita->paragraf2 }}"
                                placeholder="Enter Paragraph 2"></textarea>
                            @error('paragraf2')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">File Foto</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto"
                                        class="custom-file-input @error('foto') is-invalid @enderror" id="foto"
                                        value="{{ $berita->foto }}">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                    @error('foto')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <img style="width: 100px" src="{{ asset('./storage/'. $galeri->foto) }}" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="paragraf3">Paragraf 3</label>
                            <textarea class="form-control @error('paragraf3') is-invalid @enderror" rows="3"
                                id="paragraf3" name="paragraf3" value="{{ $berita->paragraf3 }}"
                                placeholder="Enter Paragraph 3"></textarea>
                            @error('paragraf3')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('berita.index') }}" class="btn btn-secondary">Cancel</a>
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