<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{--datatable--}}

    <link href='{{asset('css/datatables.min.css')}}' rel="stylesheet" type="text/css">
    <link href='{{asset('css/responsive.dataTables.min.css')}}' rel="stylesheet" type="text/css">
    <link href='{{asset('css/dataTables.checkboxes.css')}}' rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">

    {{--style--}}
    <style>
        .datepicker{
            padding: 0.65rem 1rem!important;
            width: inherit;
        }

        .datepicker form-control m-input m-input--square non-req{
            padding: 0.65rem 1rem!important;
            width: inherit;
        }
        .dataTables_filter { display: block; }
        .table-box {
            padding-left: 10px;
            padding-right: 10px;
            background-color: #ffffff;
            padding-top: 25px;
            padding-bottom: 25px;
            max-width: -webkit-fill-available;
            max-width: -moz-available;
        }
        th{
            font-size: 12px;
            text-align: center;
        }
        table.dataTable thead th {
            background-color: lightgrey;
            border: 1px solid #ddd;
        }
        .dataTables_wrapper {
            font-family: tahoma;
            font-size: 12px;
            position: relative;
            clear: both;
            *zoom: 1;
            zoom: 1;
        }
        a.disabled {
            pointer-events: none;
            cursor: default;
        }
        .dataTables_scroll {
            clear: both;
        }
        .dataTables_scrollBody {
            *margin-top: -1px;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    
</head>
<body>
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
@section('title2', '')
@section('content')
    <div class="div d-flex justify-content-center">
        <div class="card w-50">
        <h5 class="card-header text-bold">Create New Admin</h5>
        <div class="card-body d-flex justify-content-center">
            <div class="row justify-content-center">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="/createadmin" method="post">
                    @csrf
                    <div class="mb-3 col-auto d-flex">
                        <label for="name" class="col-form-label mr-2 w-25">Nama</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="email" class="form-label mr-2 w-25">Alamat Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="password" class="col-form-label mr-2 w-25">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="current-password">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="password" class="form-label mr-2 w-25">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="current-password">
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="role" class="form-label mr-2 w-25">Pilih Role:</label>
                        <select class="form-select" aria-label="Default select example" name="role" id="role">
                            <option selected>--Pilih Status--</option>
                            <option value="1">Admin Cabang</option>
                            <option value="2">Admin HO</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="branch_code" class="col-form-label mr-2 w-25">Cabang</label>
                        <select name="branch_code" id="branch_code" class="form-select">
                                @foreach ($data as $cabang)
                                <option value="{{ $cabang->id }}">{{ $cabang->name }}</option>
                                @endforeach 
                        </select>
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary mr-2">Submit</button>
                          <a class="btn btn-info" href="/viewListAdmin">Kembali ke List Admin</a>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
        
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



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>


    {{--datatable--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>



    <script>
        drawTable();
        
        function drawTable() {
            $('li').removeClass("active");
            $('#sidebar1').removeClass("active").css("font-weight", "normal");
            $('#sidebar2').removeClass("active").css("font-weight", "normal");
            $('#sidebar3').addClass("active").css("font-weight", "bold");
            $('#sidebar4').removeClass("active").css("font-weight", "normal");
            $('#sidebar5').removeClass("active").css("font-weight", "normal");
            $('#sidebar6').removeClass("active").css("font-weight", "normal");
            $('#sidebar7').removeClass("active").css("font-weight", "normal");
            $('#sidebar8').removeClass("active").css("font-weight", "normal");
        } 
    </script>
@endpush
</body>
</html>