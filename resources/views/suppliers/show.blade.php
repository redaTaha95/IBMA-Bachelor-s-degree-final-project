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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Demandes de recrutement</a></li>
                            <li class="breadcrumb-item active">{{__('supplier.profile')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('supplier.profile')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0">{{__('supplier.general_information')}}</h4>
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
                        <form action="{{route('suppliers.show', $supplier->id)}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <div class="card-box text-center">

                                    <div class="text-left mt-3">
                                        <p class="text-muted mb-2 font-13"><strong>{{__('supplier.full_name')}} :</strong>
                                            <span class="ml-1">{{$supplier->full_name}}</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('supplier.cin')}} :</strong>
                                            <span class="ml-1">{{$supplier->cin}}</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('supplier.postal_code')}} :</strong>
                                            <span class="ml-1 ">{{$supplier->postal_code}}</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('supplier.phone')}} :</strong>
                                            <span class="ml-1">{{$supplier->phone}}</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('supplier.email')}} :</strong>
                                            <span class="ml-1">{{$supplier->email}}</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('supplier.address')}} :</strong>
                                            <span class="ml-1">{{$supplier->address}}</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('supplier.city')}} :</strong>
                                            <span class="ml-1">{{$supplier->city}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->

        </div>
    </div>
    </div>

@endsection
