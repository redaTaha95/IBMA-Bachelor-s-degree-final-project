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
                            <li class="breadcrumb-item active">{{__('supplier.edit_supplier')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('supplier.edit_supplier')}}</h4>
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
                        <form action="{{route('suppliers.update', $supplier->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.full_name')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="full_name" placeholder="{{__('supplier.full_name')}}" value="{{old('full_name', $supplier->full_name)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.address')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="address" placeholder="{{__('supplier.address')}}" value="{{old('address',$supplier->address)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.email')}} *</label>
                                        <input type="email" id="simpleinput" class="form-control" name="email" placeholder="{{__('supplier.email')}}" value="{{old('email', $supplier->email)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.city')}}</label>
                                        <select id="select-city" class="form-control" name="city" data-value="{{ old('city', $supplier->city) }}">
                                            <option value="Select-city" disabled selected>Sélectionner une ville</option>
                                            <option value="Casablanca" >Casablanca</option>
                                            <option value="Fès">Fès</option>
                                            <option value="Tanger" >Tanger</option>
                                            <option value="Marrakech" >Marrakech</option>
                                            <option value="Salé" >Salé</option>
                                            <option value="Meknès" >Meknès</option>
                                            <option value="Rabat" >Rabat</option>
                                            <option value="Oujda" >Oujda</option>
                                            <option value="Kénitra" >Kénitra</option>
                                            <option value="Agadir" >Agadir</option>
                                            <option value="Tétouan" >Tétouan</option>
                                            <option value="Safi">Safi</option>
                                            <option value="Mohammédia" >Mohammédia</option>
                                            <option value="Khouribga" >Khouribga</option>
                                            <option value="El Jadida">El Jadida</option>
                                        </select>
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.cin')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="cin" placeholder="{{__('supplier.cin')}}" maxlength="8" value="{{old('cin', $supplier->cin)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.phone')}} *</label>
                                        <input type="tel" id="simpleinput" class="form-control" name="phone" placeholder="{{__('supplier.phone')}}" value="{{old('phone', $supplier->phone)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.postal_code')}} </label>
                                        <input type="tel" id="simpleinput" class="form-control" name="postal_code" placeholder="{{__('supplier.postal_code')}}" value="{{old('postal_code', $supplier->postal_code)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('supplier.country')}} </label>
                                        <input type="tel" id="simpleinput" class="form-control" name="country" placeholder="{{__('supplier.country')}}" value="{{old('country', $supplier->country)}}">
                                    </div>

                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{__('supplier.edit')}}</button>
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
