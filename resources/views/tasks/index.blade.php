@extends('layouts.app')

@section('css')

    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('task.tasks')}}</a></li>
                            <li class="breadcrumb-item active">{{__('tasks_list.tasks_list')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('tasks_list.tasks_list')}}</h4>
                </div>
            </div>
        </div> <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                            </div>
                            <div class="col-3">
                                <button id="btn-new-tasks-list" type="button" class="btn btn-lg font-11 btn-primary btn-block"><i class="mdi mdi-plus-circle-outline"></i> {{__('tasks_list.add_list')}}</button>
                            </div>
                        </div> <!-- end row -->
                        <br>
                        <div class="row">
                            @foreach($tasks_list as $task_list)
                                <div class="col-lg">
                                    <div class="card-box">
                                        <div class="dropdown float-right">
                                            <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical m-0 text-muted h3"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">{{__('tasks_list.edit')}}</a>
                                                <a class="dropdown-item" href="#">{{__('tasks_list.delete')}}</a>
                                            </div>
                                        </div> <!-- end dropdown -->
                                        <h4 class="header-title text-center">{{$task_list->title}}</h4>
                                        <br>

                                        <ul class="sortable-list tasklist list-unstyled" id="upcoming">
                                            @foreach($task_list->tasks as $task)
                                                <li id="task">
                                                    <span class="badge bg-soft-success  float-right">{{$task->status}}</span>
                                                    <h5 class="mt-0" id="edit-task-modal"><a href="javascript: void(0);" class="text-dark">{{$task->title}}</a></h5>
                                                    <p>{{$task->description}}</p>
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="font-13 mt-2 mb-0"><i class="mdi mdi-calendar"></i>{{$task->created_at}}</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="text-right">
                                                                <a href="javascript: void(0);" class="text-muted">
                                                                    <img src="../assets/images/users/user-2.jpg" alt="task-user" class="avatar-sm img-thumbnail rounded-circle">
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <button id="btn-add-task" type="button" class="external-event btn font-11 btn-block btn btn-dark "><i class="mdi mdi-plus-circle-outline"></i> {{__('task.add_task')}}</button>

                                    </div>
                                </div> <!-- end col -->
                                @endforeach
                            </div>

                    </div> <!-- end card body-->
                </div> <!-- end card -->

                @include('tasks.tasks-list-modals.tasks-list-modal')
                @include('tasks.tasks-modals.task-modal')
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('ajax/tasks/task_delete_ajax.js')}}"></script>

    <script>
        $('#btn-new-tasks-list').on('click', function (event) {
            $('#tasks-list-modal').modal('show');
        })
        $('#btn-add-task').on('click', function (event) {
            $('#task-modal').modal('show');
        })
        $('#edit-task-modal').on('click', function (event) {
            $('#edit-task').modal('show');
        })
    </script>

    <script>
        var delete_confirmation = '{{__('task.delete_confirmation')}}';
        var _delete = '{{__('task.delete')}}';
        var cancel = '{{__('task.cancel')}}';
        var deleted = '{{__('task.deleted')}}';
        var data_deleted = '{{__('task.data_deleted')}}';
        var canceled = '{{__('task.canceled')}}';
        var data_is_safe = '{{__('task.data_is_safe')}}';
    </script>
@endsection

