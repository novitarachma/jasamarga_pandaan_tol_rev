@extends('layouts.admin')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('theme/adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('title')
<div class="col-sm-6">
    <h1>Trash Galeri</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('galeri.index') }}">Galeri</a></li>
        <li class="breadcrumb-item active">Trash Galeri</li>
    </ol>
</div>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trash Galeri Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a class="btn btn-danger" href="{{ route('delete-permanent-all-galeri') }}">Delete All Galeri</a>
                    <br><br>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>Foto</th>
                                <th style="width: 220px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($galeri as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->tahun->name }}</td>
                                <td>{{ $value->judul }}</td>
                                <td>
                                    <img style="width: 50px; overflow: hidden" class="rounded-circle"
                                        src="{{ asset('./storage/'. $value->foto) }}" alt="">
                                </td>
                                <td>
                                    <form method="POST" action="{{route('restore-galeri', [$value->id])}}"
                                        class="d-inline">
                                        @csrf
                                        <input type="submit" value="Restore" class="btn btn-success" />
                                    </form>
                                    <form method="POST" action="{{route('delete-permanent-galeri', [$value->id])}}"
                                        class="d-inline" onsubmit="return confirm('Delete this data permanently ?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger">
                                    </form>
                                </td>
                            </tr>
                            @endforeach()
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trash Tahun Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <a class="btn btn-danger" href="{{ route('delete-permanent-all-tahun') }}">Delete All Tahun</a>
                    <br><br>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th style="width: 220px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tahun as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <form method="POST" action="{{route('restore-tahun', [$value->id])}}"
                                        class="d-inline">
                                        @csrf
                                        <input type="submit" value="Restore" class="btn btn-success" />
                                    </form>
                                    <form method="POST" action="{{route('delete-permanent-tahun', [$value->id])}}"
                                        class="d-inline" onsubmit="return confirm('Delete this data permanently ?')">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger">
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
<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
</script>
@endsection