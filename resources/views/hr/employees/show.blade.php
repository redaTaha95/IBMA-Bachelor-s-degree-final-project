
@extends('layouts.app')

@section('css')

    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- Summernote css -->
    <link href="../assets/libs/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- start page title -->

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">IBMA</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('employee.employee_folder') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('employee.profile') }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('employee.employee_profile') }} {{$employee->name}}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-sm-4">
            <div class="card-box text-center">
                <!--<img src="../assets/images/users/user-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">-->
                @if($employee->logo)
                    <img src="{{asset('storage/employees/'.$employee->logo)}}" alt="image" class="avatar-lg rounded-circle">
                @else
                    <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-lg rounded-circle">
                @endif

                <h4 class="mb-0">{{$employee->name}}</h4><br>
               <!-- <p class="text-muted">@webdesigner</p>-->

                <!--<button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow</button>-->
                <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message</button>

                <div class="text-left mt-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="text-muted mb-2 font-13"><strong>{{ __('employee.name') }} :</strong> <span class="ml-2" style="color: #0a0a0a">{{$employee->name}}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>{{ __('employee.phone') }} :</strong><span class="ml-2" style="color: #0a0a0a">{{$employee->phone}}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>{{ __('employee.email') }} :</strong> <span class="ml-2 " style="color: #0a0a0a">{{$employee->email}}</span></p>
                            <!--</div>-->
                    <!--<div class="col-sm-6">-->
                            <p class="text-muted mb-2 font-13"><strong>{{ __('employee.address') }} :</strong> <span class="ml-2" style="color: #0a0a0a">{{$employee->address}}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>{{ __('employee.hire_date') }} :</strong> <span class="ml-2" style="color: #0a0a0a">{{$employee->hire_date}}</span></p>

                            <p class="text-muted mb-1 font-13"><strong>{{ __('employee.salary') }} :</strong> <span class="ml-2" style="color: #0a0a0a">{{$employee->salary}}</span></p>
                        </div>
                    </div>


                </div>


            </div>
        </div>
        <div class="col"></div>

    </div>
    <!-- end profile -->
    <!-- start of project list of this employee -->
    <div class="row mb-2">
        <div class="col-sm-4">
            <h4> {{ __('employee.projects_assigned') }} :</h4>
        </div>
        <div class="col-sm-8">
            <div class="text-sm-right">
                <div class="btn-group mb-3">
                    <button type="button" class="btn btn-primary">All</button>
                </div>
                <div class="btn-group mb-3 ml-1">
                    <button type="button" class="btn btn-light">Ongoing</button>
                    <button type="button" class="btn btn-light">Finished</button>
                </div>
                <div class="btn-group mb-3 ml-2 d-none d-sm-inline-block">
                    <button type="button" class="btn btn-dark"><i class="mdi mdi-apps"></i></button>
                </div>
                <div class="btn-group mb-3 d-none d-sm-inline-block">
                    <button type="button" class="btn btn-link text-dark"><i class="mdi mdi-format-list-bulleted-type"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card-box project-box">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle card-drop arrow-none" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-horizontal m-0 text-muted h3"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Delete</a>
                        <a class="dropdown-item" href="#">Add Members</a>
                        <a class="dropdown-item" href="#">Add Due Date</a>
                    </div>
                </div> <!-- end dropdown -->
                <!-- Title-->
                <h4 class="mt-0"><a href="project-detail.html" class="text-dark">New Admin Design</a></h4>
                <p class="text-muted text-uppercase"><i class="mdi mdi-account-circle"></i> <small>Orange Limited</small></p>
                <div class="badge bg-soft-success text-success mb-3">Finished</div>
                <!-- Desc-->
                <p class="text-muted font-13 mb-3 sp-line-2">With supporting text below as a natural lead-in to additional contenposuere erat a
                    ante...<a href="javascript:void(0);" class="font-weight-bold text-muted">view more</a>
                </p>
                <!-- Task info-->
                <p class="mb-1">
                                        <span class="pr-2 text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-format-list-bulleted-type text-muted"></i>
                                            <b>78</b> Tasks
                                        </span>
                    <span class="text-nowrap mb-2 d-inline-block">
                                            <i class="mdi mdi-comment-multiple-outline text-muted"></i>
                                            <b>214</b> Comments
                                        </span>
                </p>
                <!-- Team-->
                <div class="avatar-group mb-3">
                    <a href="javascript: void(0);" class="avatar-group-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme">
                        <img src="../assets/images/users/user-1.jpg" class="rounded-circle avatar-sm" alt="friend">
                    </a>

                    <a href="javascript: void(0);" class="avatar-group-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Michael Zenaty">
                        <img src="../assets/images/users/user-2.jpg" class="rounded-circle avatar-sm" alt="friend">
                    </a>

                    <a href="javascript: void(0);" class="avatar-group-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="James Anderson">
                        <img src="../assets/images/users/user-3.jpg" class="rounded-circle avatar-sm" alt="friend">
                    </a>

                    <a href="javascript: void(0);" class="avatar-group-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Mat Helme">
                        <img src="../assets/images/users/user-4.jpg" class="rounded-circle avatar-sm" alt="friend">
                    </a>

                    <a href="javascript: void(0);" class="avatar-group-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Username">
                        <img src="../assets/images/users/user-5.jpg" class="rounded-circle avatar-sm" alt="friend">
                    </a>
                </div>
                <!-- Progress-->
                <p class="mb-2 font-weight-semibold">Task completed: <span class="float-right">28/78</span></p>
                <div class="progress mb-1" style="height: 7px;">
                    <div class="progress-bar" role="progressbar" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100" style="width: 34%;">
                    </div><!-- /.progress-bar .progress-bar-danger -->
                </div><!-- /.progress .no-rounded -->

            </div>
        </div>
    </div>
    <!-- end of list projects -->


@endsection

@section('js')
    <!--Summernote js-->
    <script src="../assets/libs/summernote/summernote-bs4.min.js"></script>

    <script>
        jQuery(document).ready(function(){
            $('.summernote').summernote({
                height: 230,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                 // set focus to editable area after initializing summernote
            });
        });
    </script>
@endsection
