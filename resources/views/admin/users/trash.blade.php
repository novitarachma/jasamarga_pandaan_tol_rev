@extends('layouts.admin')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('theme/adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('title')
<div class="col-sm-6">
    <h1>Trash User</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
        <li class="breadcrumb-item active">Trash User</li>
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
                    <h3 class="card-title">Trash User Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form method="POST" action="{{ route('delete-permanent-all-user') }}"
                        onsubmit="return confirm('Delete all this data permanently ?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete All User" class="btn btn-danger">
                    </form>
                    <br>
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
                                <th>Name</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th style="width: 220px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $key=>$value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->username }}</td>
                                <td>
                                    @foreach($value->roles as $key => $item)
                                    <span class="badge bg-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <form method="POST" action="{{route('restore-user', [$value->id])}}"
                                        class="d-inline">
                                        @csrf
                                        <input type="submit" value="Restore" class="btn btn-success" />
                                    </form>
                                    <form method="POST" action="{{route('delete-permanent-user', [$value->id])}}"
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
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
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