@extends('layouts.app')

@section('css')
    <link href="{{asset('assets/libs/@fullcalendar/core/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/daygrid/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/bootstrap/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/timegrid/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/list/main.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">IBMA</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('vacation.calendar')}}</a></li>
                            <li class="breadcrumb-item active">{{__('vacation.calendar')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('vacation.calendar')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <button class="btn btn-lg font-16 btn-info btn-block" id="btn-new-vacation"><i class="mdi mdi-plus-circle-outline"></i> {{__('vacation.add_vacation')}}</button>

                            </div> <!-- end col-->

                            <div class="col-lg-9">
                                <div id="calendar"></div>
                            </div> <!-- end col -->

                        </div>  <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->

                <!-- Add Vacation MODAL -->
                <div class="modal fade" id="vacation-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                <h5 class="modal-title" id="modal-title">{{__('vacation.add_new_vacation')}}</h5>
                            </div>
                            <div class="modal-body p-4">
                                <form id="add-vacation-form" action="{{route('vacations.store')}}" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Employé</label>
                                                <select id="add-vacation-select" class="form-control" name="employee_id" required>
                                                    <option></option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="invalid-feedback">
                                                    {{__('vacation.please_select_employee')}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">La date de sortie</label>
                                                <input type="text" id="start-vacation-datepicker" name="start_date" class="form-control flatpickr-input active" placeholder="{{__('vacation.start_date')}}" readonly="readonly" required>
                                                <div class="invalid-feedback">
                                                    {{__('vacation.start_date_required')}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">La date d'entrée</label>
                                                <input type="text" id="end-vacation-datepicker" name="end_date" class="form-control flatpickr-input active" placeholder="{{__('vacation.end_date')}}" readonly="readonly" required>
                                                <div class="invalid-feedback">
                                                    {{__('vacation.end_date_required')}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 text-right">
                                            <button type="button" class="btn btn-light mr-1" data-dismiss="modal">{{__('vacation.cancel')}}</button>
                                            <button type="submit" class="btn btn-success">{{__('vacation.add')}}</button>
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
                                <h5 class="modal-title" id="modal-title">{{__('vacation.edit_vacation')}}</h5>
                            </div>
                            <div class="modal-body p-4">
                                <form id="edit-vacation-form" action="" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Employé</label>
                                                <select id="edit-vacation-select" class="form-control" name="employee_id" required>
                                                    <option></option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                    @endforeach
                                                    <div class="invalid-feedback">
                                                        {{__('vacation.please_select_employee')}}
                                                    </div>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">La date de sortie</label>
                                                <input type="text" id="edit-start-vacation-datepicker" name="start_date" class="form-control flatpickr-input active" placeholder="{{__('vacation.start_date')}}" readonly="readonly" required>
                                                <div class="invalid-feedback">
                                                    {{__('vacation.start_date_required')}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">La date d'entrée</label>
                                                <input type="text" id="edit-end-vacation-datepicker" name="end_date" class="form-control flatpickr-input active" placeholder="{{__('vacation.end_date')}}" readonly="readonly" required>
                                                <div class="invalid-feedback">
                                                    {{__('vacation.end_date_required')}}
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
                                            <button type="button" class="btn btn-danger delete-vacation" url="" id="btn-delete-vacation">{{__('vacation.delete')}}</button>
                                        </div>
                                        <div class="col-6 text-right">
                                            <button type="button" class="btn btn-light mr-1" data-dismiss="modal">{{__('vacation.cancel')}}</button>
                                            <button type="submit" class="btn btn-success">{{__('vacation.edit')}}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- end modal-content-->
                    </div> <!-- end modal dialog-->
                </div>
                <!-- end modal-->
            </div>
            <!-- end col-12 -->
        </div> <!-- end row -->

    </div> <!-- container -->
@endsection

@section('js')
    <!-- plugin js -->
    <script src="{{asset('assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/libs/@fullcalendar/core/main.min.js')}}"></script>
    <script src="{{asset('assets/libs/@fullcalendar/bootstrap/main.min.js')}}"></script>
    <script src="{{asset('assets/libs/@fullcalendar/daygrid/main.min.js')}}"></script>
    <script src="{{asset('assets/libs/@fullcalendar/timegrid/main.min.js')}}"></script>
    <script src="{{asset('assets/libs/@fullcalendar/list/main.min.js')}}"></script>
    <script src="{{asset('assets/libs/@fullcalendar/interaction/main.min.js')}}"></script>
    <script src="{{asset('assets/libs/@fullcalendar/core/locales/fr.js')}}"></script>

    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Plugin js-->
    <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

    <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{--file of delete client--}}
    <script src="{{asset('ajax/vacations/vacation_delete_ajax.js')}}"></script>

    <!-- Init js-->


    <!-- Calendar init -->
    <script>
        !function (l) {
            "use strict";

            function e() {
                this.$calendar = l("#calendar")
            }

            e.prototype.init = function () {
                var e = new Date(l.now());

                var t = [
                    @foreach($vacations as $vacation)
                    {
                        title: "{{__('vacation.vacation_of')}}" + '{{$vacation->employee->name}}',
                        start: '{{$vacation->start_date}}',
                        end: '{{$vacation->end_date}}',
                        data: {
                            'type': 'vacation',
                            'vacation_id': {{$vacation->id}},
                            'employee_id': {{$vacation->employee_id}},
                            'start_date': '{{$vacation->start_date}}',
                            'end_date': '{{$vacation->end_date}}',
                            'number_of_days': '{{$vacation->number_of_days}}',
                        },
                        className: "bg-info"
                    },
                    @endforeach
                    ], a = this;
                a.$calendarObj = new FullCalendar.Calendar(a.$calendar[0], {
                    locale: "{{__('vacation.local')}}",
                    plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid", "list"],
                    slotDuration: "00:15:00",
                    minTime: "08:00:00",
                    maxTime: "19:00:00",
                    themeSystem: "bootstrap",
                    bootstrapFontAwesome: !1,
                    defaultView: "dayGridMonth",
                    handleWindowResize: !0,
                    height: l(window).height() - 200,
                    header: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                    },
                    events: t,
                    eventLimit: !0,
                    eventClick: function (e) {
                        if (e.event.extendedProps.data.type === 'vacation'){
                            var url = '{{ route("vacations.update", ":id") }}';
                            var deleteUrl = '{{ route("vacations.destroy", ":id") }}';
                            url = url.replace(':id', e.event.extendedProps.data.vacation_id);
                            deleteUrl = deleteUrl.replace(':id', e.event.extendedProps.data.vacation_id);
                            $('#edit-vacation-form').attr('action', url);
                            $('#btn-delete-vacation').attr('url', deleteUrl);
                            $("#edit-vacation-select").val(e.event.extendedProps.data.employee_id).change();
                            $('#edit-start-vacation-datepicker').val(e.event.extendedProps.data.start_date);
                            $('#edit-end-vacation-datepicker').val(e.event.extendedProps.data.end_date);
                            $('#number-of-days-label').text("{{__('vacation.number_of_days')}}: " + e.event.extendedProps.data.number_of_days);
                            $('#edit-vacation-modal').modal('show');
                        }
                    }
                }), a.$calendarObj.render()
            }, l.CalendarApp = new e, l.CalendarApp.Constructor = e
        }(window.jQuery), function () {
            "use strict";
            window.jQuery.CalendarApp.init()
        }();
    </script>

    <script>
        $('#btn-new-vacation').on('click', function (event) {
            $('#vacation-modal').modal('show');
        })
    </script>

    <script>

        $('#add-vacation-select').select2({
            placeholder: "{{__('vacation.select_employee')}}",
        });

        $("#start-vacation-datepicker").flatpickr({
            allowInput: true,
            altInput: true,
            altFormat: "Y-m-d",
            dateFormat: "Y-m-d"
        })
        $("#end-vacation-datepicker").flatpickr({
            allowInput: true,
            altInput: true,
            altFormat: "Y-m-d",
            dateFormat: "Y-m-d"
        })

        $('#edit-vacation-select').select2({
            placeholder: "{{__('vacation.select_employee')}}",
        });

        $("#edit-start-vacation-datepicker").flatpickr({
            allowInput: true,
            dateFormat: "Y-m-d"
        })
        $("#edit-end-vacation-datepicker").flatpickr({
            allowInput: true,
            dateFormat: "Y-m-d"
        })
    </script>

    <script>
        var vacation_delete_confirmation = '{{__('vacation.vacation_delete_confirmation')}}';
        var _delete = '{{__('vacation.delete')}}';
        var cancel = '{{__('vacation.cancel')}}';
        var deleted = '{{__('vacation.deleted')}}';
        var data_deleted = '{{__('vacation.data_deleted')}}';
        var canceled = '{{__('vacation.canceled')}}';
        var data_is_safe = '{{__('vacation.data_is_safe')}}';
    </script>

@endsection
