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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">IBMA</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('material.material_folder') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('material.addMaterial') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('material.addMaterial') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('material.information') }}</h4>

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
                        <form action="{{route('materials.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('material.material_reference') }} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="reference" placeholder="{{ __('material.material_reference') }}" value="{{old('reference')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="simpleinput">{{ __('material.designation') }} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="designation" placeholder="{{ __('material.designation') }}" value="{{old('designation')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">{{ __('material.category') }} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="category" placeholder="{{ __('material.category') }}" value="{{old('category')}}">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('material.quantity') }} *</label>
                                        <input type="number" id="simpleinput" class="form-control" name="quantity" placeholder="{{ __('material.quantity') }}" value="{{old('quantity')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('material.origin') }} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="origin" placeholder="{{ __('material.origin') }}" value="{{old('origin')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('material.condition') }}</label>
                                        <input class="form-control" type="text" id="example-date-input" name="condition" placeholder="{{ __('material.condition') }}" value="{{old('condition')}}">
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{ __('material.add') }}</button>
                                <a href="{{url('materials')}}" class="btn btn-white btn-rounded waves-effect">{{ __('material.cancel') }}</a>
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

    <!-- Plugins js -->
    <script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('assets/libs/autonumeric/autoNumeric-min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>


@endsection
