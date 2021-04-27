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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Candidats</a></li>
                            <li class="breadcrumb-item active">{{__('candidate.profile')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('candidate.profile')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0">{{__('candidate.general_information')}}</h4>
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
                        <form action="{{route('candidates.show', $candidate->id)}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12 col-xl-12">
                                <div class="card-box text-center">

                                    <div class="text-left mt-3">
                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.last_name')}} Complet :</strong>
                                            <span class="ml-1">{{$candidate->first_name.' '.$candidate->last_name}}</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.cin')}} :</strong>
                                            <span class="ml-1">{{$candidate->cin}}</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.birthday')}} :</strong>
                                            <span class="ml-1 ">{{$candidate->birthday}}</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('candidate.phone')}} :</strong>
                                            <span class="ml-1">{{$candidate->phone}}</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('candidate.email')}} :</strong>
                                            <span class="ml-0">{{$candidate->email}}</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('candidate.address')}} :</strong>
                                            <span class="ml-1">{{$candidate->address}}</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('candidate.city')}} :</strong>
                                            <span class="ml-1">{{$candidate->city}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0">{{__('candidate.professional_experiences')}}</h4>
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
                        <form action="{{route('candidates.show', $candidate->id)}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12 col-xl-12">
                                <div class="card-box text-center">

                                    <div class="text-left mt-3">
                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.company_name')}} :</strong>
                                            <span class="ml-1">INVOLYS</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.post')}} :</strong>
                                            <span class="ml-1">Développeuse .NET</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.start_date')}} :</strong>
                                            <span class="ml-1">2020-11-16</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('candidate.end_date')}} :</strong>
                                            <span class="ml-1">2021-04-02</span>
                                        </p>
                                        <hr>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.company_name')}} :</strong>
                                            <span class="ml-1">SOFRECOM</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.post')}} :</strong>
                                            <span class="ml-1">Stage PFE</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.start_date')}} :</strong>
                                            <span class="ml-1 ">2020-01-20</span>
                                        </p>

                                        <p class="text-muted mb-1 font-13"><strong>{{__('candidate.end_date')}} :</strong>
                                            <span class="ml-1">2020-03-20</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-0">{{__('candidate.formations')}}</h4>
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
                        <form action="{{route('candidates.show', $candidate->id)}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-12 col-xl-12">
                                <div class="card-box text-center">
                                    <div class="text-left mt-3">
                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.year')}} :</strong>
                                            <span class="ml-1">2021</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.school')}} :</strong>
                                            <span class="ml-1">IT Learning</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.diploma')}} :</strong>
                                            <span class="ml-1">LICDA</span>
                                        </p>
                                        <hr>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.year')}} :</strong>
                                            <span class="ml-1">2020</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.school')}} :</strong>
                                            <span class="ml-1">ISGI</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.diploma')}} :</strong>
                                            <span class="ml-1">DTS en développement informatique</span>
                                        </p>
                                        <hr>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.year')}} :</strong>
                                            <span class="ml-1">2018</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.school')}} :</strong>
                                            <span class="ml-1">GSB</span>
                                        </p>

                                        <p class="text-muted mb-2 font-13"><strong>{{__('candidate.diploma')}} :</strong>
                                            <span class="ml-1">Bac PC</span>
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

@endsection

