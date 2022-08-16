@extends('layouts.app')

@section('title', 'Riwayat Undian')

@section('plugin_css')
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{url('/assets/css/sweetalert2.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/assets/css/datatables.css')}}">

<!-- Plugins css Ends-->
@endsection

@section('content')
<!-- page-wrapper Start       -->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    @include('layouts.header')
    <!-- Page Header End-->
    <!-- Page Body Start-->
    <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        @include('layouts.sidebar', ['activeMenu' => 'active'])
        <!-- Page Sidebar End-->
        <div class="page-body">
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>Riwayat Undian Detail: {{$namaPeriode->nama_periode}}</h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{route('riwayatUndianIndex')}}">Riwayat Undian</a></li>
                                        <li class="breadcrumb-item active">Riwayat Undian Detail: {{$namaPeriode->nama_periode}}</li>
                                    </ol>
                                </div>
                                <div class="col-sm-6">
                                    <!-- Bookmark Start-->
                                    <div class="bookmark">
                                        <!-- <ul>
                                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Tables"><i data-feather="inbox"></i></a></li>
                                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                                            <li><a href="javascript:void(0)" data-container="body" data-bs-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="bookmark-search" data-feather="star"></i></a>
                                            <form class="form-inline search-form">
                                                <div class="form-group form-control-search">
                                                    <input type="text" placeholder="Search..">
                                                </div>
                                            </form>
                                            </li>
                                        </ul> -->
                                    </div>
                                    <!-- Bookmark Ends-->
                                </div>
                            </div>
                        </div>
                        <!-- Container-fluid starts-->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12 box-col-8">
                                    <div id="card-hadiah" class="card mb-2">
                                        <!-- <div class="card-header pb-0">
                                        </div> -->
                                        <div class="card-body">
                                            <table class="display datatables" id="data-riwayat-undian-detail" >
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nomor Rekening</th>
                                                        <th>Nama Nasabah</th>
                                                        <th>Alamat</th>
                                                        <th>Produk</th>
                                                        <th>Nomor Undian</th>
                                                        <th>Hadiah</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
    </div>
    <!-- footer start-->
    @include('layouts.footer')
    
</div>

@endsection

@section('plugin_js')
<!-- Plugins JS start-->
<script src="{{url('/assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{url('/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/assets/js/form-wizard/jquery.backstretch.min.js')}}"></script>
<script src="{{url('/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{url('/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{url('/assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{url('/assets/js/tooltip-init.js')}}"></script>
<!-- Plugins JS Ends-->

<script>

    tableRiwayatUndianDetail = $('#data-riwayat-undian-detail').DataTable({
        bFilter: false,
        processing: true,
        serverSide: true,
        ordering: false,
        // scrollY: true,
        // scrollX: true,
        // paging: true,
        // searching: { "regex": true },
        preDrawCallback: function(settings) {
            api = new $.fn.dataTable.Api(settings);
        },
        ajax: {
            type: "POST",
            url: "{{route('getRiwayatPeriodeDetail')}}",
            dataType: "json",
            contentType: 'application/json',
            data: function (data) {
                var form = {};
                $.each($("form").serializeArray(), function (i, field) {
                    form[field.name] = field.value || "";
                });
                // Add options used by Datatables
                var info = {"_token": "{{ csrf_token() }}", "start": api.page.info().start, "length": api.page.info().length, "draw": api.page.info().draw, "periode_id": {{$periode_id}} };
                $.extend(form, info);
                return JSON.stringify(form);
            },
            "complete": function(response) {

            }
        },
        columns: [
            { "defaultContent": "", orderable: false, "width": "7%", render: function (data, type, row, meta){ return meta.row + meta.settings._iDisplayStart + 1; } },
            { orderable: false, data: 'no_rekening'},
            { orderable: false, data: 'nama_nasabah'},
            { orderable: false, data: 'alamat'},
            { orderable: false, data: 'produk'},
            { orderable: false, data: 'nomor_kupon'},
            { orderable: false, data: 'nama_hadiah'},
        ]
    });
</script>

@endsection