@extends('layouts.admin')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('theme/adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

@endsection

@section('title')
<div class="col-sm-6">
    <h1>Data Settings</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item active">Settings</li>
    </ol>
</div>
<br><br>
<div class="col-sm-6">
    <div class="col-12">
        <a class="btn btn-danger" href="{{ route('trash-settings') }}">Trash</a>
    </div>
    @if (session('success'))
    <br>
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @elseif (session('error'))
    <br>
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif
</div>

@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tahun Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a class="btn btn-success" href="{{ route('tahun.create') }}">Add Tahun</a>
                    <br><br>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($tahun as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <form onsubmit="return confirm('Move data to trash?')"
                                        action="{{ route('tahun.destroy',['tahun'=>$value->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Divisi Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a class="btn btn-success" href="{{ route('divisi.create') }}">Add Divisi</a>
                    <br><br>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($divisi as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <form onsubmit="return confirm('Move data to trash?')"
                                        action="{{ route('divisi.destroy',['divisi'=>$value->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bulan Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a class="btn btn-success" href="{{ route('bulan.create') }}">Add Bulan</a>
                    <br><br>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr style="text-align: center;">
                                <th style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($bulan as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <form onsubmit="return confirm('Move data to trash?')"
                                        action="{{ route('bulan.destroy',['bulan'=>$value->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset('theme/adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('theme/adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('theme/adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('theme/adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
@endsection