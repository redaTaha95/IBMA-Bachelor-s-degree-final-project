{{--Add New Task--}}
<div class="modal fade" id="task-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('task.add_new_task')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="add-new-task-form" action="{{route('tasks.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <input name="tasks_list_id" type="hidden" value="{{isset($task_list->id)}}">
                            <input name="project_id" type="hidden" value="1">

                            <div class="form-group">
                                <label class="control-label">{{__('task.title')}} *</label>
                                <input type="text" id="task-title" name="title" class="form-control" placeholder="{{__('task.title')}}" required>
                                <div class="invalid-feedback">
                                    {{__('task.task_title_required')}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{{__('task.description')}}</label>
                                <textarea id="task-description" class="form-control" rows="5" placeholder="{{__('task.description')}}"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="employee">{{ __('task.employee') }} *</label>
                                <select class="form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="" required>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->first_name.' '.$employee->last_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{__('task.select_employee')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success">{{__('task.add')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--End Modal--}}

{{--Edit Task Modal--}}
<div class="modal fade" id="edit-task-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('task.edit_task')}}</h5>
                <div class="modal-body p-4">
                    <form id="edit-task-form" action="" method="post" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="control-label">{{__('task.title')}} *</label>
                                    <input type="text" id="task-title" name="title" class="form-control" placeholder="{{__('task.title')}}" required>
                                    <div class="invalid-feedback">
                                        {{__('task.task_title_required')}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">{{__('task.description')}}</label>
                                    <textarea id="task-description" class="form-control" rows="5" placeholder="{{__('task.description')}}"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">{{__('task.employee')}} *</label>
                                    <select id="employee-select" class="form-control" name="employee_id" required>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->first_name.' '.$employee->last_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        {{__('task.select_employee')}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-3">
                                <button type="button" class="btn btn-danger delete-task" url="" id="btn-delete-task">{{__('task.delete')}}</button>
                            </div>
                            <div class="col-9 text-right">
                                <button type="button" class="btn btn-light mr-1" data-dismiss="modal">{{__('task.cancel')}}</button>
                                <button type="submit" class="btn btn-success">{{__('task.edit')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End Edit Task Modal--}}
