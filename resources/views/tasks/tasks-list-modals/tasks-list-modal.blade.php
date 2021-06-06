{{--Add New Tasks List--}}
<div class="modal fade" id="tasks-list-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('tasks_list.add_new_list')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="add-new-tasks-list-form" action="{{route('tasks_list.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input name="project_id" type="hidden" value="{{$project_id}}">
                                <label class="control-label">{{__('tasks_list.title')}}</label>
                                <input type="text" id="tasks-list-title" name="title" class="form-control" placeholder="{{__('tasks_list.title')}}" required>
                                <div class="invalid-feedback">
                                    {{__('tasks_list.tasks_list_title')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-success">{{__('tasks_list.add')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--End Modal--}}

{{--Edit Tasks List--}}
<div class="modal fade" id="edit-tasks-list-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('tasks_list.edit_list')}}</h5>
            </div>
            <div class="modal-body p-4">
                        <form id="edit-tasks-list-form" action="" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('tasks_list.title')}}</label>
                                <input type="text" id="edit-tasks-list" name="title" class="form-control" placeholder="{{__('tasks_list.title')}}" required>
                                <div class="invalid-feedback">
                                    {{__('tasks_list.tasks_list_title')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            {{--<button type="button" class="btn btn-danger" url="" id="btn-delete-tasks-list">{{__('tasks_list.delete')}}</button>--}}
                        </div>
                        <div class="col-9 text-right">
                            <button type="button" class="btn btn-light mr-1" data-dismiss="modal">{{__('tasks_list.cancel')}}</button>
                            <button type="submit" class="btn btn-success">{{__('tasks_list.edit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--End Modal--}}



