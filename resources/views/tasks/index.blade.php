@extends('layouts.app')

@section('css')
    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
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
            <div class="col-3">
                <div class="form-group">
                    <label class="control-label">{{__('task.project')}}</label>
                    <select id="project-select" class="form-control" name="project_id" required>
                        <option value="select-project" disabled selected>Sélectionner un projet</option>
                        @foreach($projects as $project)
                            <option value="{{$project->id}}">{{$project->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-9"></div>
        </div>
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
                                            <a class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical m-0 text-muted h3"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item btn-edit-tasks-list">{{__('tasks_list.edit')}}</a>
                                                <a class="dropdown-item" href="#">{{__('tasks_list.delete')}}</a>
                                            </div>
                                        </div> <!-- end dropdown -->
                                        <h4 class="header-title text-center">{{$task_list->title}}</h4>
                                        <br>
                                        <ul class="sortable-list tasklist list-unstyled">
                                            @foreach($task_list->tasks as $task)
                                                <li>
{{--                                                    <span class="badge bg-soft-success  float-right">{{$task->status}}</span>--}}
                                                    <h5 class="mt-0" id="btn-edit-task"><a class="text-dark">{{$task->title}}</a></h5>
                                                    <p>{{$task->description}}</p>
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <p class="font-13 mt-2 mb-0"><i class="mdi mdi-calendar"></i>{{$task->created_at->format('d/m/Y')}}</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="text-right">
                                                                <a href="javascript: void(0);" class="text-muted">
                                                                    @foreach($task->employees as $employee)
                                                                        @if($employee->image)
                                                                            <img src="{{asset('storage/employees/'.$employee->image)}}" alt="image" class="avatar-sm img-thumbnail rounded-circle">
                                                                        @else
                                                                            <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-sm rounded-circle">
                                                                        @endif
                                                                    @endforeach
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="external-event btn font-11 btn-block btn btn-dark btn-new-task"><i class="mdi mdi-plus-circle-outline"></i> {{__('task.add_task')}}</button>
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
    <script src="{{asset('assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

    <script>
        $('#btn-new-tasks-list').on('click', function (event) {
            $('#tasks-list-modal').modal('show');
        })
        $('.btn-new-task').on('click', function (event) {
            $('#task-modal').modal('show');
        })
        $('#btn-edit-task').on('click', function (event) {
            $('#edit-task-modal').modal('show');
        })
        $('.btn-edit-tasks-list').on('click', function (event) {
            $('#edit-tasks-list-modal').modal('show');
        })

    </script>

    <script>
        $('#add-employee-select').select2({
            placeholder: "{{__('task.select_employee')}}",
        });
    </script>

    <script src="{{asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
    <script src="{{asset('assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

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
