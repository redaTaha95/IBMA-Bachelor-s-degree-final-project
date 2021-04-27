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
                            <li class="breadcrumb-item active">{{__('recruitment_demand.demand_details')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('recruitment_demand.demand_details')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
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
                        <form action="{{route('recruitment_demands.show', $recruitmentDemand->id)}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <div class="card-box text-center">

                                    <div class="text-left mt-3">
                                        <p class="text-muted mb-2 font-13"><strong>{{__('recruitment_demand.post_name')}} :</strong>
                                            <span class="ml-1">{{$recruitmentDemand->post_name}}</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('recruitment_demand.number_of_profiles')}} :</strong>
                                            <span class="ml-1">{{$recruitmentDemand->number_of_profiles}}</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('recruitment_demand.date_of_demand')}} :</strong>
                                            <span class="ml-1 ">{{$recruitmentDemand->date_of_demand}}</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('recruitment_demand.status_of_demand')}} :</strong>
                                            <span class="ml-1">{{$recruitmentDemand->status_of_demand}}</span>
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
