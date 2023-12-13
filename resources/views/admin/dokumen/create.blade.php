@extends('layouts.admin')

@section('style')

@endsection

@section('title')
<div class="col-sm-6">
    <h1>Add Dokumen</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dokument.index') }}">Dokumen</a></li>
        <li class="breadcrumb-item active">Create Dokumen</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Add Dokumen</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{ route('dokument.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                name="judul" placeholder="Enter Judul">
                            @error('judul')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" placeholder="Enter Tanggal">
                            @error('tanggal')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">File Dokumen</label>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="divisi">Divisi</label>
                            <select class="form-control custom-select" style="width: 100%;" id="divisi"
                                name="divisi_id">
                                @foreach($divisi as $dv)
                                <option value="{{ $dv->id }}" selected="selected">{{ $dv->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select class="form-control custom-select" style="width: 100%;" id="kategori"
                                name="kategori_id">
                                @foreach($kategori as $kt)
                                <option value="{{ $kt->id }}" selected="selected">{{ $kt->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('dokument.index') }}" class="btn btn-secondary">Cancel</a>
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