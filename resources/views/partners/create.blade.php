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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('partner.title4') }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('partner.title5') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('partner.title6') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('partner.introduction2') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('partner.title7') }}</h4>

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
                        <form action="{{route('partners.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.add_name') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Nom" value="{{old('name')}}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.add_city') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="city" placeholder="Ville" value="{{old('city')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.add_description') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="description" placeholder="Description" value="{{old('description')}}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.add_income') }}</label>
                                        <input type="number" id="simpleinput" class="form-control" name="income" placeholder="revenu" value="{{old('income')}} ">
                                    </div>



                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('partner.add_logo') }}</label>
                                        <input type="file" data-plugins="dropify" name="logo"/>
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{ __('partner.button_add') }}</button>
                                <a href="{{url('partners')}}" class="btn btn-white btn-rounded waves-effect">{{ __('partner.button_cancel') }}</a>
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
