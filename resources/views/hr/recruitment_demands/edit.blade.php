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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Demande de recrutement</a></li>
                            <li class="breadcrumb-item active">Modifier une demande de recrutement</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Modifier une demande de recrutement</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Informations générales</h4>

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
                        <form action="{{route('recruitment_demands.update', $recruitmentDemand->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Poste *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="post_name" placeholder="Poste" value="{{old('post_name', $recruitmentDemand->post_name)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Nombre de profil *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="number_of_profiles" placeholder="Nombre de profil" value="{{old('number_of_profiles', $recruitmentDemand->number_of_profiles)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Nombre d'années d'expérience *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="number_of_years_of_experience" placeholder="Nombre d'années d'expérience" value="{{old('number_of_years_of_experience', $recruitmentDemand->number_of_years_of_experience)}}">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Date de la demande *</label>
                                        <input type="date" id="simpleinput" class="form-control" name="date_of_demand" placeholder="Date de la demande" value="{{old('date_of_demand', $recruitmentDemand->date_of_demand)}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Statut de la demande *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="status_of_demand" placeholder="Statut de la demande" value="{{old('status_of_demand', $recruitmentDemand->status_of_demand)}}">
                                    </div>
                                </div>
                                    <!-- end col -->
                            </div>
                            <!-- end row-->
                                <div class="row">
                                    <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">Modifier</button>
                                    <a href="{{url('recruitment_demands')}}" class="btn btn-white btn-rounded waves-effect">Annuler</a>
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
