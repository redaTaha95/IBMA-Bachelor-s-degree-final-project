@extends('layouts.app')

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- for multi list -->
    <link href="{{asset('assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <!-- for multi list -->
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('project.projects') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('project.add_project') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('project.project_add') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('project.project_information') }}</h4>

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
                        <form action="{{route('projects.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">


                                        <div class="dropdown">

                                            <label for="simpleinput" >{{ __('project.client_id') }}</label>
                                            <select name="client_id" class="form-control" required>
                                                <option value="" hidden>--- {{ __('project.select_client') }} ---</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                    <!--<div class="form-group mb-3">
                                        <label for="example-multiselect">Materials </label>
                                        <select name="material_name[]" id="example-multiselect" multiple class="form-control" size="3">
                                            @foreach ($materials as $material)
                                                <option value="{{ $material->id }}" >{{ $material->designation }}</option>
                                            @endforeach
                                        </select>
                                    </div>-->

                                    <br>




                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('project.add_name') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="Nom" value="{{old('name')}}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('project.add_description') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="description" placeholder="Description" value="{{old('description')}}" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('project.add_startdate') }}</label>
                                        <input type="date" id="simpleinput" class="form-control" name="startdate" placeholder="Date début" value="{{old('startdate')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('project.add_duedate') }}</label>
                                        <input type="date" id="simpleinput" class="form-control" name="duedate" placeholder="Date d'échéance" value="{{old('duedate')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('project.add_budget') }}</label>
                                        <input type="number" id="simpleinput" class="form-control" name="budget" placeholder="Budget" value="{{old('budget')}}">
                                    </div>



                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                      <div>
                                          <label for="material">{{ __('project.material_name') }}</label>
                                          <select multiple="multiple" class="multi-select" id="material" name="material_id[]" data-plugin="multiselect">
                                              @foreach($materials as $material)
                                                  <option value="{{$material->id}}">{{$material->designation}}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                      <br>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('project.add_logo') }}</label>
                                        <input type="file" data-plugins="dropify" name="logo"/>
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{ __('project.button_add') }}</button>
                                <a href="{{url('projects')}}" class="btn btn-white btn-rounded waves-effect">{{ __('project.button_cancel') }}</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- for multi list -->

    <script src="{{asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
    <script src="{{asset('assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <!-- for multi list -->

@endsection
