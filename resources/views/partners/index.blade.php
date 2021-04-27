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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('tradpartner.title1') }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('tradpartner.title2') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('tradpartner.title3') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('tradpartner.introduction') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="text-lg-right mb-2">
                            <a href="{{url('partners/create')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                <span class="btn-label"><i class="mdi mdi-account-plus"></i></span>{{ __('tradpartner.ajout') }}
                            </a>
                        </div>
                        <div class="button-list">
                            <button type="button" class="btn btn-dark btn-rounded waves-effect waves-light">{{ __('tradpartner.Export') }}</button>
                        </div><br>

                        <table id="data_table" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>{{ __('tradpartner.id') }}</th>
                                <th>{{ __('tradpartner.logo') }}</th>
                                <th>{{ __('tradpartner.nom') }}</th>
                                <th>{{ __('tradpartner.city') }}</th>
                                <!-- <th>Date début</th>-->
                                <!--<th>Date d'échéance</th>-->
                                <th>{{ __('tradpartner.inc') }}</th>
                                <!--<th>teamMember</th>-->
                                <th style="width: 15%;">{{ __('tradpartner.act') }}</th>

                            </tr>
                            </thead>


                            <tbody>
                            @foreach($partners as $index => $partner)
                                <tr>
                                    <td class="align-middle">{{$index + 1}}</td>
                                    <td class="align-middle">
                                        @if($partner->logo)
                                            <img src="{{asset('storage/partners/'.$partner->logo)}}" alt="image" class="avatar-sm rounded-circle">
                                        @else
                                            <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-sm rounded-circle">
                                        @endif
                                    </td>
                                    <td class="align-middle">{{$partner->name}}</td>
                                    <td class="align-middle">{{$partner->city}}</td>
                                <!--<td class="align-middle">{{$partner->description}}</td>-->
                                    <td class="align-middle">{{$partner->income}}</td>
                                <!--<td class="align-middle">{{$partner->NumberOfEmployees}}</td>-->
                                    <td class="align-middle">
                                        <a href="{{route('partners.show', $partner->id)}}" class="btn btn-success btn-sm waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a>
                                        <a href="{{route('partners.edit', $partner->id)}}" class="btn btn-blue btn-sm waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                        <a href="{{url('partners/'.$partner->id)}}" class="btn btn-danger btn-sm waves-effect waves-light delete-partner"><i class="mdi mdi-trash-can-outline"></i></a>
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

    <div id="warning_message" hidden>{{ __('tradpartner.warning_message') }}</div>
    <div id="secure" hidden>{{ __('tradpartner.secure_data') }}</div>
    <div id="delete_btn" hidden>{{ __('tradpartner.delete') }}</div>
    <div id="deleted_data" hidden>{{ __('tradpartner.deleted_data') }}</div>
    <div id="cancel" hidden>{{ __('tradpartner.btnannul') }}</div>
    <div id="canceled" hidden>{{ __('tradpartner.canceled') }}</div>
    <div id="deleted" hidden>{{ __('tradpartner.deleted') }}</div>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>>

    <!-- <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>-->

    <!-- Sweet alert init js-->
    <!-- <script src="{{asset('assets/js/pages/sweet-alerts.init.js')}}"></script>-->

    {{--file of delete client--}}

    <script src="{{asset('ajax/partners/partner_delete_ajax.js')}}"></script>

    @if(session('success'))
        <!-- <script>
            Swal.fire({
                position: "top-end",
                type: "success",
                title: "{{ __('tradpartner.AjoutSuccess') }}",
                showConfirmButton: !1,
                timer: 1500
            })
        </script>-->
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ __('tradpartner.AjoutSuccess') }}'
            })
        </script>
    @endif

    @if(session('update'))
        <!-- <script>
            Swal.fire({
                position: "top-end",
                type: "success",
                title: "{{ __('tradpartner.ModifSuccess') }}",
                showConfirmButton: !1,
                timer: 1500
            })
        </script>-->
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '{{ __('tradpartner.ModifSuccess') }}'
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
                    "sInfo": "Affichage de la page _PAGE_ sur _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "{{ __('tradprojet.Rech') }}...",
                    "sLengthMenu": "{{ __('tradpartner.Res') }} :  _MENU_",
                    "sEmptyTable": "{{ __('tradpartner.NoData') }}",
                    "sZeroRecords": "{{ __('tradpartner.NoErg') }}",
                    "sInfoFiltered":   "(filtré de _MAX_ entrées au total)",
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