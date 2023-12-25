@extends('layouts.admin')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('theme/adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('title')
<div class="col-sm-6">
    <h1>Trash Settings</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('settings') }}">Settings</a></li>
        <li class="breadcrumb-item active">Trash Settings</li>
    </ol>
</div>
<br><br>
<div class="col-sm-6">
    <div class="col-12">
        <a href="{{ route('settings') }}" class="btn btn-secondary">Cancel</a>
    </div>
    @if (session('status'))
    <br>
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
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
                    <h3 class="card-title">Trash Tahun Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('delete-permanent-all-tahun') }}"
                        onsubmit="return confirm('Delete all this data permanently ?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete All Tahun" class="btn btn-danger">
                    </form>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th style="width: 180px;">Action</th>
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
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trash Divisi Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('delete-permanent-all-divisi') }}"
                        onsubmit="return confirm('Delete all this data permanently ?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete All Divisi" class="btn btn-danger">
                    </form>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th style="width: 180px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($divisi as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <form method="POST" action="{{route('restore-divisi', [$value->id])}}"
                                        class="d-inline">
                                        @csrf
                                        <input type="submit" value="Restore" class="btn btn-success" />
                                    </form>
                                    <form method="POST" action="{{route('delete-permanent-divisi', [$value->id])}}"
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trash Bulan Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('delete-permanent-all-bulan') }}"
                        onsubmit="return confirm('Delete all this data permanently ?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete All Bulan" class="btn btn-danger">
                    </form>
                    <br>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th style="width: 180px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bulan as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>
                                    <form method="POST" action="{{route('restore-bulan', [$value->id])}}"
                                        class="d-inline">
                                        @csrf
                                        <input type="submit" value="Restore" class="btn btn-success" />
                                    </form>
                                    <form method="POST" action="{{route('delete-permanent-bulan', [$value->id])}}"
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