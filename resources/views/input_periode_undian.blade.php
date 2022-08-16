@extends('layouts.app')

@section('title', 'Input Periode Undian')

@section('plugin_css')
<!-- Plugins css start-->
<link rel="stylesheet" type="text/css" href="{{url('/assets/css/date-picker.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('/assets/css/sweetalert2.css')}}">
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
                                    <h3>Input Periode Undian</h3>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Home</a></li>
                                        <li class="breadcrumb-item active">Input Periode Undian</li>
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
                                    <div class="card">
                                        <!-- <div class="card-header pb-0">
                                            <h5>Form Wizard with icon</h5>
                                        </div> -->
                                        <div class="card-body">
                                            <form class="f1" id="data-undian" action="" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="f1-steps">
                                                <div class="f1-progress">
                                                    <div class="f1-progress-line" data-now-value="1" data-number-of-steps="2"></div>
                                                </div>
                                                <div class="f1-step active">
                                                    <div class="f1-step-icon"><i class="icofont icofont-tasks-alt"></i></div>
                                                    <p>Periode Undian</p>
                                                </div>
                                                <div class="f1-step">
                                                    <div class="f1-step-icon"><i class="icofont icofont-files"></i></div>
                                                    <p>Input File Excel</p>
                                                </div>
                                            </div>
                                            <fieldset style="display: block;">
                                                <div id="nama-periode-div" class="form-group">
                                                    <label for="nama-periode">Nama Periode</label>
                                                    <input class="form-control" id="nama-periode" type="text" name="nama_periode" placeholder="Periode ...." required="">
                                                </div>
                                                <div class="f1-buttons">
                                                    <button class="btn btn-primary btn-next" type="button">Next</button>
                                                </div>
                                            </fieldset>
                                                <fieldset>
                                                    <div id="excel-file-div" class="form-group">
                                                        <label for="f1-email">Data Nasabah</label>
                                                        <input type="file" class="form-control" name="excelFile" id="excel-file" aria-label="file" accept=".xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required="">
                                                    </div>
                                                    <div class="row g-2 mb-2 form-hadiah">
                                                        <div class="col-md-6 hadiah-name-div">
                                                            <label class="form-label" for="">Hadiah 1</label>
                                                            <input class="form-control hadiah" type="text" name="hadiah[]" placeholder="..." required="">                                                        
                                                        </div>
                                                        <div class="col-md-6 hadiah-qty-div">
                                                            <label class="form-label">Qty Hadiah 1</label>
                                                            <input class="form-control qty-hadiah" name="qty_hadiah[]" type="number" value="" placeholder="..." required="">
                                                        </div>
                                                    </div>
                                                    <button type="button" id="btn-add-hadiah" class="btn btn-outline-info btn-sm">Tambah Hadiah</button>
                                                    <div class="f1-buttons">
                                                        <button class="btn btn-primary btn-previous" type="button">Previous</button>
                                                        <button class="btn btn-primary" type="button" onclick="storeDataPeriode()">Submit</button>
                                                    </div>
                                                </fieldset>
                                            </form>
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
<script src="{{url('/assets/js/form-wizard/form-wizard-three.js')}}"></script>
<script src="{{url('/assets/js/form-wizard/jquery.backstretch.min.js')}}"></script>
<script src="{{url('/assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{url('/assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{url('/assets/js/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{url('/assets/js/tooltip-init.js')}}"></script>
<!-- Plugins JS Ends-->

