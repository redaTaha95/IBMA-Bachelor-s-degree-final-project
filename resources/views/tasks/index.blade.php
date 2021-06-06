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
    <!-- Start Container-->
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
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12 m-0 p-0">
                <div class="col-3 float-right">
                    <button id="btn-new-tasks-list" type="button" class="btn btn-secondary btn-block waves-effect waves-light"><i class="mdi mdi-plus-circle"></i> {{__('tasks_list.add_list')}}</button>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($tasks_list as $task_list)
                <div class="{{$tasks_list->count() > 3 ? 'col-lg' : 'col-lg-4' }}">
                    <!-- Start Card Box -->
                    <div class="card-box">
                        <!-- Start Dropdown -->
                        <div class="dropdown float-right">
                            <a class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical m-0 text-muted h3"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a data="{{$task_list->title.'$$'.route('tasks_list.update', $task_list->id)}}" class="dropdown-item btn-edit-tasks-list">{{__('tasks_list.edit')}}</a>
                                <a url="{{route('tasks_list.destroy', $task_list->id)}}" class="dropdown-item btn-delete-tasks-list">{{__('tasks_list.delete')}}</a>
                            </div>
                        </div>
                        <!-- End Dropdown -->
                        <h4 class="header-title text-center">{{$task_list->title}}</h4>
                        <br>
                        <ul class="sortable-list tasklist list-unstyled">
                            @foreach($task_list->tasks as $task)
                                <li>
                                    <span class="badge bg-soft-success  float-right">{{$task->status}}</span>
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
                        <button type="button" class="btn btn-primary btn-block mt-3 waves-effect waves-light btn-new-task"><i class="mdi mdi-plus-circle"></i> {{__('task.add_task')}}</button>
                    </div>
                    <!-- End Card Box -->
                </div>
            @endforeach
        </div>

        @include('tasks.tasks-list-modals.tasks-list-modal', ['project_id' => $project->id])

        @include('tasks.tasks-modals.task-modal', ['project_id' => $project->id])
    </div>
    <!-- End Container -->

@endsection

@section('js')

    <script src="{{asset('assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

    <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{-- File of delete task --}}
    <script src="{{asset('ajax/tasks/task_delete_ajax.js')}}"></script>

    {{-- File of delete tasks list --}}
    <script src="{{asset('ajax/tasks_list/tasks_list_delete_ajax.js')}}"></script>

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
            var data = $(this).attr('data');
            data = data.split('$$');
            $('#edit-tasks-list').val(data[0]);
            $('#edit-tasks-list-form').attr('action', data[1]);
            $('.btn-delete-tasks-list').attr('url', data[2]);
            $('#edit-tasks-list-modal').modal('show');
        })
    </script>

    <script>
        $('#add-employee-select').select2({
            placeholder: "{{__('task.select_employee')}}",
        });
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

