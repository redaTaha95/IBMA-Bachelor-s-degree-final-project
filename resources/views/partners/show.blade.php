@extends('layouts.app')


@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('tradpartner.titre12') }}</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('tradpartner.titre13') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('tradpartner.titre14') }}</li>
                            </ol>
                        </div>
                        <h4 class="page-title">{{ __('tradpartner.DetPart') }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->




            <div class="row">
                <div class="col-lg-8">
                    <div class="card-box bg-pattern">
                        <div class="text-center">
                            <img src="../assets/images/companies/amazon.png" alt="logo" class="avatar-xl rounded-circle mb-3">
                            <h4 class="mb-1 font-30"> {{$partners->name}}</h4>
                            <p class="text-muted  font-14"> {{$partners->city}}</p>
                        </div>

                        <p class="font-14 text-center text-muted">
                            {{$partners->description}}
                        </p>

                        <div class="text-center">
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">{{ __('tradpartner.more') }}</a>
                        </div>

                        <div class="row mt-4 text-center">
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">{{ __('tradpartner.rev') }}</h5>
                                <h4>{{$partners->income}}</h4>
                            </div>
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">{{ __('tradpartner.nbE') }}</h5>
                                <h4>{{$partners->NumberOfEmployees}}</h4>
                            </div>
                        </div>
                    </div> <!-- end card-box -->
                </div><!-- end col -->





        </div> <!-- container -->

    </div>

@endsection


@section('js')
    <!-- Plugins js -->
    <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
@endsection
