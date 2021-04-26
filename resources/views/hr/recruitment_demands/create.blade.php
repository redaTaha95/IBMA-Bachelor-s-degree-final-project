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
                            <li class="breadcrumb-item active">{{__('recruitment_demand.add_recruitment_demand')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('recruitment_demand.add_recruitment_demand')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('recruitment_demand.general_information')}}</h4>

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
                        <form action="{{route('recruitment_demands.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('recruitment_demand.post_name')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="post_name" placeholder="{{__('recruitment_demand.post_name')}}" value="{{old('post_name')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('recruitment_demand.number_of_profiles')}} *</label>
                                        <input type="number" class="form-control" data-toggle="input-mask" name="number_of_profiles" placeholder="{{__('recruitment_demand.number_of_profiles')}}" data-mask-format="00" maxlength="2" value="{{old('number_of_profiles')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('recruitment_demand.number_of_years_of_experience')}} *</label>
                                        <input type="number" class="form-control" data-toggle="input-mask" name="number_of_years_of_experience" placeholder="{{__('recruitment_demand.number_of_years_of_experience')}}" data-mask-format="00" maxlength="2" value="{{old('number_of_years_of_experience')}}">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('recruitment_demand.date_of_demand')}} *</label>
                                        <input type="date" id="date_of_demand" class="form-control" name="date_of_demand" placeholder="{{__('recruitment_demand.date_of_demand')}}" value="{{old('date_of_demand')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('recruitment_demand.status_of_demand')}} *</label>
                                        <select id="select-status_of_demand" class="form-control" name="status_of_demand">
                                            <option value="Actif">Actif</option>
                                            <option value="En cours">En cours</option>
                                            <option value="Rejeté">Rejeté</option>
                                            <option value="Fermé">Fermé</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('recruitment_demand.level_of_studies')}} *</label>
                                        <select id="select-level_of_studies" class="form-control" name="level_of_studies">
                                            <option value="NiveauBac">Niveau Bac</option>
                                            <option value="Bac">Bac</option>
                                            <option value="Bac + 2">Bac + 2</option>
                                            <option value="Bac + 3">Bac + 3</option>
                                            <option value="Bac + 4">Bac + 4</option>
                                            <option value="Bac + 5">Bac + 5</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{__('recruitment_demand.add')}}</button>
                                <a href="{{url('recruitment_demands')}}" class="btn btn-white btn-rounded waves-effect">{{__('recruitment_demand.cancel')}}</a>
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


    <script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('assets/libs/autonumeric/autoNumeric-min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>

    <script>

        $(document).ready(function()
        {
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            if (month < 10)
                month = "0" + month;
            if (day < 10)
                day = "0" + day;
            var today = year + "-" + month + "-" + day;
            $("#date_of_demand").attr("value", today);
        });

    </script>
@endsection
