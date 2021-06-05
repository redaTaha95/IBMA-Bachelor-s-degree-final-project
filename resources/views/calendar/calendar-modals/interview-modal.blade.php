<!-- Add Interview MODAL -->
<div class="modal fade" id="interview-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('calendar.add_new_interview')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="add-interview-form" action="{{route('interviews.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.responsible')}}</label>
                                <select id="add-interview-employees-select" class="form-control" name="employee_id" required>
                                    <option></option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->first_name.' '.$employee->last_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{__('calendar.please_select_responsible')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.candidate')}}</label>
                                <select id="add-interview-candidates-select" class="form-control" name="candidate_id" required>
                                    <option></option>
                                    @foreach($candidates as $candidate)
                                        <option value="{{$candidate->id}}">{{$candidate->first_name.' '.$candidate->last_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{__('calendar.please_select_candidate')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.datetime')}}</label>
                                <input type="text" id="interview-datepicker" name="datetime" class="form-control flatpickr-input active" placeholder="{{__('calendar.datetime')}}" readonly="readonly" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.datetime_required')}}
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

<!-- Edit Interview MODAL -->
<div class="modal fade" id="edit-interview-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('calendar.edit_interview')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="edit-interview-form" action="" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.responsible')}}</label>
                                <select id="edit-interview-employees-select" class="form-control" name="employee_id" required>
                                    <option></option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->first_name.' '.$employee->last_name}}</option>
                                    @endforeach
                                    <div class="invalid-feedback">
                                        {{__('calendar.please_select_responsible')}}
                                    </div>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.candidate')}}</label>
                                <select id="edit-interview-candidates-select" class="form-control" name="candidate_id" required>
                                    <option></option>
                                    @foreach($candidates as $candidate)
                                        <option value="{{$candidate->id}}">{{$candidate->first_name.' '.$candidate->last_name}}</option>
                                    @endforeach
                                    <div class="invalid-feedback">
                                        {{__('calendar.please_select_candidate')}}
                                    </div>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.datetime')}}</label>
                                <input type="text" id="edit-interview-datepicker" name="datetime" class="form-control flatpickr-input active" placeholder="{{__('calendar.datetime')}}" readonly="readonly" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.datetime_required')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger delete-interview" url="" id="btn-delete-interview">{{__('calendar.delete')}}</button>
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
