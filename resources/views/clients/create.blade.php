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
                            <li class="breadcrumb-item active">Ajouter un client</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Ajouter un client</h4>
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
                    <form action="{{route('clients.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Nom *</label>
                                    <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Nom" value="{{old('name')}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Téléphone</label>
                                    <input type="tel" id="simpleinput" class="form-control" name="phone" placeholder="Téléphone" value="{{old('phone')}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Email</label>
                                    <input type="email" id="simpleinput" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Pays</label>
                                    <input type="text" id="simpleinput" class="form-control" name="country" placeholder="Pays" value="{{old('country')}}">
                                </div>

                            </div> <!-- end col -->

                            <div class="col-lg-6">

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Adresse</label>
                                    <input type="text" id="simpleinput" class="form-control" name="address" placeholder="Address" value="{{old('address')}}">
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
                            <a href="{{url('clients')}}" class="btn btn-white btn-rounded waves-effect">Annuler</a>
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
