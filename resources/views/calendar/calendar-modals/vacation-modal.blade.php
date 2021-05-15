<!-- Add Vacation MODAL -->
<div class="modal fade" id="vacation-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('calendar.add_new_vacation')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="add-vacation-form" action="{{route('vacations.store')}}" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.employee')}}</label>
                                <select id="add-vacation-select" class="form-control" name="employee_id" required>
                                    <option></option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->first_name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    {{__('calendar.please_select_employee')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">La date de sortie</label>
                                <input type="text" id="start-vacation-datepicker" name="start_date" class="form-control flatpickr-input active" placeholder="{{__('calendar.start_date')}}" readonly="readonly" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.start_date_required')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">La date d'entrée</label>
                                <input type="text" id="end-vacation-datepicker" name="end_date" class="form-control flatpickr-input active" placeholder="{{__('calendar.end_date')}}" readonly="readonly" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.end_date_required')}}
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

<!-- Edit Vacation MODAL -->
<div class="modal fade" id="edit-vacation-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('calendar.edit_vacation')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="edit-vacation-form" action="" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.employee')}}</label>
                                <select id="edit-vacation-select" class="form-control" name="employee_id" required>
                                    <option></option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->first_name}}</option>
                                    @endforeach
                                    <div class="invalid-feedback">
                                        {{__('calendar.please_select_employee')}}
                                    </div>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">La date de sortie</label>
                                <input type="text" id="edit-start-vacation-datepicker" name="start_date" class="form-control flatpickr-input active" placeholder="{{__('calendar.start_date')}}" readonly="readonly" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.start_date_required')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">La date d'entrée</label>
                                <input type="text" id="edit-end-vacation-datepicker" name="end_date" class="form-control flatpickr-input active" placeholder="{{__('calendar.end_date')}}" readonly="readonly" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.end_date_required')}}
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label id="number-of-days-label" class="control-label text-danger"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger delete-vacation" url="" id="btn-delete-vacation">{{__('calendar.delete')}}</button>
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
