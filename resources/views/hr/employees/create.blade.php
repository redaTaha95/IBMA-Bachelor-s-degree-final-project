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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Employés</a></li>
                            <li class="breadcrumb-item active">Ajouter un employé</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Ajouter un employé</h4>
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
                        <form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Nom *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Nom" value="{{old('name')}}">
                                    </div>

                                    <!--<div class="form-group mb-3">
                                        <label for="simpleinput">Téléphone *</label>
                                        <input type="tel" id="simpleinput" class="form-control" name="phone" placeholder="Téléphone" value="{{old('phone')}}">
                                    </div>-->
                                    <div class="form-group">
                                        <label for="simpleinput">Téléphone *</label>
                                        <input type="text" class="form-control" data-toggle="input-mask" name="phone" placeholder="Exemple : 0630-303030" data-mask-format="0000-000000" maxlength="14" value="{{old('phone')}}">
                                        <!--<span class="font-13 text-muted">e.g "(xx) xxxx-xxxx"</span>-->
                                    </div>

                                    <!--<div class="form-group mb-3">
                                        <label for="simpleinput">Email *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                                        <ul class="parsley-errors-list" id="parsley-id-7" aria-hidden="true"></ul>
                                    </div>-->
                                    <div class="form-group">
                                        <label for="email">Email *</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="Exemple : ABC@gmail.com"  data-parsley-trigger="change" required="" data-parsley-id="7" value="{{old('email')}}">
                                        <ul class="parsley-errors-list" id="parsley-id-7" aria-hidden="true"></ul>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Salaire</label>
                                        <input type="text" id="simpleinput" class="form-control" name="salary" placeholder="Salaire" value="{{old('salary')}}">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Adresse</label>
                                        <input type="text" id="simpleinput" class="form-control" name="address" placeholder="Address" value="{{old('address')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Date d'embauche *</label>
                                        <input class="form-control" type="date" id="example-date-input" name="hire_date" value="{{old('hire_date')}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Logo</label>
                                        <input type="file" data-plugins="dropify" name="logo"/>
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">Ajouter</button>
                                <a href="{{url('employees')}}" class="btn btn-white btn-rounded waves-effect">Annuler</a>
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
    <script src="../assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
    <script src="../assets/libs/autonumeric/autoNumeric-min.js"></script>

    <!-- Init js-->
    <script src="../assets/js/pages/form-masks.init.js"></script>

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
          $("#example-date-input").attr("value", today);
        });

    </script>

@endsection
