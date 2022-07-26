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
        @include('layouts.sidebar')
        <!-- Page Sidebar End-->
        <div class="page-body">
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3>Riwayat Undian</h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Home</a></li>
                                        <li class="breadcrumb-item active">Riwayat Undian</li>
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
                                            <table class="display datatables" id="data-hadiah" >
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Periode</th>
                                                        <th>Action</th>
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
<script src="{{url('/assets/js/tooltip-init.js')}}"></script>
<script src="{{url('/assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{url('/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('/assets/js/form-wizard/jquery.backstretch.min.js')}}"></script>
<script src="{{url('/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{url('/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{url('/assets/js/sweet-alert/sweetalert.min.js')}}"></script>

<!-- Plugins JS Ends-->

<script>
    tableRiwayatPeriode = $('#data-hadiah').DataTable({
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
            url: "{{route('getRiwayatPeriode')}}",
            dataType: "json",
            contentType: 'application/json',
            data: function (data) {
                var form = {};
                $.each($("form").serializeArray(), function (i, field) {
                    form[field.name] = field.value || "";
                });
                // Add options used by Datatables
                var info = {"_token": "{{ csrf_token() }}", "start": api.page.info().start, "length": api.page.info().length, "draw": api.page.info().draw };
                $.extend(form, info);
                return JSON.stringify(form);
            },
            "complete": function(response) {

            }
        },
        columns: [
            { "defaultContent": "", orderable: false, "width": "10%", render: function (data, type, row, meta){ return meta.row + meta.settings._iDisplayStart + 1; } },
            { orderable: false, data: 'nama_periode'},
            { orderable: false, "width": "11%", 
                render: function (data, type, row) { 
                    linkRiwayatPeriodedetail = '{{route("riwayatPeriodeDetailIndex", ":periode_id")}}'
                    linkRiwayatPeriodedetail = linkRiwayatPeriodedetail.replace(":periode_id", row.periode_id);

                    linkRiwayatPeriodedetailExport = '{{route("exportRiwayatDetail", [":periode_id", ":nama_periode"])}}'
                    linkRiwayatPeriodedetailExport = linkRiwayatPeriodedetailExport.replace(":periode_id", row.periode_id);
                    linkRiwayatPeriodedetailExport = linkRiwayatPeriodedetailExport.replace(":nama_periode", row.nama_periode);

                    return '<a href="'+linkRiwayatPeriodedetail+'"><button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-html="true" title="Detail Riwayat Undian" style="position: relative; width: 37px; padding-top: 2px; padding-left: 0px; padding-right: 0px; padding-bottom: 2px; margin-right:5px;"><i class="icofont icofont-arrow-right" style="font-size:20px;"></i></button></a>\
                        <a href="'+linkRiwayatPeriodedetailExport+'"><button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" title="" role="button" data-bs-original-title="Export Data Detail Riwayat Undian" style="position: relative;width: 37px; padding-top: 2px; padding-left: 0px; padding-right: 0px; padding-bottom: 2px; margin-right:5px;"><i class="icofont icofont-download-alt" style="font-size:20px;"></i></button></a>\
                        <button type="button" class="btn btn-outline-danger" onclick=\'deleteRiwayatUndian('+row.periode_id +',"'+row.nama_periode+'")\' data-bs-toggle="tooltip" title="" role="button" data-bs-original-title="Hapus Data Riwayat Undian" style="position: relative;width: 37px; padding-top: 2px; padding-left: 0px; padding-right: 0px; padding-bottom: 2px; margin-right:5px;"><i class="icofont icofont-trash" style="font-size:20px;"></i></button>'
                }
            }
        ],
        drawCallback: function (settings, json) {                     
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
                
        }
    });

    function deleteRiwayatUndian(periodeId, namaPeriode){
        // link = '{{route("destroyRiwayatUndian", ":periode_id")}}'
        // link = link.replace(":periode_id", periodeId);

        // $.ajax({
        //     type: "DELETE",
        //     url: link,
        //     success:function(data){
        //         tableRiwayatPeriode.ajax.reload();
        //     }
        // });
    
        swal.fire({
            title: "Hapus Riwayat Undian Periode "+namaPeriode+"?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Hapus",
            showLoaderOnConfirm: true,
            preConfirm: (login) => {  
                link = '{{route("destroyRiwayatUndian", ":periode_id")}}'
                link = link.replace(":periode_id", periodeId);

                return $.ajax({
                    type: "DELETE",
                    url: link,
                    data: {"_token": "{{ csrf_token() }}"}, 
                    success: function(data) {
                        var request = 'success';
                    },
                    error: function(xhr, status, error){
                        if(xhr.responseText.search("Call to a member function getRealPath() on null")){
                            $(document).ready(function (){
                                console.log(xhr.responseJSON.error)
                                swal.fire({title:"Hapus Riwayat Undian Tidak Berhasil!", text: xhr.responseJSON.error, icon:"error"});
                            });
                        }else{
                            console.log(xhr)
                        }
                    }
                });
            }                       
        }).then((result) => {
            if(result.value){
            swal.fire({title:"Hapus Riwayat Undian "+namaPeriode+" Berhasil!", icon:"success"})
            .then(function(){ 
                tableRiwayatPeriode.ajax.reload();
            });
            }
        })
    }

</script>

@endsection