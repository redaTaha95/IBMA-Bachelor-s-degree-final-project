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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Projets</a></li>
                            <li class="breadcrumb-item active">Modifier le projet</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Modification d'informations du projet</h4>
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
                        <form action="{{route('projects.update', $project->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Nom *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Nom" value="{{old('name', $project->name)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Déscription</label>
                                        <input type="text" id="simpleinput" class="form-control" name="description" placeholder="description" value="{{old('description', $project->description)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Start date</label>
                                        <input type="date" id="simpleinput" class="form-control" name="startDate" placeholder="startDate" value="{{old('startDate', $project->startDate)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Due date</label>
                                        <input type="date" id="simpleinput" class="form-control" name="dueDate" placeholder="duedate" value="{{old('dueDate', $project->dueDate)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Budget</label>
                                        <input type="text" id="simpleinput" class="form-control" name="budget" placeholder="budget" value="{{old('budget', $project->budget)}}">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Team member</label>
                                        <input type="text" id="simpleinput" class="form-control" name="teamMember" placeholder="team" value="{{old('teamMember', $project->teamMember)}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Logo</label>
                                        <input type="file" data-plugins="dropify" name="logo" data-default-file="{{asset('storage/projects/'.$project->logo)}}"/>
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">Modifier</button>
                                <a href="{{url('projects')}}" class="btn btn-white btn-rounded waves-effect">Annuler</a>
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