<script>
    $(document).ready(function() {
        $('#nama-periode').on("change", function(){ 
            $("#nama-periode").removeClass("is-invalid");
            $("#error-msg-nama-periode").remove();
            $("#nama-periode").addClass("is-valid");
        });

        $('#excel-file').on("change", function(){ 
            $("#excel-file").removeClass("is-invalid");
            $("#error-msg-excel-file").remove();
            $("#excel-file").addClass("is-valid");
        });

        $('#data-undian').on('change', '.hadiah', function (e) { 
            var getClassTxtDanger = $(this).parent().children().last().attr("class");

            $(this).removeClass("is-invalid");
            if(getClassTxtDanger.substr(0, getClassTxtDanger.indexOf(" ")) === 'text-danger') $(this).parent().children().last().remove();
            $(this).addClass("is-valid");
        });

        $('#data-undian').on('change', '.qty-hadiah', function (e) { 
            var getClassTxtDangerQty1 = $(this).parent().children().last().attr("class");
            var getClassTxtDangerQty2 = $(this).parent().parent().parent().children().last().attr("class");

            console.log(getClassTxtDangerQty2)

            $(this).removeClass("is-invalid");
            if(getClassTxtDangerQty1.substr(0, getClassTxtDangerQty1.indexOf(" ")) === 'text-danger') $(this).parent().children().last().remove();
            if(getClassTxtDangerQty2.substr(0, getClassTxtDangerQty2.indexOf(" ")) === 'text-danger') $(this).parent().parent().parent().children().last().remove();
            $(this).addClass("is-valid");
        });

        $('#btn-add-hadiah').on("click", function(e){
            e.stopPropagation();
            var totalHadiah = $('.hadiah').length+1;
            
            $(this).parent().find('.form-hadiah').last().after('\
            <div class="row g-2 mb-2 form-hadiah">\
                <div class="col-md-6 hadiah-name-div">\
                    <label class="form-label hadiah-name-label" for="">Hadiah '+totalHadiah+'</label>\
                    <input class="form-control hadiah" type="text" name="hadiah[]" placeholder="..." required="">\
                </div>\
                <div class="col-md-6 mt-2 px-0 ps-1 hadiah-qty-div">\
                    <label class="form-label hadiah-qty-label">Qty Hadiah '+totalHadiah+'</label>\
                    <div class="row">\
                        <div class="col-md-11 pe-0">\
                            <input class="form-control qty-hadiah" name="qty_hadiah[]" type="number" value="" placeholder="..." required="">\
                        </div>\
                        <div class="col-md-1">\
                            <button type="button" class="btn btn-outline-danger pull-right delete-row-hadiah" style="width: 37px; padding-top: 5px; padding-left: 0px; padding-right: 0px; padding-bottom: 4px;" data-bs-original-title="" title=""><i class="fa fa-trash" style="font-size:20px;"></i></button>\                    </div>\
                        </div>\
                    </div>\
                </div>\
            </div>\
            ')
        });

        $('#data-undian').on("click", ".delete-row-hadiah", function(e){
            e.stopPropagation();

            var prevElementLength = $(this).parent().parent().parent().parent().prevUntil('.form-group').length;
            var nextElementLength = $(this).parent().parent().parent().parent().nextUntil('button').length;
            var nextElement = $(this).parent().parent().parent().parent().nextUntil('button');

            for(let totalHadiah= 0; totalHadiah< nextElementLength; totalHadiah++){
                var totalHadiahNext = totalHadiah + prevElementLength +1;

                $(nextElement[totalHadiah]).find('.hadiah-name-label').text('Hadiah '+ totalHadiahNext)
                $(nextElement[totalHadiah]).find('.hadiah-qty-label').text('Qty Hadiah '+ totalHadiahNext)
            }

            $(this).parent().parent().parent().parent().remove();
        });
    });

    function storeDataPeriode(){
        swal.fire({
            title: "Tambah Data Undian",
            text: "Tambahkan data undian baru? ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "Proses Data Undian",
            showLoaderOnConfirm: true,
            preConfirm: (login) => {  
                var formData = new FormData($("#data-undian").get(0));
                formData.append('_token', '{{ csrf_token() }}');
                return $.ajax({
                    type: "POST", 
                    url: "{{route('storeDataPeriode')}}",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: formData, 
                    success: function(data) {
                        var request = 'success';
                    },
                    error: function(xhr, status, error){
                        if(xhr.responseText.search("Call to a member function getRealPath() on null")){
                            $(document).ready(function (){
                                // console.log(xhr.responseJSON)
                                swal.fire({title:"Tambah Data Excel Error!", icon:"error"});
                                var errorMsg = $('');

                                $.each(xhr.responseJSON.errors, function (i, field) {
                                    if(i === 'nama_periode'){
                                        $("#error-msg-nama-periode").remove();
                                        $("#nama-periode").addClass("is-invalid");
                                        $('#nama-periode-div').append('<div id="error-msg-nama-periode" class="text-danger">Input nama periode tidak boleh kosong!</div>');
                                    }
                                    if(i === 'excelFile'){
                                        $("#error-msg-excel-file").remove();
                                        $("#excel-file").addClass("is-invalid");
                                        $('#excel-file-div').append('<div id="error-msg-excel-file" class="text-danger">Input file excel tidak boleh kosong!</div>');
                                    }
                                    if(i.substr(0, i.indexOf(".")) === 'hadiah'){
                                        var elementHadiahNameDiv = $('.hadiah-name-div')[i.substr(i.indexOf(".") + 1)];
                                        var indexElementHadiah = Number(i.substr(i.indexOf(".") + 1)) + 1;

                                        $(elementHadiahNameDiv).find(".error-msg-hadiah-name").remove();
                                        $(elementHadiahNameDiv).find('input').addClass("is-invalid");
                                        $(elementHadiahNameDiv).append('<div class="text-danger error-msg-hadiah-name">Input hadiah '+indexElementHadiah+' tidak boleh kosong!</div>');
                                        
                                    }
                                    if(i.substr(0, i.indexOf(".")) === 'qty_hadiah'){
                                        var elementHadiahQtyDiv = $('.hadiah-qty-div')[i.substr(i.indexOf(".") + 1)];
                                        var indexElementQtyHadiah = Number(i.substr(i.indexOf(".") + 1)) + 1;

                                        $(elementHadiahQtyDiv).find(".error-msg-hadiah-qty").remove();
                                        $(elementHadiahQtyDiv).find('input').addClass("is-invalid");
                                        $(elementHadiahQtyDiv).append('<div class="text-danger error-msg-hadiah-qty">Input qty hadiah '+indexElementQtyHadiah+' tidak boleh kosong!</div>');
                                    }
                                });
                            });
                        }else{
                            console.log(xhr)
                        }
                        
                    }
                });
            }                       
        })
        .then((result) => {
        console.log("sadsa ", result)
            if(result.value){
            swal.fire({title:"Data Excel Berhasil Ditambahkan!", icon:"success"})
            .then(function(){ 
                window.location.reload(true);
            });
            }
        })
    }
</script>
@endsection