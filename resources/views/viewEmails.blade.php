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
@section('title2', 'List Email')
@section('content')
        <div class="row">
            <div class="col-lg-12">
                <div>
                    @yield('container')
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table id="myTable" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Cabang</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
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
        
        var product;
        function drawTable() {
            $('li').removeClass("active");
            $('#sidebar1').removeClass("active").css("font-weight", "normal");
            $('#sidebar2').addClass("active").css("font-weight", "bold");
            $('#sidebar3').removeClass("active").css("font-weight", "normal");
            $('#sidebar4').removeClass("active").css("font-weight", "normal");
            $('#sidebar5').removeClass("active").css("font-weight", "normal");
            $('#sidebar6').removeClass("active").css("font-weight", "normal");
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
                    {"className": "dt-center", "targets": [0, 1, 2, 3]},
                    {"visible": false, "targets": "edit"},
                    // {"visible": false, "targets": "delete"},
                    { "width": "13%", "targets": 1 }
                ],
                ajax: {
                    url: '{{url('read/datatable/manageemails')}}',
                },
                "order": [],
                //rowId : 'id',
                columns: [
                    {  
                        "data": null,
                        width: '10px',
                        "orderable": false,
                        "searchable": false,
                        "render": function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }  
                    },
                    {data: 'kode_cabang', name: 'kode_cabang',},
                    {data: 'email', name: 'email',},
                    {data: 'action', name: 'action', orderable:false, searchable: false },
                ],
            });

        }

        // untuk delete atau destroy data
        function reload(){
            window.location.href = "{{URL::to('/viewEmails')}}"
        }
        function deleteemail(id) {
            confirm("Apakah yakin mau menghapus data?")  
            console.log(id)
            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('deleteemail') }}",
                dataType: "json",
                data: {
                        id: id,
                        },
                success: function(data) {
                    console.log("success")
                    reload();
                },
                error: function (xhr,msg){
                            reload();
                        }
            });
        }
    </script>
@endpush
</body>
</html>