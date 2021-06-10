<!-- Add Appointment MODAL -->
<div class="modal fade" id="appointment-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('calendar.add_new_appointment')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="add-appointment-form" action="{{route('appointments.store')}}" method="post" class="needs-validation" novalidate>
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
                                <label class="control-label">{{__('calendar.datetime')}}</label>
                                <input type="text" id="appointment-datepicker" name="datetime" class="form-control flatpickr-input active" placeholder="{{__('calendar.datetime')}}" readonly="readonly" required>
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

<!-- Edit Appointment MODAL -->
<div class="modal fade" id="edit-appointment-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">&times;</button>
                <h5 class="modal-title" id="modal-title">{{__('calendar.edit_appointment')}}</h5>
            </div>
            <div class="modal-body p-4">
                <form id="edit-appointment-form" action="" method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.description')}}</label>
                                <input id="edit-appointment-description" type="text" class="form-control" name="description" placeholder="{{__('calendar.description')}}" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.please_add_description')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">{{__('calendar.datetime')}}</label>
                                <input type="text" id="edit-appointment-datepicker" name="datetime" class="form-control flatpickr-input active" placeholder="{{__('calendar.datetime')}}" readonly="readonly" required>
                                <div class="invalid-feedback">
                                    {{__('calendar.datetime_required')}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="button" class="btn btn-danger delete-appointment" url="" id="btn-delete-appointment">{{__('calendar.delete')}}</button>
                        </div>
                        <div class="col-6 text-right">
                            <button type="button" class="btn btn-light mr-1" data-dismiss="modal">{{__('calendar.cancel')}}</button>
                            <button type="submit" class="btn btn-success">{{__('calendar.edit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- end modroal-content-->
    </div> <!-- end modal dialog-->
</div>
<!-- end modal-->
