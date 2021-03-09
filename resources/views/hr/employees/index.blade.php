@extends('layouts.app')

@section('css')

    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">IBMA</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('employee.employee_folder') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('employee.list') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('employee.list') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="text-lg-right mb-2">
                            <a href="{{url('employees/create')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                <span class="btn-label"><i class="mdi mdi-account-plus"></i></span>{{ __('employee.addEmployee') }}
                            </a>
                        </div>

                        <table id="data_table" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('employee.logo') }}</th>
                                <th>{{ __('employee.name') }}</th>
                                <th>{{ __('employee.phone') }}</th>
                                <th>{{ __('employee.email') }}</th>
                                <th style="width: 15%;">{{ __('employee.actions') }}</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($employees as $index => $employee)
                                <tr>
                                    <td class="align-middle">{{$index + 1}}</td>
                                    <td class="align-middle">
                                        @if($employee->logo)
                                            <img src="{{asset('storage/employees/'.$employee->logo)}}" alt="image" class="avatar-sm rounded-circle">
                                        @else
                                            <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-sm rounded-circle">
                                        @endif
                                    </td>
                                    <td class="align-middle">{{$employee->name}}</td>
                                    <td class="align-middle">{{$employee->phone}}</td>
                                    <td class="align-middle">{{$employee->email}}</td>
                                    <td class="align-middle">
                                        <a href="#" class="btn btn-success btn-sm waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a>
                                        <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-blue btn-sm waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                        <a href="{{url('employees/'.$employee->id)}}" class="btn btn-danger btn-sm waves-effect waves-light delete-employee"><i class="mdi mdi-trash-can-outline"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>
    <div id="warning_message" hidden>{{ __('employee.warning_message') }}</div>
    <div id="secure" hidden>{{ __('employee.secure_data') }}</div>
    <div id="delete_btn" hidden>{{ __('employee.delete') }}</div>
    <div id="deleted_data" hidden>{{ __('employee.deleted_data') }}</div>
    <div id="cancel" hidden>{{ __('employee.cancel') }}</div>
    <div id="canceled" hidden>{{ __('employee.canceled') }}</div>
    <div id="deleted" hidden>{{ __('employee.deleted') }}</div>
@endsection

@section('js')

    <!-- third party js -->
    <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

    <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- Sweet alert init js-->
    <script src="{{asset('assets/js/pages/sweet-alerts.init.js')}}"></script>
    <!-- delete of employee-->
    <script src="{{asset('ajax/employees/employee_delete_ajax.js')}}"></script>

    @if(session('success'))
        <script>
            Swal.fire({
                position: "top-end",
                type: "success",
                title: "{{ __('employee.addSuccessfully') }}",
                showConfirmButton: !1,
                timer: 1500
            })
        </script>
    @endif

    @if(session('update'))
        <script>
            Swal.fire({
                position: "top-end",
                type: "success",
                title: "{{ __('employee.updatedSuccessfully') }}",
                showConfirmButton: !1,
                timer: 1500
            })
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#data_table').DataTable( {
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                }, drawCallback: function () {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                },
                "oLanguage": {
                    "sInfo": "{{ __('employee.show_pages') }}",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "{{ __('employee.search') }}...",
                    "sLengthMenu": "{{ __('employee.results') }} :  _MENU_",
                    "sEmptyTable": "{{ __('employee.nothing_found') }}",
                    "sZeroRecords": "{{ __('employee.No_matching_records_found') }}",
                    "sInfoFiltered":   "({{ __('employee.filtered') }})",
                },
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }],
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7,
                "aaSorting": []
            } );
        } );
    </script>

@endsection
