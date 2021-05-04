@extends('layouts.app')

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('partner.title8') }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('partner.title9') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('partner.title10') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('partner.introduction3') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('partner.title11') }}</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <br>
                        <form action="{{route('partners.update', $partners->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.Ednom') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Nom" value="{{old('name', $partners->name)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.Edcity') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="city" placeholder="Ville" value="{{old('city', $partners->city)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.Eddesc') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="description" placeholder="Description" value="{{old('description', $partners->description)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.Edinc') }}</label>
                                        <input type="number" id="simpleinput" class="form-control" name="income" placeholder="Revenu" value="{{old('income', $partners->income)}}">
                                    </div>

                                  <!--  <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.Ednbemp') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="NumberOfEmployees" placeholder="Nombre des employés" value="{{old('NumberOfEmployees', $partners->NumberOfEmployees)}}">
                                    </div>-->

                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.Edlogo') }}</label>
                                        <input type="file" data-plugins="dropify" name="logo" data-default-file="{{asset('storage/partners/'.$partners->logo)}}"/>
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{ __('partner.btnModif') }}</button>
                                <a href="{{url('partners')}}" class="btn btn-white btn-rounded waves-effect">{{ __('partner.btnannul') }}</a>
                            </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    </div>

@endsection

@section('js')
    <!-- Plugins js -->
    <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
@endsection
