
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('project.title1') }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('project.title2') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('project.title3') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('project.introduction') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="text-lg-right mb-2"><!---->
                            <a href="{{url('export/projects/')}}" class="btn btn-info btn-rounded waves-effect waves-light mb-2">
                                <span class="btn-label"><i class="mdi mdi-download"></i></span>{{__('project.Export')}}
                            </a>
                            <a href="{{url('projects/create')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                <span class="btn-label"><i class="mdi mdi-account-plus"></i></span>{{ __('project.ajout') }}
                            </a>
                        </div>

                        <table id="data_table" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('project.cltid') }}</th>
                                <th>{{ __('project.logo') }}</th>

                                <th>{{ __('project.nom') }}</th>
                                <th>{{ __('project.desc') }}</th>
                               <!-- <th>Date début</th>-->
                                <!--<th>Date d'échéance</th>-->
                                <th>{{ __('project.Bud') }}</th>
                                <!--<th>teamMember</th>-->
                                <th style="width: 15%;">{{ __('project.act') }}</th>

                            </tr>
                            </thead>


                            <tbody>
                            @foreach($projects as $index => $project)
                                <tr>
                                    <td class="align-middle">{{$index + 1}}</td>
                                    <td class="align-middle">{{$project->client->name}}&nbsp;
                                        @if($project->client->logo)
                                            <img src="{{asset('storage/clients/'.$project->client->logo)}}" alt="image" class="avatar-sm rounded-circle">
                                        @else
                                            <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-sm rounded-circle">
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if($project->logo)
                                            <img src="{{asset('storage/projects/'.$project->logo)}}" alt="image" class="avatar-sm rounded-circle">
                                        @else
                                            <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-sm rounded-circle">
                                        @endif
                                    </td>

                                    <td class="align-middle">{{$project->name}}</td>
                                    <td class="align-middle">{{$project->description}}</td>
                                    <!--<td class="align-middle">{{$project->startDate}}</td>-->
                                   <!-- <td class="align-middle">{{$project->dueDate}}</td>-->
                                    <td class="align-middle">{{$project->budget}}</td>

                                    <td class="align-middle">
                                        <a href="{{route('projects.show', $project->id)}}" class="btn btn-success btn-sm waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a>
                                        <a href="{{route('projects.edit', $project->id)}}" class="btn btn-blue btn-sm waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                        <a href="{{url('projects/'.$project->id)}}" class="btn btn-danger btn-sm waves-effect waves-light delete-project"><i class="mdi mdi-trash-can-outline"></i></a>
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

    <script src="{{asset('ajax/projects/project_delete_ajax.js')}}"></script>

    @if(session('success'))
       <!-- <script>
            Swal.fire({
                position: "top-end",
                type: "success",
                title: "{{ __('project.AjoutSuccess') }}",
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
               title: '{{ __('project.AjoutSuccess') }}'
           })
       </script>
    @endif

    @if(session('update'))
       <!-- <script>
            Swal.fire({
                position: "top-end",
                type: "success",
                title: "{{ __('project.ModifSuccess') }}",
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
               title: '{{ __('project.ModifSuccess') }}'
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
                    "sInfo": "{{__('project.show_page')}} _PAGE_ {{__('project.in')}} _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "{{ __('project.Rech') }}...",
                    "sLengthMenu": "{{ __('project.Res') }} :  _MENU_",
                    "sEmptyTable": "{{ __('project.NoData') }}",
                    "sZeroRecords": "{{ __('project.NoErg') }}",
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

    <script>
        var delete_confirmation = '{{ __('project.warning_message') }}';
        var _delete = '{{ __('project.delete') }}';
        var cancel = '{{ __('project.btnannul') }}';
        var deleted = '{{ __('project.deleted') }}';
        var data_deleted = '{{ __('project.deleted_data') }}';
        var canceled = '{{ __('project.canceled') }}';
        var data_is_safe = '{{ __('project.secure_data') }}';
    </script>

    <script>
        $('.showDescriptionModal').on('click', function (event) {
            var data = $(this).attr('data');
            data = data.split('$$');
            $('#myCenterModalLabel').text(data[0]);
            $('#productDescription').text(data[1]);
            $('#centermodal').modal('show');
        })
    </script>

@endsection
