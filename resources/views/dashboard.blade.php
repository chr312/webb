@extends('layouts.master')
@section('title', 'Klikindogrosir')
@push('custom-css')
    <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('') }}AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('') }}AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('') }}AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('') }}AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('') }}AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">
@endpush
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $jumlahpesanan }}</h3>
                <p>Semua Pesanan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/main" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $pesananbaru }}</h3>
                <p>Pesanan Baru</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-upload-outline"></i>
              </div>
              <a href="/main2" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner text-white">
                <h3>{{ $siapdikirim }}</h3>
                <p>Siap Dikirim</p>
              </div>
              <div class="icon">
                <i class="ion ion-loop"></i>
              </div>
              <a href="/main3" class="small-box-footer text-white" style="color: white">More info <i class="fas fa-arrow-circle-right text-white"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $dalampengiriman }}</h3>
                <p>Dalam Pengiriman</p>
              </div>
              <div class="icon">
                <i class="ion ion-paper-airplane"></i>
              </div>
              <a href="/main4" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $pesanandicustomer }}</h3>
                <p>Pesanan Diterima Customer</p>
              </div>
              <div class="icon">
                <i class="ion ion-location"></i>
              </div>
              <a href="/main5" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $dibatalkan }}</h3>
                <p>Pesanan Dibatalkan</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-cancel"></i>
              </div>
              <a href="/main6" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
            
            <script> 
              drawTable();
        
              function drawTable() {
                  $('li').removeClass("active");
                  $('#sidebar1').addClass("active").css("font-weight", "bold");
                  $('#sidebar2').removeClass("active").css("font-weight", "normal");
                  $('#sidebar3').removeClass("active").css("font-weight", "normal");
                  $('#sidebar4').removeClass("active").css("font-weight", "normal");
                  $('#sidebar5').removeClass("active").css("font-weight", "normal");
                  $('#sidebar6').removeClass("active").css("font-weight", "normal");
                  $('#sidebar7').removeClass("active").css("font-weight", "normal");
                  $('#sidebar8').removeClass("active").css("font-weight", "normal");

              }

      </script>
@endsection

@push('custom-script')
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('') }}AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
{{--  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('') }}AdminLTE-3.2.0/dist/js/pages/dashboard.js"></script>  --}}

@endpush