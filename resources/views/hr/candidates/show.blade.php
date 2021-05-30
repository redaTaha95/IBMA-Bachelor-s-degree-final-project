@extends('layouts.app')

@section('css')
    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css"/>
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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Candidats</a></li>
                            <li class="breadcrumb-item active">{{__('candidate.profile')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('candidate.profile')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card-box">
                    <ul class="nav nav-pills navtab-bg nav-justified">
                        <li class="nav-item">
                            <a href="#informations" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                {{__('candidate.general_information')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#experiences" data-toggle="tab" aria-expanded="true" class="nav-link">
                                {{__('candidate.professional_experiences')}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#formations" data-toggle="tab" aria-expanded="false" class="nav-link">
                                {{__('candidate.formations')}}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="informations">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h5 class="mb-4 text-uppercase"><i
                                    class="mdi mdi-account-circle mr-1"></i> {{__('candidate.general_information')}}
                            </h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="header-title mb-0"
                                        style="display: inline-block">{{__('candidate.last_name')}}
                                        & {{__('candidate.first_name')}} :</h4>
                                    <p class="header-title mb-0 text-center"
                                       style="display: inline-block">{{$candidate->first_name.' '.$candidate->last_name}}</p></span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="header-title mb-0"
                                        style="display: inline-block">{{__('candidate.birthday')}} :</h4>
                                    <p class="header-title mb-0 text-center"
                                       style="display: inline-block">{{$candidate->birthday   }}</p></span>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="header-title mb-0" style="display: inline-block">{{__('candidate.cin')}}
                                        :</h4>
                                    <p class="header-title mb-0 text-center"
                                       style="display: inline-block">{{$candidate->cin}}</p></span>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="header-title mb-0"
                                        style="display: inline-block">{{__('candidate.phone')}} :</h4>
                                    <p class="header-title mb-0 text-center"
                                       style="display: inline-block">{{$candidate->phone}}</p></span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="header-title mb-0"
                                        style="display: inline-block">{{__('candidate.email')}} :</h4>
                                    <p class="header-title mb-0 text-center"
                                       style="display: inline-block">{{$candidate->email}}</p></span>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="header-title mb-0"
                                        style="display: inline-block">{{__('candidate.status')}} :</h4>
                                    <p class="header-title mb-0 text-center"
                                       style="display: inline-block">{{$candidate->status}}</p></span>
                                </div>

                                <div class="col-md-4">
                                    <h4 class="header-title mb-0" style="display: inline-block">{{__('candidate.city')}}
                                        :</h4>
                                    <p class="header-title mb-0 text-center"
                                       style="display: inline-block">{{$candidate->city}}</p></span>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <h5 class="mb-4 text-uppercase"><i
                                            class="mdi mdi-handshake mr-1"></i> {{__('recruitment_demand.recruitment_demands')}}
                                        </h5>
                                        <table id="data_table" class="table table-striped dt-responsive nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{__('recruitment_demand.post_name')}}</th>
                                                <th>{{__('recruitment_demand.number_of_profiles')}}</th>
                                                <th>{{__('recruitment_demand.date_of_demand')}}</th>
                                                <th>{{__('recruitment_demand.status_of_demand')}}</th>
                                                <th style="width: 15%;">Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($recruitmentDemands as $index => $recruitmentDemand)
                                                <tr>
                                                    <td class="align-middle">{{$index + 1}}</td>
                                                    <td class="align-middle">{{$recruitmentDemand->post_name}}</td>
                                                    <td class="align-middle">{{$recruitmentDemand->number_of_profiles}}</td>
                                                    <td class="align-middle">{{$recruitmentDemand->date_of_demand}}</td>
                                                    <td class="align-middle">{{$recruitmentDemand->status_of_demand}}</td>
                                                    <td class="align-middle">
                                                        @php
                                                            $exist = false;
                                                        @endphp

                                                        @foreach($recruitmentDemand->candidates as $recruitmentDemand_candidate)
                                                            @if($recruitmentDemand_candidate->id === $candidate->id)
                                                                @php
                                                                    $exist = true;
                                                                @endphp
                                                                <a href="{{url('disaffect/candidate/'.$candidate->id.'/demand/'.$recruitmentDemand->id)}}" class="btn btn-danger btn-sm waves-effect waves-light btn-block">Désaffecter</a>
                                                            @endif
                                                        @endforeach

                                                        @if($exist === false)
                                                            <a href="{{url('affect/candidate/'.$candidate->id.'/demand/'.$recruitmentDemand->id)}}" class="btn btn-success btn-sm waves-effect waves-light btn-block">Affecter</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="experiences">
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                                {{__('candidate.professional_experiences')}}</h5>

                            <ul class="list-unstyled timeline-sm">
                                <li class="timeline-sm-item">
                                    <span class="timeline-sm-date">2015 - 18</span>
                                    <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                    <p>Internship</p>
                                    <p class="text-muted mt-2">Everyone realizes why a new common language
                                        would be desirable: one could refuse to pay expensive translators.
                                        To achieve this, it would be necessary to have uniform grammar,
                                        pronunciation and more common words.</p>
                                </li>
                                <li class="timeline-sm-item">
                                    <span class="timeline-sm-date">2020 - 11</span>
                                    <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                    <p>Software Inc.</p>
                                    <p class="text-muted mt-2">If several languages coalesce, the grammar
                                        of the resulting language is more simple and regular than that of
                                        the individual languages. The new common language will be more
                                        simple and regular than the existing European languages.</p>
                                </li>
                                <li class="timeline-sm-item">
                                    <span class="timeline-sm-date">2010 - 12</span>
                                    <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                    <p>Coderthemes LLP</p>
                                    <p class="text-muted mt-2 mb-0">The European languages are members of
                                        the same family. Their separate existence is a myth. For science
                                        music sport etc, Europe uses the same vocabulary. The languages
                                        only differ in their grammar their pronunciation.</p>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-pane" id="formations">
                            <h5 class="mb-4 text-uppercase"><i class="fas fa-graduation-cap mr-1"></i>
                                {{__('candidate.formations')}}</h5>

                            <ul class="list-unstyled timeline-sm">
                                <li class="timeline-sm-item">
                                    <span class="timeline-sm-date">2020 - 2021</span>
                                    <h5 class="mt-0 mb-1">Licence d’Ingénierie de Conception et de Développement
                                        d'Applications</h5>
                                    <p class="text-uppercase">IT Learning / Fst Settat.</p>
                                </li>
                                <li class="timeline-sm-item">
                                    <span class="timeline-sm-date">2018 - 2020</span>
                                    <h5 class="mt-0 mb-1">Diplôme de Technicien Spécialisé (DTS) en Développement
                                        Informatique.</h5>
                                    <p class="text-uppercase">Institut Spécialisé de Gestion et d’Informatique
                                        (ISGI).</p>
                                </li>
                                <li class="timeline-sm-item">
                                    <span class="timeline-sm-date">2018</span>
                                    <h5 class="mt-0 mb-1">Baccalaureate.</h5>
                                    <p class="text-uppercase">Groupe Scolaire Belvédère.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
                    "sInfo": "{{__('datatable.show_page')}} _PAGE_ {{__('datatable.in')}} _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "{{__('datatable.search')}}...",
                    "sLengthMenu": "{{__('datatable.results')}} :  _MENU_",
                    "sEmptyTable": "{{__('datatable.no_data')}}",
                    "sZeroRecords": "{{__('datatable.search_failed')}}",
                    "sInfoFiltered":   "({{__('datatable.filtered_from')}} _MAX_ {{__('datatable.total_inputs')}})",
                    "infoEmpty": "{{__('datatable.no_entries_to_show')}}"
                },
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }],
                "stripeClasses": [],
                "lengthMenu": [5, 10, 20, 50],
                "pageLength": 5,
                "aaSorting": []
            } );
        } );
    </script>
@endsection

