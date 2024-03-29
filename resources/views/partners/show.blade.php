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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('partner.title12') }}</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('partner.title13') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('partner.title14') }}</li>
                            </ol>
                        </div>
                        <h4 class="page-title">{{ __('partner.Details_Partners') }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-lg-8">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label for="inputPassword2" class="sr-only">{{ __('partner.search') }}</label>
                                        <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                    </div>
                                    <div class="form-group mx-sm-3">
                                        <label for="status-select" class="mr-2">{{ __('partner.sort') }}</label>
                                        <select class="custom-select" id="status-select">
                                            <option hidden>{{ __('partner.select') }}</option>
                                            <option>{{ __('partner.name') }}</option>
                                            <option selected="">{{ __('partner.City') }}</option>
                                            <option>{{ __('partner.Description') }}</option>
                                            <option>{{ __('partner.Inc') }}</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <div class="text-lg-right mt-3 mt-lg-0">
                                    <button type="button" class="btn btn-success waves-effect waves-light mr-1"><i class="mdi mdi-cog"></i></button>
                                    <button type="button" class="btn btn-danger waves-effect waves-light mr-1"><i class="mdi mdi-plus-circle mr-1"></i>{{ __('partner.add_new') }}</button>
                                </div>
                            </div><!-- end col-->
                        </div> <!-- end row -->
                    </div> <!-- end card-box -->
                </div><!-- end col-->
            </div>


            <div class="row">
                <div class="col-lg-5">
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
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">{{ __('partner.more') }}</a>
                        </div>

                        <div class="row mt-4 text-center">
                            <div class="col-6">
                                <h5 class="font-weight-normal text-muted">{{ __('partner.Income') }}</h5>
                                <h4>{{$partners->income}}</h4>
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
