@extends('layouts.admin')

@section('style')
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="{{ asset('theme/adminlte') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/plugins/jqvmap/jqvmap.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('theme/adminlte') }}/plugins/summernote/summernote-bs4.min.css">
@endsection

@section('title')
<div class="col-sm-6">
    <h1 class="m-0">Dashboard</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Home</li>
    </ol>
</div><!-- /.col -->
@endsection

@section('content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $berita->count() }}</h3>

                    <p>Newspaper</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-newspaper"></i>
                </div>
                <a href="{{ route('news.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $pesan->count() }}</h3>

                    <p>Message</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-envelope"></i>
                </div>
                <a href="{{ route('pesan.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $user->count() }}</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
@endsection

@section('script')
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('theme/adminlte') }}/dist/js/pages/dashboard.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('theme/adminlte') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="{{ asset('theme/adminlte') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('theme/adminlte') }}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('theme/adminlte') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('theme/adminlte') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('theme/adminlte') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('theme/adminlte') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('theme/adminlte') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('theme/adminlte') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
</script>
<!-- Summernote -->
<script src="{{ asset('theme/adminlte') }}/plugins/summernote/summernote-bs4.min.js"></script>

@endsection