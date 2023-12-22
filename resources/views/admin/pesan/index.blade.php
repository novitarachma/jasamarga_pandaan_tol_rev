@extends('layouts.admin')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('theme/adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection

@section('title')
<div class="col-sm-6">
    <h1>Inbox Message</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin.page') }}">Home</a></li>
        <li class="breadcrumb-item active">Message</li>
    </ol>
</div>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <!-- <a href="compose.html" class="btn btn-primary btn-block mb-3">Compose</a>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Folders</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item active">
                            <a href="#" class="nav-link">
                                <i class="fas fa-inbox"></i> Inbox
                                <span class="badge bg-primary float-right">12</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-envelope"></i> Sent
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-file-alt"></i> Drafts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-filter"></i> Junk
                                <span class="badge bg-warning float-right">65</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-trash-alt"></i> Trash
                            </a>
                        </li>
                    </ul>
                </div>
        </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Labels</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle text-danger"></i>
                                Important
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle text-warning"></i> Promotions
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle text-primary"></i>
                                Social
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div> -->
            <!-- /.col -->
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Inbox</h3>

                        <!-- <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-1">
                        <div class="mailbox-controls">
                            <!-- Check all button -->
                            <!-- <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                    class="far fa-square"></i>
                            </button> -->
                            <div class="btn-group">
                                <form method="POST" action="{{ route('delete-all-message') }}"
                                    onsubmit="return confirm('Delete all this data permanently ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="far fa-trash-alt"> Delete All</i>
                                    </button>
                                </form>
                            </div>
                            <!-- /.btn-group -->
                            <!-- <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-sync-alt"></i>
                            </button> -->
                            <div class="float-right">
                                {{ $pesan->currentPage() }}-{{ $pesan->perPage() }}/{{ $pesan->total() }}
                                <!-- <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </div> -->
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.float-right -->
                        </div>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @foreach($pesan as $value)
                                    <tr style="text-align: center;">
                                        <td>
                                            <div class="btn-group">
                                                <form method="POST" action="{{route('delete-message', [$value->id])}}"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Delete this data permanently ?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="mailbox-name"><a href="read-mail.html">{{$value->name}}</a></td>
                                        <td class="mailbox-subject">{{$value->pesan}}</td>
                                        <td class="mailbox-attachment">{{$value->email}}</td>
                                        <td class="mailbox-date">{{$value->created_at}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <div class="card-footer p-2">
                        <div class="mailbox-controls">
                            <div class="float-right">
                                {{ $pesan->links() }}
                            </div>
                            <!-- /.float-right -->
                        </div>
                    </div>
                </div>
            </div>
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
<script src="{{ asset('theme/adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js">
</script>
<script src="{{ asset('theme/adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
</script>
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