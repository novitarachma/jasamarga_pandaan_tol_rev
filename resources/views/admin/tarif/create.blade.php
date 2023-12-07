@extends('layouts.admin')

@section('style')

@endsection

@section('title')
<div class="col-sm-6">
    <h1>Add Tarif Tol</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tarif.index') }}">Tarif Tol</a></li>
        <li class="breadcrumb-item active">Create Tarif Tol</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Add Tarif Tol</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{ route('tarif.store') }}" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="asal">Asal</label>
                            <select class="form-control custom-select" style="width: 100%;" id="asal" name="asal">
                                @foreach($asal as $as)
                                <option value="{{ $as->id }}" selected="selected">{{ $as->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <select class="form-control custom-select" style="width: 100%;" id="tujuan" name="tujuan">
                                @foreach($tujuan as $tj)
                                <option value="{{ $tj->id }}" selected="selected">{{ $tj->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <select class="form-control custom-select" style="width: 100%;" id="golongan"
                                name="golongan">
                                @foreach($golongan as $gl)
                                <option value="{{ $gl->id }}" selected="selected">{{ $gl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Tarif Tol</label>
                            <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga"
                                name="harga" placeholder="Harga Tol">
                            @error('harga')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('tarif.index') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success float-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection