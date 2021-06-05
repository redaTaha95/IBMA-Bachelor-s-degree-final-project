<!-- Add Vacation MODAL -->
<div class="modal fade" id="meeting-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('calendar.add_new_meeting')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="add-meeting-form" action="{{route('meetings.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.description')}}</label>
                                <input type="text" class="form-control" name="description" placeholder="{{__('calendar.description')}}" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.please_add_description')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.employees')}}</label>
                                <select multiple="multiple" class="multi-select" id="my_multi_select1" name="employee_id[]" data-plugin="multiselect" required>
                                    @foreach($employees as $employee)--}}
                                        <option value="{{$employee->id}}">{{$employee->first_name.' '.$employee->last_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{__('calendar.please_select_employee')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.meeting_datetime')}}</label>
                                <input type="text" id="start-meeting-datepicker" name="start_datetime" class="form-control flatpickr-input active" placeholder="{{__('calendar.meeting_datetime')}}" readonly="readonly" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.start_meeting_date_required')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-right">
                            <button type="button" class="btn btn-light mr-1" data-dismiss="modal">{{__('calendar.cancel')}}</button>
                            <button type="submit" class="btn btn-success">{{__('calendar.add')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- end modal-content-->
    </div> <!-- end modal dialog-->
</div>
<!-- end modal-->

<!-- Edit Meeting MODAL -->
<div class="modal fade" id="edit-meeting-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('calendar.edit_meeting')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="edit-meeting-form" action="" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.description')}}</label>
                                <input id="edit-meeting-description" type="text" class="form-control" name="description" placeholder="{{__('calendar.description')}}" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.please_add_description')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.employees')}}</label>
                                <select id="edit-meeting-employees-select" multiple="multiple" class="multi-select" name="employee_id[]" data-plugin="multiselect" required>
                                    @foreach($employees as $employee)--}}
                                    <option value="{{$employee->id}}">{{$employee->first_name.' '.$employee->last_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{__('calendar.please_select_employee')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.meeting_datetime')}}</label>
                                <input type="text" id="edit-start-meeting-datepicker" name="start_datetime" class="form-control flatpickr-input active" placeholder="{{__('calendar.meeting_datetime')}}" readonly="readonly" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.start_meeting_date_required')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger delete-meeting" url="" id="btn-delete-meeting">{{__('calendar.delete')}}</button>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-light mr-1" data-dismiss="modal">{{__('calendar.cancel')}}</button>
                            <button type="submit" class="btn btn-success">{{__('calendar.edit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- end modal-content-->
    </div> <!-- end modal dialog-->
</div>
<!-- end modal-->
