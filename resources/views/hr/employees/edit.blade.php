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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('employee.employee_folder') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('employee.update_page') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('employee.update_page') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('employee.information') }}</h4>

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
                        <form action="{{route('employees.update', $employee->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('employee.name') }} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="name" placeholder="{{ __('employee.name') }}" value="{{old('name', $employee->name)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('employee.phone') }} *</label>
                                        <!--<input type="tel" id="simpleinput" class="form-control" name="phone" placeholder="Téléphone" value="{{old('phone', $employee->phone)}}">-->
                                        <input type="text" class="form-control" data-toggle="input-mask" name="phone" placeholder="{{ __('employee.example') }} : 0630-303030" data-mask-format="0000-000000" maxlength="14" value="{{old('phone', $employee->phone)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('employee.email') }} *</label>
                                    <!--<input type="email" id="simpleinput" class="form-control" name="email" placeholder="Email" value="{{old('email', $employee->email)}}">-->
                                        <input type="email" id="email" class="form-control" name="email" placeholder="{{ __('employee.example') }} : ABC@gmail.com"  data-parsley-trigger="change" required="" data-parsley-id="7" value="{{old('email', $employee->email)}}">
                                        <ul class="parsley-errors-list" id="parsley-id-7" aria-hidden="true"></ul>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('employee.salary') }}</label>
                                        <!--<input type="text" id="simpleinput" class="form-control" name="salary" placeholder="{{ __('employee.salary') }}" value="{{old('salary', $employee->salary)}}">-->
                                        <input type="text" id="simpleinput" class="form-control" data-toggle="input-mask" name="salary" placeholder="{{ __('employee.salary') }}" data-mask-format="0000000000" data-reverse="true" maxlength="22" value="{{old('salary', $employee->salary)}}">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('employee.address') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="address" placeholder="{{ __('employee.address') }}" value="{{old('address', $employee->address)}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('employee.hire_date') }} *</label>
                                        <input class="form-control" type="date" id="example-date-input" name="hire_date" value="{{old('hire_date',$employee->hire_date)}}">
                                    </div>
                                    <div class="dropdown">

                                        <label for="role">{{ __('employee.role') }}</label>
                                        <select name="role" class="form-control">
                                            @foreach ($roles as $key => $value)
                                                @if($roleChecked==$key)
                                                    <option selected value={{$key}}>{{ $value }}</option>
                                                @else
                                                <option value={{$key}}>{{ $value }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('employee.logo') }}</label>
                                        <input type="file" data-plugins="dropify" name="logo" data-default-file="{{$employee->logo ? asset('storage/employees/'.$employee->logo) : ''}}"/>
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{ __('employee.update') }}</button>
                                <a href="{{url('employees')}}" class="btn btn-white btn-rounded waves-effect">{{ __('employee.cancel') }}</a>
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

    <!-- Plugins js -->
    <script src="{{asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
    <script src="{{asset('assets/libs/autonumeric/autoNumeric-min.js')}}"></script>

    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-masks.init.js')}}"></script>
    <!-- Init js-->
    <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>
@endsection
