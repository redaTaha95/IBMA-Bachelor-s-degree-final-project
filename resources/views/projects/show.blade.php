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
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('project.title12') }}</a></li>
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('project.title13') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('project.title14') }}</li>
                                </ol>
                            </div>
                            <h4 class="page-title">{{ __('project.introduction4') }}</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->



                <div class="row">
                    <div class="col-xl-8 col-lg-6">
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
                                   <!-- With supporting text below as a natural lead-in to additional contenposuere erat a ante. Voluptates, illo, iste itaque voluptas
                                    corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate,
                                    quod illo rerum? Lorem ipsum dolor sit amet.-->
                                </p>

                              <!--  <p class="text-muted mb-4">
                                    Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores
                                    libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet. With supporting text below
                                    as a natural lead-in to additional contenposuere erat a ante.
                                </p>-->

                               <!-- <div class="mb-4">
                                    <h5>Tags</h5>
                                    <div class="text-uppercase">
                                        <a href="#" class="badge badge-soft-primary mr-1">Html</a>
                                        <a href="#" class="badge badge-soft-primary mr-1">Css</a>
                                        <a href="#" class="badge badge-soft-primary mr-1">Bootstrap</a>
                                        <a href="#" class="badge badge-soft-primary mr-1">JQuery</a>
                                    </div>
                                </div>-->

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

                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="dripicons-dots-3"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Latest</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">{{ __('project.population') }}</a>
                                    </div>
                                </div>

                                <h4 class="mt-0 mb-3">{{ __('project.Comment') }}</h4>

                                <textarea class="form-control form-control-light mb-2" placeholder="{{ __('project.write_msg') }}" id="example-textarea" rows="3"></textarea>
                                <div class="text-right">
                                    <div class="btn-group mb-2">
                                        <button type="button" class="btn btn-link btn-sm text-muted font-18"><i class="dripicons-paperclip"></i></button>
                                    </div>
                                    <div class="btn-group mb-2 ml-2">
                                        <button type="button" class="btn btn-primary btn-sm">{{ __('project.submit') }}</button>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <div class="media">
                                        <img class="mr-2 avatar-sm rounded-circle" src="../assets/images/users/user-3.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="mt-0"><a href="contacts-profile.html" class="text-reset">Jeremy Tomlinson</a> <small class="text-muted">{{ __('project.3hrs') }}</small></h5>
                                            Nice work, makes me think of The Money Pit.

                                            <br>
                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> {{ __('project.Response') }}</a>

                                            <div class="media mt-3">
                                                <a class="pr-2" href="#">
                                                    <img src="../assets/images/users/user-4.jpg" class="avatar-sm rounded-circle" alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="mt-0"><a href="contacts-profile.html" class="text-reset">Kathleen Thomas</a> <small class="text-muted">{{ __('project.1hr') }}</small></h5>
                                                    i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="media mt-3">
                                        <img class="mr-2 avatar-sm rounded-circle" src="../assets/images/users/user-2.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h5 class="mt-0"><a href="contacts-profile.html" class="text-reset">Jonathan Tiner</a> <small class="text-muted">{{ __('project.one_Day') }}</small></h5>
                                            The parallax is a little odd but O.o that house build is awesome!!

                                            <br>
                                            <a href="javascript: void(0);" class="text-muted font-13 d-inline-block mt-2"><i class="mdi mdi-reply"></i> {{ __('project.Response') }}</a>

                                        </div>
                                    </div>

                                    <div class="media mt-3">
                                        <a class="pr-2" href="#">
                                            <img src="../assets/images/users/user-1.jpg" class="rounded-circle" alt="Generic placeholder image" height="31">
                                        </a>
                                        <div class="media-body">
                                            <input type="text" id="simpleinput" class="form-control form-control-sm form-control-light" placeholder="{{ __('project.Add_comment') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-2">
                                    <a href="javascript:void(0);" class="text-danger"><i class="mdi mdi-spin mdi-loading mr-1 font-16"></i> {{ __('project.load') }}</a>
                                </div>
                            </div> <!-- end card-body-->
                        </div>
                        <!-- end card-->
                    </div> <!-- end col -->

                    <div class="col-xl-4 col-lg-5">

                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none text-muted" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal font-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="mdi mdi-attachment mr-1"></i>{{ __('project.attachment') }}
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="mdi mdi-pencil-outline mr-1"></i>{{ __('project.attachment_Edit') }}
                                        </a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <i class="mdi mdi-content-copy mr-1"></i>{{ __('project.Duplicata') }}
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item text-danger">
                                            <i class="mdi mdi-delete-outline mr-1"></i>{{ __('project.Delete') }}
                                        </a>
                                    </div> <!-- end dropdown menu-->
                                </div> <!-- end dropdown-->

                                <h5 class="card-title font-16 mb-3">{{ __('project.Attachment') }}</h5>

                                <form action="/" method="post" class="dropzone dz-clickable" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews" data-upload-preview-template="#uploadPreviewTemplate">


                                    <div class="dz-message needsclick">
                                        <i class="h3 text-muted dripicons-cloud-upload"></i>
                                        <h4>{{ __('project.Upload') }}</h4>
                                    </div>
                                </form>

                                <!-- Preview -->
                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                                <!-- file preview template -->
                                <div class="d-none" id="uploadPreviewTemplate">
                                    <div class="card mt-1 mb-0 shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-auto">
                                                    <img data-dz-thumbnail="" src="#" class="avatar-sm rounded bg-light" alt="">
                                                </div>
                                                <div class="col pl-0">
                                                    <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name=""></a>
                                                    <p class="mb-0" data-dz-size=""></p>
                                                </div>
                                                <div class="col-auto">
                                                    <!-- Button -->
                                                    <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove="">
                                                        <i class="dripicons-cross"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end file preview template -->


                                <div class="card mb-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                            <span class="avatar-title badge-soft-primary text-primary rounded">
                                                                ZIP
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col pl-0">
                                                <a href="javascript:void(0);" class="text-muted font-weight-bold">Ubold-sketch-design.zip</a>
                                                <p class="mb-0 font-12">2.3 MB</p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                                    <i class="dripicons-download"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-1 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                            <span class="avatar-title badge-soft-primary text-primary rounded">
                                                                JPG
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col pl-0">
                                                <a href="javascript:void(0);" class="text-muted font-weight-bold">Dashboard-design.jpg</a>
                                                <p class="mb-0 font-12">3.25 MB</p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                                    <i class="dripicons-download"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-0 shadow-none border">
                                    <div class="p-2">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-sm">
                                                            <span class="avatar-title bg-secondary rounded">
                                                                .MP4
                                                            </span>
                                                </div>
                                            </div>
                                            <div class="col pl-0">
                                                <a href="javascript:void(0);" class="text-muted font-weight-bold">Admin-bug-report.mp4</a>
                                                <p class="mb-0 font-12">7.05 MB</p>
                                            </div>
                                            <div class="col-auto">
                                                <!-- Button -->
                                                <a href="javascript:void(0);" class="btn btn-link font-16 text-muted">
                                                    <i class="dripicons-download"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

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
