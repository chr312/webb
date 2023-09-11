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
    <div class="div d-flex justify-content-center mt-5">
    <div class="div d-inline-block mr-3">
        <div class="card">
        <h5 class="card-header text-bold">Create New Kendaraan</h5>
        <div class="card-body d-flex justify-content-center">
            <div class="row justify-content-center">
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form action="/createkendaraan" method="post">
                    @csrf
                    <div class="mb-3 col-auto d-flex">
                        <label for="name" class="col-form-label mr-2">Nama Kendaraan</label>
                        <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="dimensi_panjang" class="form-label mr-2">Dimensi Panjang</label>
                        <input type="number" name="dimensi_panjang" class="form-control @error('dimensi_panjang') is-invalid @enderror" id="dimensi_panjang">
                        @error('dimensi_panjang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="dimensi_lebar" class="form-label mr-2">Dimensi Lebar</label>
                        <input type="number" name="dimensi_lebar" class="form-control @error('dimensi_lebar') is-invalid @enderror" id="dimensi_lebar">
                        @error('dimensi_lebar')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="dimensi_tinggi" class="form-label mr-2">Dimensi Tinggi</label>
                        <input type="number" name="dimensi_tinggi" class="form-control @error('dimensi_tinggi') is-invalid @enderror" id="dimensi_tinggi">
                        @error('dimensi_tinggi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex">
                        <label for="berat_max" class="form-label mr-2">Berat Maksimal</label>
                        <input type="number" name="berat_max" class="form-control @error('berat_max') is-invalid @enderror" id="berat_max">
                        @error('berat_max')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <hr color="silver">
                    </div>
                    <div class="mb-3 col-auto d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <div class="div d-inline-block ml-3">
        <div class="card justify-content-flex-end">
        <h5 class="card-header text-bold">List Kendaraan</h5>
        <div class="card-body d-flex justify-content-center">
            <div class="row justify-content-center">
                <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Nama Kendaraan</th>
                            <th>Dimensi Panjang</th>
                            <th>Dimensi Lebar</th>
                            <th>Dimensi Tinggi</th>
                            <th>Berat Max</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
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



    <script type="text/javascript">
        drawTable();
        
        var product;
        function drawTable() {
            $('li').removeClass("active");
            $('#sidebar1').removeClass("active").css("font-weight", "normal");
            $('#sidebar2').removeClass("active").css("font-weight", "normal");
            $('#sidebar3').removeClass("active").css("font-weight", "normal");
            $('#sidebar4').removeClass("active").css("font-weight", "normal");
            $('#sidebar5').removeClass("active").css("font-weight", "normal");
            $('#sidebar6').addClass("active").css("font-weight", "bold");
            $('#sidebar7').removeClass("active").css("font-weight", "normal");
            $('#sidebar8').removeClass("active").css("font-weight", "normal");
            
            $('#myTable').DataTable().destroy();
            product = $('#myTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                sScrollX: '100%',
                autoWidth: false,
                cursor: 'pointer',
                searching: true,
                lengthMenu: [
                    [15,25,50,100],
                    ['15 Files','25 Files','50 Files','100 files']
                ],
                buttons: [
                    'pageLength',
                ],
                "fnDrawCallback": function( oSettings ) {
                    $("#overlay").hide();
                    document.body.style.overflow = 'inherit';
                },
                dom: 'Bfrtip',
                "columnDefs": [
                    {"className": "dt-center", "targets": [0, 1, 2, 3, 4, 5]},
                    {"visible": false, "targets": "edit"},
                    // {"visible": false, "targets": "delete"},
                    { "width": "13%", "targets": 1 }
                ],
                ajax: {
                    url: '{{url('read/kendaraan')}}',
                },
                "order": [],
                //rowId : 'id',
                columns: [
                    {data: 'nama', name: 'nama',},
                    {data: 'dimensi_panjang', name: 'dimensi_panjang',},
                    {data: 'dimensi_lebar', name: 'dimensi_lebar',},
                    {data: 'dimensi_tinggi', name: 'dimensi_tinggi',},
                    {data: 'berat_max', name: 'berat_max',},
                    {data: 'action', name: 'action', orderable:false, searchable: false },
                ],
            });
        }
        
        //update data
        function edit(id) {
            $.get("{{url('editkendaraan')}}/" + id, {}, function(data, status) {
                $("#exampleModalLabel").html('Edit Master Kendaraan')
                $("#page").html(data);
                $("#exampleModal").modal('show');
            });
        }

        // untuk proses update data
        function update(id) {
            var nama = $("#nama").val();
            var dimensi_panjang = $("#dimensi_panjang").val();
            var dimensi_lebar = $("#dimensi_lebar").val();
            var dimensi_tinggi = $("#dimensi_tinggi").val();
            var berat_max = $("#berat_max").val();
            $.ajax({
                type: "post",
                url: "{{url('update')}}/" + id,
                data: {
                        "nama": nama,
                        "dimensi_panjang": dimensi_panjang,
                        "dimensi_lebar": dimensi_lebar,
                        "dimensi_tinggi": dimensi_tinggi,
                        "berat_max": berat_max,
                        },
                success: function(data) {
                    $(".btn-close").click();
                    drawTable()
                }
            });
        }
    </script>
@endpush
</body>
</html>