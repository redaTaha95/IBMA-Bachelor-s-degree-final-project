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
                            <li class="breadcrumb-item active">{{__('candidate.edit_candidate')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('candidate.edit_candidate')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('candidate.general_information')}}</h4>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <br>
                        <form action="{{route('candidates.update', $candidate->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.last_name')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="last_name" placeholder="{{__('candidate.last_name')}}" value="{{old('last_name', $candidate->last_name)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.cin')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="cin" placeholder="{{__('candidate.cin')}}" maxlength="8" value="{{old('cin', $candidate->cin)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.phone')}} *</label>
                                        <input type="text" class="form-control" data-toggle="input-mask" name="phone" placeholder="{{ __('candidate.example') }} : 0630-303030" data-mask-format="0000-000000" maxlength="14" value="{{old('phone', $candidate->phone)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.address')}}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="address" placeholder="{{__('candidate.address')}}" value="{{old('address',$candidate->address)}}">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.first_name')}}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="first_name" placeholder="{{__('candidate.first_name')}}" value="{{old('first_name', $candidate->first_name)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.birthday')}}</label>
                                        <input type="date" id="simpleinput" class="form-control" name="birthday" placeholder="{{__('candidate.birthday')}}" value="{{old('birthday', $candidate->birthday)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.email')}} *</label>
                                        <input type="email" id="simpleinput" class="form-control" name="email" placeholder="{{__('candidate.email')}}" value="{{old('email', $candidate->email)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('candidate.city')}}</label>
                                        <select id="select-city" class="form-control" name="city" data-value="{{ $candidate ? $candidate->city : old('city') }}">>
                                            <option value="Select-city" disabled selected>Sélectionner une ville</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Fès">Fès</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Salé">Salé</option>
                                            <option value="Meknès" >Meknès</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Oujda">Oujda</option>
                                            <option value="Kénitra#">Kénitra</option>
                                            <option value="Agadir">Agadir</option>
                                            <option value="Tétouan">Tétouan</option>
                                            <option value="Safi">Safi</option>
                                            <option value="Mohammédia">Mohammédia</option>
                                            <option value="Khouribga">Khouribga</option>
                                            <option value="El Jadida">El Jadida</option>
                                        </select>
                                    </div>
                                </div>
                                    <!-- end col -->
                            </div>
                            <!-- end row-->
                                <div class="row">
                                    <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{__('candidate.edit')}}</button>
                                    <a href="{{url('candidates')}}" class="btn btn-white btn-rounded waves-effect">{{__('candidate.cancel')}}</a>
                                </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    </div>

@endsection

@section('js')
    <!-- Plugins js -->
    <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
    <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>


    <script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('assets/libs/autonumeric/autoNumeric-min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>

    <script>
        $(function() {
            $("select").each(function (index, element) {
                const val = $(this).data('value');
                if(val !== '') {
                    $(this).val(val);
                }
            });
        })
    </script>
@endsection
