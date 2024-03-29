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

    <link href="{{asset('assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />

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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('calendar.calendar')}}</a></li>
                            <li class="breadcrumb-item active">{{__('calendar.calendar')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('calendar.calendar')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-3">
                                <button id="btn-new-appointment" class="btn btn-lg font-16 btn-primary btn-block"><i class="mdi mdi-plus-circle-outline"></i> {{__('calendar.add_appointment')}}</button>

                                <div id="external-events" class="m-t-20">
                                    <br>
                                    <p class="text-muted">{{__('calendar.add_events')}}</p>
                                    <button id="btn-new-vacation" type="button" class="external-event btn font-14 btn-block btn-info text-left"><i class="mdi mdi-plus-circle-outline"></i> {{__('calendar.add_vacation')}}</button>
                                    <button id="btn-new-client-appointment" type="button" class="external-event btn font-14 btn-block btn-warning text-left"><i class="mdi mdi-plus-circle-outline"></i> {{__('calendar.add_appointment_with_client')}}</button>
                                    <button id="btn-new-interview" type="button" class="external-event btn font-14 btn-block btn-success text-left"><i class="mdi mdi-plus-circle-outline"></i> {{__('calendar.add_interview')}}</button>
                                    <button id="btn-new-meeting" type="button" class="external-event btn font-14 btn-block btn-danger text-left"><i class="mdi mdi-plus-circle-outline"></i> {{__('calendar.add_meeting')}}</button>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-lg-9">
                                <div id="calendar"></div>
                            </div> <!-- end col -->

                        </div>  <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->

                @include('calendar.calendar-modals.vacation-modal', ['employees' => $employees]);

                @include('calendar.calendar-modals.client-appointment-modal', ['clients' => $clients]);

                @include('calendar.calendar-modals.interview-modal', ['employees' => $employees, 'candidates' => $candidates]);

                @include('calendar.calendar-modals.meeting_modal', ['employees' => $employees]);

                @include('calendar.calendar-modals.appointment-modal');
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

    <script src="{{asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
    <script src="{{asset('assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{--file of delete client--}}
    <script src="{{asset('ajax/vacations/vacation_delete_ajax.js')}}"></script>
    <script src="{{asset('ajax\client-appointment\client_appointment-delete_ajax.js')}}"></script>
    <script src="{{asset('ajax\interviews\interview_delete_ajax.js')}}"></script>
    <script src="{{asset('ajax\meetings\meeting_delete_ajax.js')}}"></script>
    <script src="{{asset('ajax\appointments\appointment_delete_ajax.js')}}"></script>



    <!-- Calendar init -->
    <script>
        !function (l) {
            "use strict";

            function e() {
                this.$calendar = l("#calendar")
            }

            e.prototype.init = function () {
                var t = [
                    @foreach($vacations as $vacation)
                    {
                        title: "{{__('calendar.vacation_of')}}" + '{{$vacation->employee->first_name.' '.$vacation->employee->last_name}}',
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
                    @foreach($clientsAppointments as $clientAppointment)
                    {
                        title: "{{__('calendar.appointment_with_client')}} " + '{{$clientAppointment->client->name}}',
                        start: '{{$clientAppointment->datetime}}',
                        data: {
                                'type': 'client-appointment',
                                'client_appointment_id': {{$clientAppointment->id}},
                                'client_id': {{$clientAppointment->client_id}},
                                'datetime': '{{$clientAppointment->datetime}}',
                            },
                        className: "bg-warning"
                    },
                    @endforeach
                    @foreach($interviews as $interview)
                    {
                        title: "{{__('calendar.interview_with')}} " + '{{$interview->candidate->first_name.' '.$interview->candidate->last_name}}',
                        start: '{{$interview->datetime}}',
                        data: {
                            'type': 'interview',
                            'interview_id': {{$interview->id}},
                            'employee_id': {{$interview->employee_id}},
                            'candidate_id': {{$interview->candidate_id}},
                            'datetime': '{{$interview->datetime}}',
                        },
                        className: "bg-success"
                    },
                    @endforeach
                    @foreach($meetings as $meeting)
                    {
                        title: "{{__('calendar.meeting')}} " + ': {{$meeting->description}}',
                        start: '{{$meeting->start_datetime}}',
                        data: {
                            'type': 'meeting',
                            'meeting_id': {{$meeting->id}},
                            'description': '{{$meeting->description}}',
                            'employee_id': [@foreach($meeting->employees as $employee){{$employee->id}},@endforeach],
                            'start_datetime': '{{$meeting->start_datetime}}',
                        },
                        className: "bg-danger"
                    },
                    @endforeach
                    @foreach($appointments as $appointment)
                    {
                        title: "{{__('calendar.appointment')}} " + ': {{$appointment->description}}',
                        start: '{{$appointment->datetime}}',
                        data: {
                            'type': 'appointment',
                            'appointment_id': {{$appointment->id}},
                            'description': '{{$appointment->description}}',
                            'datetime': '{{$appointment->datetime}}',
                        },
                        className: "bg-primary"
                    },
                    @endforeach
                    ], a = this;
                a.$calendarObj = new FullCalendar.Calendar(a.$calendar[0], {
                    locale: "{{__('calendar.local')}}",
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
                    editable: false,
                    selectable: true,
                    // eventLimit: 1,
                    eventRender: function(info) {
                        if(!info.event.startEditable) {
                            $(info.el).css('cursor','pointer');
                            return;
                        }
                    },
                    dateClick: function (e) {
                        $('#appointment-datepicker').val(e.dateStr);
                        $('#appointment-modal').modal('show');
                    },
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
                            $('#number-of-days-label').text("{{__('calendar.number_of_days')}}: " + e.event.extendedProps.data.number_of_days);
                            $('#edit-vacation-modal').modal('show');
                        }
                        if (e.event.extendedProps.data.type === 'client-appointment'){
                            var url = '{{ route("client-appointments.update", ":id") }}';
                            var deleteUrl = '{{ route("client-appointments.destroy", ":id") }}';
                            url = url.replace(':id', e.event.extendedProps.data.client_appointment_id);
                            deleteUrl = deleteUrl.replace(':id', e.event.extendedProps.data.client_appointment_id);
                            $('#edit-client-appointment-form').attr('action', url);
                            $('#btn-delete-client-appointment').attr('url', deleteUrl);
                            $("#edit-client-appointment-select").val(e.event.extendedProps.data.client_id).change();
                            $('#edit-client-appointment-datepicker').val(e.event.extendedProps.data.datetime);
                            $('#edit-client-appointment-modal').modal('show');
                        }

                        if (e.event.extendedProps.data.type === 'interview'){
                            var url = '{{ route("interviews.update", ":id") }}';
                            var deleteUrl = '{{ route("interviews.destroy", ":id") }}';
                            url = url.replace(':id', e.event.extendedProps.data.interview_id);
                            deleteUrl = deleteUrl.replace(':id', e.event.extendedProps.data.interview_id);
                            $('#edit-interview-form').attr('action', url);
                            $('#btn-delete-interview').attr('url', deleteUrl);
                            $("#edit-interview-employees-select").val(e.event.extendedProps.data.employee_id).change();
                            $("#edit-interview-candidates-select").val(e.event.extendedProps.data.candidate_id).change();
                            $('#edit-interview-datepicker').val(e.event.extendedProps.data.datetime);
                            $('#edit-interview-modal').modal('show');
                        }

                        if (e.event.extendedProps.data.type === 'meeting'){
                            var url = '{{ route("meetings.update", ":id") }}';
                            var deleteUrl = '{{ route("meetings.destroy", ":id") }}';
                            url = url.replace(':id', e.event.extendedProps.data.meeting_id);
                            deleteUrl = deleteUrl.replace(':id', e.event.extendedProps.data.meeting_id);
                            $('#edit-meeting-form').attr('action', url);
                            $('#btn-delete-meeting').attr('url', deleteUrl);
                            $('#edit-meeting-description').val(e.event.extendedProps.data.description);
                            $("#edit-meeting-employees-select").val(e.event.extendedProps.data.employee_id);
                            $("#edit-meeting-employees-select").multiSelect("refresh");
                            $('#edit-start-meeting-datepicker').val(e.event.extendedProps.data.start_datetime);
                            $('#edit-meeting-modal').modal('show');
                        }

                        if (e.event.extendedProps.data.type === 'appointment'){
                            var url = '{{ route("appointments.update", ":id") }}';
                            var deleteUrl = '{{ route("appointments.destroy", ":id") }}';
                            url = url.replace(':id', e.event.extendedProps.data.appointment_id);
                            deleteUrl = deleteUrl.replace(':id', e.event.extendedProps.data.appointment_id);
                            $('#edit-appointment-form').attr('action', url);
                            $('#btn-delete-appointment').attr('url', deleteUrl);
                            $('#edit-appointment-description').val(e.event.extendedProps.data.description);
                            $('#edit-appointment-datepicker').val(e.event.extendedProps.data.datetime);
                            $('#edit-appointment-modal').modal('show');
                        }
                    },
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
        $('#btn-new-client-appointment').on('click', function (event) {
            $('#client-appointment-modal').modal('show');
        })
        $('#btn-new-interview').on('click', function (event) {
            $('#interview-modal').modal('show');
        })
        $('#btn-new-meeting').on('click', function (event) {
            $('#meeting-modal').modal('show');
        })
        $('#btn-new-appointment').on('click', function (event) {
            $('#appointment-modal').modal('show');
        })
    </script>

    <script>

        $('#add-vacation-select').select2({
            placeholder: "{{__('calendar.select_employee')}}",
        });
        $('#add-client-appointment-select').select2({
            placeholder: "{{__('calendar.select_client')}}",
        });
        $('#add-interview-employees-select').select2({
            placeholder: "{{__('calendar.select_responsible')}}",
        });
        $('#add-interview-candidates-select').select2({
            placeholder: "{{__('calendar.select_candidate')}}",
        });

        $('#edit-vacation-select').select2({
            placeholder: "{{__('calendar.select_employee')}}",
        });
        $('#edit-client-appointment-select').select2({
            placeholder: "{{__('calendar.select_employee')}}",
        });
        $('#edit-interview-employees-select').select2({
            placeholder: "{{__('calendar.select_responsible')}}",
        });
        $('#edit-interview-candidates-select').select2({
            placeholder: "{{__('calendar.select_candidate')}}",
        });

        $("#start-vacation-datepicker").flatpickr({
            altInput: true,
            altFormat: "Y-m-d",
            dateFormat: "Y-m-d"
        })
        $("#end-vacation-datepicker").flatpickr({
            altInput: true,
            altFormat: "Y-m-d",
            dateFormat: "Y-m-d"
        })
        $("#client-appointment-datepicker").flatpickr({
            altInput: true,
            enableTime: !0,
            altFormat: "Y-m-d H:i",
            dateFormat: "Y-m-d H:i"
        })
        $("#interview-datepicker").flatpickr({
            altInput: true,
            enableTime: !0,
            altFormat: "Y-m-d H:i",
            dateFormat: "Y-m-d H:i"
        })
        $("#start-meeting-datepicker").flatpickr({
            altInput: true,
            enableTime: !0,
            altFormat: "Y-m-d H:i",
            dateFormat: "Y-m-d H:i"
        })
        $("#appointment-datepicker").flatpickr({
            allowInput: true,
            enableTime: !0,
            altFormat: "Y-m-d H:i",
            dateFormat: "Y-m-d H:i"
        })

        $("#edit-start-vacation-datepicker").flatpickr({
            allowInput: true,
            dateFormat: "Y-m-d"
        })
        $("#edit-end-vacation-datepicker").flatpickr({
            allowInput: true,
            dateFormat: "Y-m-d"
        })
        $("#edit-client-appointment-datepicker").flatpickr({
            allowInput: true,
            enableTime: !0,
            dateFormat: "Y-m-d H:i"
        })
        $("#edit-interview-datepicker").flatpickr({
            allowInput: true,
            enableTime: !0,
            dateFormat: "Y-m-d H:i"
        })
        $("#edit-start-meeting-datepicker").flatpickr({
            allowInput: true,
            enableTime: !0,
            dateFormat: "Y-m-d H:i"
        })
        $("#edit-appointment-datepicker").flatpickr({
            allowInput: true,
            enableTime: !0,
            dateFormat: "Y-m-d H:i"
        })
    </script>

    <script>
        var vacation_delete_confirmation = '{{__('calendar.vacation_delete_confirmation')}}';
        var client_appointment_delete_confirmation = '{{__('calendar.client_appointment_delete_confirmation')}}';
        var interview_delete_confirmation = '{{__('calendar.interview_delete_confirmation')}}';
        var meeting_delete_confirmation = '{{__('calendar.meeting_delete_confirmation')}}';
        var appointment_delete_confirmation = '{{__('calendar.appointment_delete_confirmation')}}';
        var _delete = '{{__('calendar.delete')}}';
        var cancel = '{{__('calendar.cancel')}}';
        var deleted = '{{__('calendar.deleted')}}';
        var data_deleted = '{{__('calendar.data_deleted')}}';
        var canceled = '{{__('calendar.canceled')}}';
        var data_is_safe = '{{__('calendar.data_is_safe')}}';
    </script>

@endsection
