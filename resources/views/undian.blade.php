@extends('layouts.app')

@section('title', 'Undian')

@section('plugin_css')
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{url('/assets/css/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/assets/css/sweetalert2.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/assets/css/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/assets/css/animate.css')}}">

<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }
</style>
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
                                    <h3>Undian</h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Home</a></li>
                                        <li class="breadcrumb-item active">Undian</li>
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
                                    <div id="card-set-periode" class="card">
                                        <div class="card-header pb-0">
                                            <h5>Periode Undian</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="col-form-label">Pilih Periode Undian</label>
                                                <select class="js-example-basic-single col-sm-12">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="card-hadiah" class="card mb-2" style="display: none;">
                                        <div class="card-header pb-0">
                                            <h5>Hadiah Yang Sedang Di Undi</h5>
                                        </div>
                                        <div class="card-body text-center">
                                            <h1 id="hadiah-sedang-undi" class="display-1"></h1>
                                            <!-- <table class="display" id="data-hadiah" style="table-layout: fixed !important;width: 98% !important;">
                                                <thead>
                                                    <tr>
                                                        <th>Hadiah</th>
                                                        <th>Sudah Ditukarkan</th>
                                                    </tr>
                                                </thead>
                                            </table> -->
                                        </div>
                                    </div>
                                    <div id="card-input-no-undian" class="card" style="display: none;">
                                        <div class="card-header pb-0">
                                            <h5>Masukan Nomor Undian</h5>
                                        </div>
                                        <div class="card-body text-center" style="width: 80vw;position: relative;display: flex;flex-flow: column wrap;align-items: center;">
                                            <form id="form-nomor-kupon-undian">
                                                <div class="row g-3">
                                                    <div class="col-md-2 undian-digit">
                                                        <input class="form-control nomor-undian" id="nomor-undian-1" name="nomor_undian_1" type="number" style="height: 126px;font-size: 150px;width: 140px;" placeholder="" required="" maxlength="1">
                                                    </div>
                                                    <div class="col-md-2 undian-digit">
                                                        <input class="form-control nomor-undian" id="nomor-undian-2" name="nomor_undian_2" type="number" style="height: 126px;font-size: 150px;width: 140px;" placeholder="" required="" maxlength="1">
                                                    </div>
                                                    <div class="col-md-2 undian-digit mb-3">
                                                        <input class="form-control nomor-undian" id="nomor-undian-3" name="nomor_undian_3" type="number" style="height: 126px;font-size: 150px;width: 140px;" placeholder="" required="" maxlength="1">
                                                    </div>
                                                    <div class="col-md-2 undian-digit mb-3">
                                                        <input class="form-control nomor-undian" id="nomor-undian-4" name="nomor_undian_4" type="number" style="height: 126px;font-size: 150px;width: 140px;" placeholder="" required="" maxlength="1">
                                                    </div>
                                                    <div class="col-md-2 undian-digit mb-3">
                                                        <input class="form-control nomor-undian" id="nomor-undian-5" name="nomor_undian_5" type="number" style="height: 126px;font-size: 150px;width: 140px;" placeholder="" required="" maxlength="1">
                                                    </div>
                                                    <div class="col-md-2 undian-digit mb-3">
                                                        <input class="form-control nomor-undian" id="nomor-undian-6" name="nomor_undian_6" type="number" style="height: 126px;font-size: 150px;width: 140px;" placeholder="" required="" maxlength="1">
                                                    </div>
                                                    <div class="col-md-2 undian-digit mb-3">
                                                        <input class="form-control nomor-undian" id="nomor-undian-7" name="nomor_undian_7" type="number" style="height: 126px;font-size: 150px;width: 140px;" placeholder="" required="" maxlength="1">
                                                    </div>
                                                    <div class="col-md-2 undian-digit mb-3">
                                                        <input class="form-control nomor-undian" id="nomor-undian-8" name="nomor_undian_8" type="number" style="height: 126px;font-size: 150px;width: 140px;" placeholder="" required="" maxlength="1">
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-12 mt-5">
                                                <button id="search-no-undian" class="btn btn-primary" type="button" onclick="searchNomorUndian()">Cari Nomor Undian</button>
                                                <button id="tolak-no-undian" class="btn btn-danger" type="button" style="display: none;" onclick="rejectKuponUndian()">Tolak Nomor Undian</button>
                                                <button id="konfirmasi-no-undian" class="btn btn-success" type="button" style="display: none;" onclick="confirmKuponUndian()">Konfirmasi Nomor Undian</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-sm">
                                                    <tbody>
                                                        <tr>
                                                            <td scope="row" style="width: 10%;padding-left: 0px;padding-right: 0px;">Nomor Rekening</td>
                                                            <td style="width: 5px;padding-left: 0px;padding-right: 0px;">:</td>
                                                            <th id="no-rekening" style="padding-left: 0px;"></th>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row" style="width: 10%;padding-left: 0px;padding-right: 0px;">Nama Nasabah</td>
                                                            <td style="width: 5px;padding-left: 0px;padding-right: 0px;">:</td>
                                                            <th id="nama-nasabah" style="padding-left: 0px;"></th>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row" style="width: 10%;padding-left: 0px;padding-right: 0px;">Alamat</td>
                                                            <td style="width: 5px;padding-left: 0px;padding-right: 0px;">:</td>
                                                            <th id="alamat" style="padding-left: 0px;"></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
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
    var periodeId= 0;
    var periodeHadiahId= 0;
    
    $('#form-nomor-kupon-undian')[0].reset();

    $(".js-example-basic-single").select2({
        ajax: {
            url: "{{route('getDataPeriodeUndian')}}",
            dataType: 'json',
            type: "POST",
            quietMillis: 50,
            data: function (params) {
                return {
                    "_token": "{{ csrf_token() }}",
                    q: params.term, // search term
                };
            },
            processResults: function(data) {
                var items = [];
                for (var row of data.items) {
                    items.push({
                    id: row.id,
                    text: row.name
                    });
                }

                this.options.set('cacheDataSource', {items: items});

                return {
                    results: items
                };
            }
        },
        cacheDataSource: [],
        allowClear: true,
        placeholder: 'Pilih Periode ...',
        width: '100%',
    });

    $(".js-example-basic-single").on("select2:select", function (e) { 
        periodeId = $(e.currentTarget).val();
        getDataHadiah();

        $('#card-set-periode').removeClass('fadeOutUp animated').addClass('fadeOutUp animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            $(this).removeClass('fadeOutUp animated');
            $(this).css("display", "none");
        });
        
        setTimeout(function() {
            $('#card-hadiah').removeAttr("style").removeClass('fadeInDown animated').addClass('fadeInDown animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass('fadeInDown animated');
            });

            $('#card-input-no-undian').removeAttr("style").removeClass('fadeInDown animated').addClass('fadeInDown animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $(this).removeClass('fadeInDown animated');
            });
        }, 950);
    });

    tableHadiah = $('#data-hadiah').DataTable({
        bFilter: false,
        lengthChange: false,
        serverSide: false,
        info: false,
        paging: false,
        // scrollY: false,
        // scrollX: false,
        ordering: false,
        columns: [
            { data: 'nama_hadiah' },
            { data: 'exchanged' },
        ]
    });

    function getDataHadiah(){
        link = "{{route('getDataHadiah', ':periodeId')}}";
        link = link.replace(':periodeId', periodeId);

        $.ajax({
            type: "GET",
            url: link,
            dataType: "json",
            success:function(data){
                console.log(data)
                if(typeof data.nama_hadiah !== 'undefined'){
                    periodeHadiahId= data.id;
                    $('#hadiah-sedang-undi').text(data.nama_hadiah);
                    $('#form-nomor-kupon-undian input').removeAttr('readonly');
                }else{
                    $('#hadiah-sedang-undi').text(data.hadiah_habis);
                    $('#form-nomor-kupon-undian input').attr('disabled', 'disabled');

                    $('#search-no-undian').attr('disabled', 'true');
                    $("#tolak-no-undian").attr('disabled', 'true');
                    $("#konfirmasi-no-undian").attr('disabled', 'true');
                }
            }
        });
    }
    


    $('.nomor-undian').unbind('keyup change input paste').bind('keyup change input paste',function(e){
        var $this = $(this);
        var val = $this.val();
        var valLength = val.length;
        var maxCount = $this.attr('maxlength');
        if(valLength>maxCount){
            $this.val($this.val().substring(0,maxCount));
        }

        if(this.value.length === this.maxLength && e.key !== 'Backspace'){
            $(this).parent().next().children().focus();
        }

        if(valLength === 0 && e.key === 'Backspace'){
            $(this).parent().prev().children().focus();
        }
    }); 

    function searchNomorUndian(){
        var nomorUndian = $('#form-nomor-kupon-undian').serialize().replace(/[a-zA-Z_0-9]+/, "").replace(/&[^=]+/g, "").replace(/=/g, "");
        link = "{{route('getDataKuponUndian', [':idPeriode', ':nomor_undian'])}}";
        link = link.replace(":idPeriode", periodeId);
        link = link.replace(":nomor_undian", nomorUndian);

        $.ajax({
            type: "GET",
            url: link,
            dataType: "json",
            success:function(data){
                periodeNoKuponId= data.periode_id;
                $("#no-rekening").text(data.no_rekening);
                $("#nama-nasabah").text(data.nama_nasabah);
                $("#alamat").text(data.alamat);
                $("#search-no-undian").css("display", "none");
                $("#tolak-no-undian").removeAttr("style");
                $("#konfirmasi-no-undian").removeAttr("style");
                $('#form-nomor-kupon-undian input').attr('readonly', 'readonly');
            }
        });
    }

    function rejectKuponUndian(){
        swal.fire({
            title: "Tolak Nomor Undian?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Tolak",
            showLoaderOnConfirm: true,
            preConfirm: (login) => {  
                var nomorUndian = $('#form-nomor-kupon-undian').serialize().replace(/[a-zA-Z_0-9]+/, "").replace(/&[^=]+/g, "").replace(/=/g, "");
                return $.ajax({
                    type: "POST", 
                    url: "{{route('tolakNomorUndian')}}",
                    datatype : "json", 
                    data: {"periodeId":periodeId, "nomorUndian":nomorUndian, "_token": "{{ csrf_token() }}"}, 
                    success: function(data) {
                        var request = 'success';
                    },
                    error: function(xhr, status, error){
                        if(xhr.responseText.search("Call to a member function getRealPath() on null")){
                            $(document).ready(function (){
                                console.log(xhr.responseJSON.error)
                                $('#form-nomor-kupon-undian input').removeAttr('readonly');
                                $("#search-no-undian").removeAttr("style");
                                $("#tolak-no-undian").css("display", "none");
                                $("#konfirmasi-no-undian").css("display", "none");
                                $('#form-nomor-kupon-undian')[0].reset();
                                $('#no-rekening').text('');
                                $('#nama-nasabah').text('');
                                $("#alamat").text('');
                                swal.fire({title:"Tolak Nomor Undian Tidak Berhasil!", text: xhr.responseJSON.error, icon:"error"});
                            });
                        }else{
                            console.log(xhr)
                        }
                    }
                });
            }                       
        }).then((result) => {
            if(result.value){
            swal.fire({title:"Tolak Nomor Undian Berhasil!", icon:"success"})
            .then(function(){ 
                $('#form-nomor-kupon-undian input').removeAttr('readonly');
                $("#search-no-undian").removeAttr("style");
                $("#tolak-no-undian").css("display", "none");
                $("#konfirmasi-no-undian").css("display", "none");
                $('#form-nomor-kupon-undian')[0].reset();
                $('#no-rekening').text('');
                $('#nama-nasabah').text('');
                $("#alamat").text('');
            });
            }
        })
    }

    function confirmKuponUndian(){
        swal.fire({
            title: "Konfirmasi Nomor Undian",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "Konfirmasi",
            showLoaderOnConfirm: true,
            preConfirm: (login) => {  
                var nomorUndian = $('#form-nomor-kupon-undian').serialize().replace(/[a-zA-Z_0-9]+/, "").replace(/&[^=]+/g, "").replace(/=/g, "");
                return $.ajax({
                    type: "POST", 
                    url: "{{route('konfirmasiNomorUndian')}}",
                    datatype : "json", 
                    data: {"periodeId":periodeId, "periodeHadiahId":periodeHadiahId, "nomorUndian":nomorUndian, "_token": "{{ csrf_token() }}"}, 
                    success: function(data) {
                        var request = 'success';
                    },
                    error: function(xhr, status, error){
                        if(xhr.responseText.search("Call to a member function getRealPath() on null")){
                            $(document).ready(function (){
                                console.log($('#form-nomor-kupon-undian input'))
                                $('#form-nomor-kupon-undian input').removeAttr('readonly');
                                $("#search-no-undian").removeAttr("style");
                                $("#tolak-no-undian").css("display", "none");
                                $("#konfirmasi-no-undian").css("display", "none");
                                $('#form-nomor-kupon-undian')[0].reset();
                                $('#no-rekening').text('');
                                $('#nama-nasabah').text('');
                                $("#alamat").text('');
                                swal.fire({title:"Konfirmasi Nomor Undian Tidak Berhasil!", text: xhr.responseJSON.error, icon:"error"});
                            });
                        }else{
                            console.log(xhr)
                        }
                    }
                });
            }                       
        }).then((result) => {
        console.log("sadsa ", result.value)
            if(result.value){
            swal.fire({title:"Nomor Undian Berhasil Dikonfirmasi!", icon:"success"})
            .then(function(){ 
                $('#form-nomor-kupon-undian input').removeAttr('readonly');
                $("#search-no-undian").removeAttr("style");
                $("#tolak-no-undian").css("display", "none");
                $("#konfirmasi-no-undian").css("display", "none");
                $('#form-nomor-kupon-undian')[0].reset();
                $('#no-rekening').text('');
                $('#nama-nasabah').text('');
                $("#alamat").text('');
                getDataHadiah();
            });
            }
        })
    }


</script>

@endsection