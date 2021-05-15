@extends('layouts.app')
<!--{{ $project->name }}-->

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">IBMA</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('project.Project') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('project.detail_project') }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{ __('project.project_details') }}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->



                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <!-- project card -->
                        <div class="card d-block">
                            <div class="card-body">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="dripicons-dots-3"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-pencil mr-1"></i>Edit</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-delete mr-1"></i>Delete</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-email-outline mr-1"></i>Invite</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item"><i class="mdi mdi-exit-to-app mr-1"></i>Leave</a>
                                    </div>
                                </div>
                                <!-- project title-->
                                <h3 class="mt-0 font-20">
                                    <!--App design and development-->
                                    {{$project->name}}
                                </h3>
                                <div class="badge badge-secondary mb-3">{{ __('project.Ongoing') }}</div>

                                <h5>{{ __('project.Show') }}</h5>

                                <p class="text-muted mb-2">
                                {{$project->description}}
                                </p>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>{{ __('project.show_startdate') }}</h5>
                                            <p>{{$project->startDate}}<small class="text-muted"></small></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>{{ __('project.show_duedate') }}</h5>
                                            <p>{{$project->dueDate}} <small class="text-muted"></small></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-4">
                                            <h5>{{ __('project.show_budget') }}</h5>
                                            <p>{{$project->budget}}</p>
                                        </div>
                                    </div>
                                </div>




                                    <br>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme" class="d-inline-block">
                                        <img src="../assets/images/users/user-6.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Michael Zenaty" class="d-inline-block">
                                        <img src="../assets/images/users/user-7.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="James Anderson" class="d-inline-block">
                                        <img src="../assets/images/users/user-8.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme" class="d-inline-block">
                                        <img src="../assets/images/users/user-4.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Michael Zenaty" class="d-inline-block">
                                        <img src="../assets/images/users/user-5.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                    </a>

                                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="James Anderson" class="d-inline-block">
                                        <img src="../assets/images/users/user-3.jpg" class="rounded-circle img-thumbnail avatar-sm" alt="friend">
                                    </a>
                                </div>

                            </div> <!-- end card-body-->

                        </div> <!-- end card-->


                        <!-- end card-->
                    </div> <!-- end col -->


                </div>
                <!-- end row -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box">
                        <h4 class="header-title">{{ __('project.materials_list') }}</h4>


                        <div class="bootstrap-table bootstrap4">
                            <div class="fixed-table-toolbar"></div>

                            <div class="fixed-table-container" style="padding-bottom: 0px;">
                                <div class="fixed-table-header" style="display: none;"><table></table></div>
                                <div class="fixed-table-body">
                                    <div class="fixed-table-loading table table-bordered table-hover" style="top: 1px;">

           <span class="animation-wrap"><span class="animation-dot"></span></span>
           </span>
                                    </div>
                                    <table data-toggle="table" data-show-columns="false" data-page-list="[5, 10, 20]" data-page-size="5" data-buttons-class="xs btn-light" data-pagination="true" class="table-borderless table table-bordered table-hover" style="display: table;">
                                        <thead class="thead-light" style="">
                                        <tr>
                                            <th style="" data-field="id">
                                                <div class="th-inner ">{{ __('project.reference_material') }}</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="" data-field="name">
                                                <div class="th-inner ">{{ __('project.Designation') }}</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="" data-field="text">
                                                <div class="th-inner ">{{ __('project.Category') }}</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="" data-field="text">
                                                <div class="th-inner ">{{ __('project.Quantity') }}</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="" data-field="name">
                                                <div class="th-inner ">{{ __('project.Origin') }}</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                            <th style="" data-field="name">
                                                <div class="th-inner ">{{ __('project.Condition') }}</div>
                                                <div class="fht-cell"></div>
                                            </th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($materials as $material)
                                            <tr data-index="0">
                                                <td style="">{{$material->material_reference}}</td>
                                                <td style="">{{$material->designation}}</td>
                                                <td style="">{{$material->category}}</td>
                                                <td style="">{{$material->quantity}}</td>
                                                <td style="">{{$material->origin}}</td>
                                                <td style="">{{$material->condition}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="fixed-table-footer">
                                    <table>
                                        <thead>
                                        <tr></tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>

                        </div><div class="clearfix"></div>
                    </div> <!-- end card-box-->
                </div> <!-- end col-->
            </div> <!-- end row table-->

            </div> <!-- container -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        2015 - <script>document.write(new Date().getFullYear())</script>2021 © UBold theme by <a href="">Coderthemes</a>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">{{ __('project.about') }}</a>
                            <a href="javascript:void(0);">{{ __('project.help') }}</a>
                            <a href="javascript:void(0);"> {{ __('project.Contact') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>



@endsection





 @section('js')
    <!-- Plugins js -->
    <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
@endsection
