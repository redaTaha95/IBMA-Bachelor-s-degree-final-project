@extends('layouts.app')

@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <form action="{{route('candidates.show', $candidate->id)}}"  enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle mr-1"></i> {{__('candidate.general_information')}}</h5>
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                </div>
                            </form>
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
                                    <span class="timeline-sm-date">2018 - 06</span>
                                    <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                    <p>websitename.com</p>
                                    <p class="text-muted mt-2">Everyone realizes why a new common language
                                        would be desirable: one could refuse to pay expensive translators.
                                        To achieve this, it would be necessary to have uniform grammar,
                                        pronunciation and more common words.</p>

                                </li>
                                <li class="timeline-sm-item">
                                    <span class="timeline-sm-date">2012 - 15</span>
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

