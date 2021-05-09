@extends('layouts.app')

@section('css')
    <link href="{{asset('assets/libs/@fullcalendar/core/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/daygrid/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/bootstrap/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/timegrid/main.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/@fullcalendar/list/main.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Calendrier</a></li>
                            <li class="breadcrumb-item active">Calendrier</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Calendrier</h4>
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
                                <button class="btn btn-lg font-16 btn-info btn-block" id="btn-new-vacation"><i class="mdi mdi-plus-circle-outline"></i> Ajouter un congé</button>

                            </div> <!-- end col-->

                            <div class="col-lg-9">
                                <div id="calendar"></div>
                            </div> <!-- end col -->

                        </div>  <!-- end row -->
                    </div> <!-- end card body-->
                </div> <!-- end card -->

                <!-- Add New Event MODAL -->
                <div class="modal fade" id="vacation-modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                <h5 class="modal-title" id="modal-title">Ajouter un nouveau congé</h5>
                            </div>
                            <div class="modal-body p-4">
                                <form id="add-vacation-form" action="{{route('vacations.store')}}" method="post" class="needs-validation" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">Employé</label>
                                                <select id="add-vacation-select" title="Séléctionner un employé" class="form-control selectpicker" name="employee_id" id="employeeValidation" required>
                                                    @foreach($employees as $employee)
                                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">La date de sortie</label>
                                                <input type="text" id="start-vacation-datepicker" name="start_date" class="form-control flatpickr-input active" placeholder="Date de sortie" readonly="readonly" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label class="control-label">La date d'entrée</label>
                                                <input type="text" id="end-vacation-datepicker" name="end_date" class="form-control flatpickr-input active" placeholder="Date d'entrée" readonly="readonly" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-12 text-right">
                                            <button type="button" class="btn btn-light mr-1" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-success">Ajouter</button>
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

    <script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Plugin js-->
    <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>

    <!-- Init js-->
    <script>

        $("#start-vacation-datepicker").flatpickr({
            dateFormat: "Y-m-d"
        })
        $("#end-vacation-datepicker").flatpickr({
            dateFormat: "Y-m-d"
        })
    </script>

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
                        title: "Congé de " + '{{$vacation->employee->name}}',
                        start: '{{$vacation->start_date}}',
                        end: '{{$vacation->end_date}}',
                        className: "bg-info"
                    },
                    @endforeach
                    ], a = this;
                a.$calendarObj = new FullCalendar.Calendar(a.$calendar[0], {
                    plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid", "list"],
                    slotDuration: "00:15:00",
                    minTime: "08:00:00",
                    maxTime: "19:00:00",
                    themeSystem: "bootstrap",
                    bootstrapFontAwesome: !1,
                    buttonText: {
                        today: "Today",
                        month: "Month",
                        week: "Week",
                        day: "Day",
                        list: "List",
                        prev: "Prev",
                        next: "Next"
                    },
                    defaultView: "dayGridMonth",
                    handleWindowResize: !0,
                    height: l(window).height() - 200,
                    header: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                    },
                    events: t,
                    eventClick: function (e) {
                        console.log('edit');
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
        $(document).ready(function () {
            $("#add-vacation-form").parsley().on("field:validated", function () {
                var e = 0 === $(".parsley-error").length;
                $(".alert-info").toggleClass("d-none", !e), $(".alert-warning").toggleClass("d-none", e)
            }).on("form:submit", function () {
                return !1
            })
        });
    </script>

@endsection
