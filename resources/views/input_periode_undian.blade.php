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
                                                    <p>Input File CSV</p>
                                                </div>
                                            </div>
                                            <fieldset style="display: block;">
                                                <div class="form-group">
                                                    <label for="f1-first-name">Nama Periode</label>
                                                    <input class="form-control" id="f1-first-name" type="text" name="f1-first-name" placeholder="Periode ...." required="">
                                                </div>
                                                <div class="f1-buttons">
                                                    <button class="btn btn-primary btn-next" type="button">Next</button>
                                                </div>
                                            </fieldset>
                                            
                                            <fieldset>
                                                <!-- <form id="data-undian" action="" enctype="multipart/form-data" method="post"> -->
                                                    <div class="form-group">
                                                        <label for="f1-email">Data Nasabah</label>
                                                        <input type="file" class="form-control" name="csvFile" id="csv-file" aria-label="file" accept=".xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="f1-first-name">Hadiah 1</label>
                                                        <input class="form-control" id="f1-first-name" type="text" name="f1-first-name" placeholder="Hadiah..." required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="f1-first-name">Hadiah 2</label>
                                                        <input class="form-control" id="f1-first-name" type="text" name="f1-first-name" placeholder="Hadiah..." required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="f1-first-name">Hadiah 3</label>
                                                        <input class="form-control" id="f1-first-name" type="text" name="f1-first-name" placeholder="Hadiah..." required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="f1-first-name">Hadiah 4</label>
                                                        <input class="form-control" id="f1-first-name" type="text" name="f1-first-name" placeholder="Hadiah..." required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="f1-first-name">Hadiah 5</label>
                                                        <input class="form-control" id="f1-first-name" type="text" name="f1-first-name" placeholder="Hadiah..." required="">
                                                    </div>
                                                    <div class="f1-buttons">
                                                        <button class="btn btn-primary btn-previous" type="button">Previous</button>
                                                        <button class="btn btn-primary" type="button" onclick="storeDataUndian()">Submit</button>
                                                    </div>
                                                    <!-- </form> -->
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
    function storeDataUndian(){
        // console.log($('#ticket-id').val())
        swal.fire({
            title: "Tambah Data Undian",
            text: "Tambahkan data undian baru? ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "Proses Data Undian",
            showLoaderOnConfirm: true,
            preConfirm: (login) => {  
                // var form = $("#data-undian").get(0)
                var formData = new FormData($("#data-undian").get(0));
                formData.append('_token', '{{ csrf_token() }}');
                return $.ajax({
                    type: "POST", 
                    url: "{{route('storeDataUndian')}}",
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
                                console.log(xhr.responseJSON)
                                swal.fire({title:"Add Data CSV Error!", text: "File Not Found!", icon:"error"});
                                var errorMsg = $('');

                                $.each(xhr.responseJSON.errors, function (i, field) {
                                    if(i == "job_analyst"){
                                        $("#job-analyst").addClass("is-invalid");
                                        $('#job-analyst-div').append('<div id="error-msg-job-analyst" class="text-danger">The job analyst field is required.</div>');
                                    }else if(i == "csvFile"){
                                        $("#csv-file").addClass("is-invalid");
                                        $('#csv-file-div').append('<div id="error-msg-csv-file" class="text-danger">Please select the file first.</div>');
                                    }else if(i == "video_simulation"){
                                        $("#video-simulation").addClass("is-invalid");
                                        $('#video-simulation-div').append('<div id="error-msg-video-simulation" class="text-danger">Please select the video file first.</div>');
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
            swal.fire({title:"New CSV Data Added", text:"Successfuly add new CSV data!", icon:"success"})
            .then(function(){ 
                window.location.reload(true);
            });
            }
        })
    }
</script>
@endsection