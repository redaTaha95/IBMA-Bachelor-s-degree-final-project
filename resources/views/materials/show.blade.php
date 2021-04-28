
@extends('layouts.app')

@section('css')

    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Summernote css -->
    <link href="{{asset('assets/libs/summernote/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- start page title -->

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">IBMA</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('material.material_folder') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('material.profile') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('material.material_profile') }} {{$material->material_code}}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-sm-4">
            <div class="card-box text-center">
                <!--<img src="../assets/images/users/user-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">-->

                    <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-lg rounded-circle">

                <h4 class="mb-0">{{$material->material_reference}}</h4><br>
               <!-- <p class="text-muted">@webdesigner</p>-->

                <!--<button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>-->
                <div class="text-left mt-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-muted mb-2 font-13"><strong>{{ __('material.material_reference') }} :</strong> <span class="ml-2" style="color: #0a0a0a">{{$material->material_reference}}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>{{ __('material.designation') }} :</strong><span class="ml-2" style="color: #0a0a0a">{{$material->designation}}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>{{ __('material.category') }} :</strong> <span class="ml-2 " style="color: #0a0a0a">{{$material->category}}</span></p>
                            <!--</div>-->
                    <!--<div class="col-sm-6">-->
                            <p class="text-muted mb-2 font-13"><strong>{{ __('material.quantity') }} :</strong> <span class="ml-2" style="color: #0a0a0a">{{$material->quantity}}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>{{ __('material.origin') }} :</strong> <span class="ml-2" style="color: #0a0a0a">{{$material->origin}}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>{{ __('material.condition') }} :</strong> <span class="ml-2" style="color: #0a0a0a">{{$material->condition}}</span></p>
                        </div>
                    </div>


                </div>


            </div>
        </div>
        <div class="col"></div>

    </div>
    <!-- end profile -->
    <!-- start of project list of this employee -->

    <!-- end of list projects -->


@endsection

@section('js')
    <!--Summernote js-->
    <script src="{{asset('assets/libs/summernote/summernote-bs4.min.js')}}"></script>

    <script>
        jQuery(document).ready(function(){
            $('.summernote').summernote({
                height: 230,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                 // set focus to editable area after initializing summernote
            });
        });
    </script>
@endsection
