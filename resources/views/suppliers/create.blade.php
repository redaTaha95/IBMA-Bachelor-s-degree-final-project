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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Fournisseurs</a></li>
                            <li class="breadcrumb-item active">{{__('supplier.add_supplier')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('supplier.add_supplier')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('supplier.general_information')}}</h4>

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
                        <form action="{{route('suppliers.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.full_name')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="full_name" placeholder="{{__('supplier.full_name')}}" value="{{old('full_name')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.address')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="address" placeholder="{{__('supplier.address')}}" value="{{old('address')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="email">{{__('supplier.email')}} *</label>
                                        <input type="email" id="email" class="form-control" name="email" placeholder="e.g : ABC@gmail.com"  data-parsley-trigger="change" required="" data-parsley-id="7" value="{{old('email')}}">
                                        <ul class="parsley-errors-list" id="parsley-id-7" aria-hidden="true"></ul>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.city')}}</label>
                                        <select id="select-city" class="form-control" name="city">
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
                                            <option value="khouribga#">Khouribga</option>
                                            <option value="El Jadida">El Jadida</option>
                                        </select>
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.cin')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="cin" placeholder="{{__('supplier.cin')}}" maxlength="8" value="{{old('cin')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.phone')}} *</label>
                                        <input type="text" class="form-control" data-toggle="input-mask" name="phone" placeholder="{{ __('supplier.example') }} : 0630-303030" data-mask-format="0000-000000" maxlength="14" value="{{old('phone')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.postal_code')}} </label>
                                        <input type="text" id="simpleinput" class="form-control" name="postal_code" placeholder="{{__('supplier.postal_code')}}" value="{{old('postal_code')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.country')}}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="country" placeholder="{{__('supplier.country')}}" value="{{old('country')}}">
                                    </div>

                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{__('supplier.add')}}</button>
                                <a href="{{url('suppliers')}}" class="btn btn-white btn-rounded waves-effect">{{__('supplier.cancel')}}</a>
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

        $(document).ready(function()
        {
            var date = new Date();
            var day = date.getDate();
            var month = date.getMonth() + 1;
            var year = date.getFullYear();
            if (month < 10)
                month = "0" + month;
            if (day < 10)
                day = "0" + day;
            var today = year + "-" + month + "-" + day;
            $("#birthday").attr("value", today);
        });

    </script>
@endsection
