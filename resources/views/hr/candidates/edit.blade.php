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
                            <li class="breadcrumb-item active">{{__('candidate.edit_candidate')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('candidate.edit_candidate')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('candidate.general_information')}}</h4>

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
                        <form action="{{route('candidates.update', $candidate->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.last_name')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="last_name" placeholder="{{__('candidate.last_name')}}" value="{{old('lastName', $candidate->last_name)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.cin')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="cin" placeholder="{{__('candidate.cin')}}" value="{{old('cin', $candidate->cin)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.phone')}} *</label>
                                        <input type="tel" id="simpleinput" class="form-control" name="phone" placeholder="{{__('candidate.phone')}}" value="{{old('phone', $candidate->phone)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.address')}}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="address" placeholder="{{__('candidate.address')}}" value="{{old('address',$candidate->address)}}">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.first_name')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="{{__('candidate.first_name')}}" placeholder="Prénom" value="{{old('firstName', $candidate->first_name)}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.birthday')}}</label>
                                        <input type="date" id="simpleinput" class="form-control" name="birthday" placeholder="{{__('candidate.birthday')}}" value="{{old('birthday', $candidate->birthday)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.email')}} *</label>
                                        <input type="email" id="simpleinput" class="form-control" name="email" placeholder="{{__('candidate.email')}}" value="{{old('email', $candidate->email)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.city')}}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="city" placeholder="{{__('candidate.city')}}" value="{{old('city', $candidate->city)}}">
                                    </div>
                                </div>
                                    <!-- end col -->
                            </div>
                            <!-- end row-->
                                <div class="row">
                                    <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{__('candidate.edit')}}</button>
                                    <a href="{{url('candidates')}}" class="btn btn-white btn-rounded waves-effect">{{__('candidate.cancel')}}</a>
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
