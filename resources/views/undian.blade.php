@extends('layouts.app')

@section('title', 'Undian')

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
                                                    <label for="nama-periode">Nama Periode</label>
                                                    <input class="form-control" id="nama-periode" type="text" name="nama_periode" placeholder="Periode ...." required="">
                                                </div>
                                                <div class="f1-buttons">
                                                    <button class="btn btn-primary btn-next" type="button">Next</button>
                                                </div>
                                            </fieldset>
                                                <fieldset>
                                                    <div class="form-group">
                                                        <label for="f1-email">Data Nasabah</label>
                                                        <input type="file" class="form-control" name="csvFile" id="csv-file" aria-label="file" accept=".xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required="">
                                                    </div>
                                                    <div class="row g-2 mb-2 form-hadiah">
                                                        <div class="col-md-6">
                                                            <label class="form-label" for="">Hadiah 1</label>
                                                            <input class="form-control hadiah" type="text" name="hadiah[]" placeholder="Hadiah 1..." required="">                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label">Qty Hadiah 1</label>
                                                            <input class="form-control" name="qty_hadiah[]" type="number" value="" placeholder="1..." required="">
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="">Hadiah 1</label>
                                                        <input class="form-control hadiah" type="text" name="hadiah_1" placeholder="Hadiah 1..." required="">
                                                    </div> -->
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
function requestFullScreen(element) {
    // Supports most browsers and their versions.
    var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

    if (requestMethod) { // Native full screen.
        requestMethod.call(element);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

var elem = document.body; // Make the body go full screen.
requestFullScreen(elem);
</script>

@endsection