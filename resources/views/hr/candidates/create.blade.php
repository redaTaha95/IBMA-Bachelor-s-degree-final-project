@extends('layouts.app')

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
                            <li class="breadcrumb-item active">{{__('candidate.add_candidate')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('candidate.add_candidate')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">

                        <h4 class="header-title mb-3">{{__('candidate.general_information')}}</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('candidates.store')}}" id="formId" method="post" enctype="multipart/form-data">
                            @csrf

                        <div id="btnwizard">
                            <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">
                                <li class="nav-item">
                                    <a href="#tab12" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2 active">
                                        <i class="mdi mdi-account-circle mr-1"></i>
                                        <span class="d-none d-sm-inline" >{{__('candidate.candidate')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab22" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-face-profile mr-1"></i>
                                        <span class="d-none d-sm-inline">{{__('candidate.experience')}}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab32" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                        <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                        <span class="d-none d-sm-inline">{{__('candidate.training')}}</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content mb-0 b-0 pt-0">

                                <div class="tab-pane fade active show" id="tab12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.last_name')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="simpleinput" class="form-control" name="last_name" placeholder="{{__('candidate.last_name')}}" value="{{old('last_name')}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.first_name')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="simpleinput" class="form-control" name="first_name" placeholder="{{__('candidate.first_name')}}" value="{{old('first_name')}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.phone')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" data-toggle="input-mask" name="phone" placeholder="{{ __('candidate.example') }} : 0630-303030" data-mask-format="0000-000000" maxlength="14" value="{{old('phone')}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.address')}}</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="simpleinput" class="form-control" name="address" placeholder="{{__('candidate.address')}}" value="{{old('address')}}">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.status')}} *</label>
                                                <div class="col-md-9">
                                                    <select id="select-status" class="form-control" name="status" required>
                                                        <option value="select-status" disabled selected>Sélectionner un statut</option>
                                                        <option value="En attente" {{old('status') == 'En attente' ? 'selected' : ''}}>En attente</option>
                                                        <option value="En cours" {{old('status') == 'En cours' ? 'selected' : ''}}>En cours</option>
                                                        <option value="Embauché" {{old('status') == 'Embauché' ? 'selected' : ''}}>Embauché</option>
                                                        <option value="Non Embauché" {{old('status') == 'Non Embauché' ? 'selected' : ''}}>Non Embauché</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.cin')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="simpleinput" class="form-control" name="cin" placeholder="{{__('candidate.cin')}}" maxlength="8" value="{{old('cin')}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.birthday')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="date" id="birthday" class="form-control" name="birthday" placeholder="{{__('candidate.birthday')}}" value="{{old('birthday')}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.email')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="email" id="email" class="form-control" name="email" placeholder="e.g : ABC@gmail.com"  data-parsley-trigger="change" required="" data-parsley-id="7" value="{{old('email')}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.city')}}</label>
                                                <div class="col-md-9">
                                                    <select id="select-city" class="form-control" name="city">
                                                        <option value="select-city" disabled selected>Sélectionner une ville</option>
                                                        <option value="Casablanca" {{old('city') == 'Casablanca' ? 'selected' : ''}}>Casablanca</option>
                                                        <option value="Fès" {{old('city') == 'Fès' ? 'selected' : ''}}>Fès</option>
                                                        <option value="Tanger" {{old('city') == 'Tanger' ? 'selected' : ''}}>Tanger</option>
                                                        <option value="Marrakech" {{old('city') == 'Marrakech' ? 'selected' : ''}}>Marrakech</option>
                                                        <option value="Salé" {{old('city') == 'Salé' ? 'selected' : ''}}>Salé</option>
                                                        <option value="Meknès" {{old('city') == 'Meknès' ? 'selected' : ''}}>Meknès</option>
                                                        <option value="Rabat" {{old('city') == 'Rabat' ? 'selected' : ''}}>Rabat</option>
                                                        <option value="Oujda" {{old('city') == 'Oujda' ? 'selected' : ''}}>Oujda</option>
                                                        <option value="Kénitra" {{old('city') == 'Kénitra' ? 'selected' : ''}}>Kénitra</option>
                                                        <option value="Agadir" {{old('city') == 'Agadir' ? 'selected' : ''}}>Agadir</option>
                                                        <option value="Tétouan" {{old('city') == 'Tétouan' ? 'selected' : ''}}>Tétouan</option>
                                                        <option value="Safi" {{old('city') == 'Safi' ? 'selected' : ''}}>Safi</option>
                                                        <option value="Mohammédia" {{old('city') == 'Mohammédia' ? 'selected' : ''}}>Mohammédia</option>
                                                        <option value="Khouribga" {{old('city') == 'Khouribga' ? 'selected' : ''}}>Khouribga</option>
                                                        <option value="El Jadida" {{old('city') == 'El Jadida' ? 'selected' : ''}}>El Jadida</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div>

                                <div class="tab-pane fade" id="tab22">
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.description')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="simpleinput" class="form-control" name="description" placeholder="{{__('candidate.description')}}" value="{{old('description')}}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.post_work')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="simpleinput" class="form-control" name="post" placeholder="{{__('candidate.post_work')}}" value="{{old('post')}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.years')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="date" id="simpleinput" class="form-control" name="year" placeholder="{{__('candidate.years')}}" value="{{old('year')}}" required>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div>

                                <div class="tab-pane" id="tab32">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.description')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="simpleinput" class="form-control" name="description_training" placeholder="{{__('candidate.description')}}" value="{{old('description_training')}}" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-md-3 col-form-label" for="simpleinput">{{__('candidate.years')}} *</label>
                                                <div class="col-md-9">
                                                    <input type="date" id="simpleinput" class="form-control" name="graduation_year" placeholder="{{__('candidate.years')}}" value="{{old('graduation_year')}}" required>
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div>

                                <div class="float-right">
                                    <input type="button" class="btn btn-secondary button-next" id ="nextBtn" name="next" value="{{__('candidate.next')}}">
                                  <!--  <input type="button" class="btn btn-secondary button-last" name="last" value="Last">-->
                                </div>
                                <div class="float-left">
                                    <!--input type="button" class="btn btn-secondary button-first" name="first" value="First">-->
                                    <input type="button" class="btn btn-secondary button-previous disabled" id ="prevBtn" name="previous" value="{{__('candidate.previous')}}">
                                </div>

                                <div class="clearfix"></div>

                            </div> <!-- tab-content -->
                            <br>
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{__('candidate.add')}}</button>
                                <a href="{{url('candidates')}}" class="btn btn-white btn-rounded waves-effect">{{__('candidate.cancel')}}</a>
                            </div>
                        </div> <!-- end #btnwizard-->

                        </form>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div>

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

    <script src="{{asset('assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-wizard.init.js')}}"></script>





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
            $("#birthday").attr("value", today);
        });

    </script>

    <script>
        this.default = function () {
            var prevButton = new ej.buttons.Button({
                isPrimary: true
            });
            prevButton.appendTo('#prevBtn');

            var nextButton = new ej.buttons.Button({
                isPrimary: true
            });
            nextButton.appendTo('#nextBtn');


            var nextBtn = document.getElementById("nextBtn");
            nextBtn.addEventListener("click", function () {
                tabNav(1);
            });

            var prevBtn = document.getElementById("prevBtn");
            prevBtn.addEventListener("click", function () {
                tabNav(-1);
            });


            var options = {
                customPlacement: function (inputElement, errorElement) {
                    inputElement.parentElement.appendChild(errorElement);
                }
            };

            var formObj = new ej.inputs.FormValidator("#formId", options);

            var currentTab = 0;
            displayTab(currentTab);

            function displayTab(n) {
                var x = document.getElementsByClassName("tab-pane");
                if (n === 3) {
                    n = 0;
                    currentTab = 0;
                }
                x[n].style.display = "block";
                if (n === 0) {
                    document.getElementById("prevBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }
                if (n == (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit";
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                }

            }

            function tabNav(n) {
                var x = document.getElementsByClassName("tab-pane");
                if (n == 1 && !validateForm()) return false;
                x[currentTab].style.display = "none";
                currentTab = currentTab + n;
                if (currentTab >= x.length) {
                    if (formObj.validate()) {
                        displayTab(0);
                        alert('Account has been created.');
                        formObj.reset();
                    }
                }
                displayTab(currentTab);
            }

            function validateForm() {
                var x, y, i, valid = true;
                x = document.getElementsByClassName("tab-pane");
                y = x[currentTab].getElementsByTagName("input");
                for (i = 0; i < y.length; i++) {
                    formObj.validate(y[i].getAttribute("name"));
                    if (y[i].getAttribute("aria-invalid") === 'true') {
                        valid = false;
                    }
                }
                return valid;
            }
        };

    </script>

   <!--<script>
        $(document).ready(function () {
            "use strict";
                $("#btnwizard").bootstrapWizard({
                    nextSelector: ".button-next",
                    previousSelector: ".button-previous"
                })


        });

    </script>-->



@endsection
