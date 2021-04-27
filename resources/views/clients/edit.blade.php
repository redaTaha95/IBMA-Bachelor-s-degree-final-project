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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
                            <li class="breadcrumb-item active">{{__('client.edit_client')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('client.edit_client')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('client.general_information')}}</h4>

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
                        <form action="{{route('clients.update', $client->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('client.name')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="{{__('client.name')}}" value="{{old('name', $client->name)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('client.phone')}} *</label>
                                        <input type="tel" id="simpleinput" class="form-control" data-toggle="input-mask" name="phone" placeholder="{{ __('client.example') }} : 0630-303030" data-mask-format="0000-000000" maxlength="14" value="{{old('phone', $client->phone)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Email *</label>
                                        <input type="email" id="simpleinput" class="form-control" name="email" placeholder="Email" value="{{old('email', $client->email)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('client.country')}}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="country" placeholder="{{__('client.country')}}" value="{{old('country', $client->country)}}">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('client.address')}}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="address" placeholder="{{__('client.address')}}" value="{{old('address', $client->address)}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Logo</label>
                                        <input type="file" data-plugins="dropify" name="logo" data-default-file="{{$client->logo ? asset('storage/clients/'.$client->logo) : ''}}"/>
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{__('client.edit')}}</button>
                                <a href="{{url('clients')}}" class="btn btn-white btn-rounded waves-effect">{{__('client.cancel')}}</a>
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
