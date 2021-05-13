@extends('layouts.app')


@section('css')
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/dropify/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection


@section('content')

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('partner.title12') }}</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('partner.title13') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('partner.title14') }}</li>
                            </ol>
                        </div>
                        <h4 class="page-title">{{ __('partner.Details_Partners') }}</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-lg-6">
                                <form class="form-inline">
                                    <div class="form-group">
                                        <label for="inputPassword2" class="sr-only">{{ __('partner.search') }}</label>
                                        <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                    </div>
                                    <div class="form-group mx-sm-3">
                                        <label for="status-select" class="mr-2">{{ __('partner.sort') }}</label>
                                        <select class="custom-select" id="status-select">
                                            <option hidden>{{ __('partner.select') }}</option>
                                            <option>{{ __('partner.name') }}</option>
                                            <option selected="">{{ __('partner.City') }}</option>
                                            <option>{{ __('partner.Description') }}</option>
                                            <option>{{ __('partner.Inc') }}</option>
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <div class="col-lg-4">
                                <div class="text-lg-right mt-3 mt-lg-0">
                                   <!-- <button type="button" class="btn btn-danger waves-effect waves-light mr-1" ><i class="mdi mdi-plus-circle mr-1"></i>{{ __('partner.add_partner') }}</button>-->
                                       <a href="{{url('partners/create')}}" class="btn btn-danger waves-effect waves-light mr-1"><i class="mdi mdi-plus-circle mr-1"></i>
                                           {{ __('partner.add_partner') }}
                                       </a>
                                </div>
                            </div><!-- end col-->

                                <div class="text-lg-right mb-2"><!---->
                                    <a href="{{url('export/partners/')}}" class="btn btn-info btn-rounded waves-effect waves-light mb-2">
                                        <span class="btn-label"><i class="mdi mdi-download"></i></span>{{__('partner.Export')}}
                                    </a>

                            </div>

                        </div> <!-- end row -->
                    </div> <!-- end card-box -->
                </div><!-- end col-->
            </div>


            <div class="row">

                @foreach($partners as $index => $partner)
                <div class="col-lg-4">
                    <div class="card-box bg-pattern">
                        <div class="text-center">

                            <div class="align-middle">{{$index + 1}}</div>
                            <div class="align-middle">
                                @if($partner->logo)
                                    <img src="{{asset('storage/partners/'.$partner->logo)}}" alt="image" class="avatar-sm rounded-circle">
                                @else
                                    <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-sm rounded-circle">
                                @endif
                            </div>
                            <h4 class="mb-1 font-30"> {{$partner->name}}</h4>
                            <p class="text-muted  font-14"> {{$partner->city}}</p>
                        </div>

                        <p class="font-14 text-center text-muted">
                            {{$partner->description}}
                        </p>

                      <center>

                                <h5 class="font-weight-normal text-muted">{{ __('partner.Income') }}</h5>
                                <h4>{{$partner->income}}</h4>

                      </center>




                        <div class="text-center">
                            <a href="javascript:void(0);" class="btn btn-sm btn-light">{{ __('partner.more') }}</a>
                        </div><br/>

                        <center>
                        <div class="align-middle">
                            <a href="{{route('partners.edit', $partner->id)}}" class="btn btn-blue btn-sm waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                            <a href="{{url('partners/'.$partner->id)}}" class="btn btn-success btn-sm waves-effect waves-light delete-partner"><i class=" mdi mdi-trash-can-outline"></i></a>
                        </div>
                        </center>


                    </div> <!-- end card-box -->
                </div><!-- end col -->
                @endforeach
            </div><!-- end row -->


                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        {{ $partners->links() }}
                    </ul>
                </nav>

                <style>
                    .w-5{
                        display : none;
                    }
                </style>

            </div> <!-- container -->
        </div><!-- end content -->



    @endsection


    @section('js')

            <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>
            <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>


            <script src="{{asset('assets/js/pages/form-fileuploads.init.js')}}"></script>


        <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>



        <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>>
        <script src="{{asset('ajax/partners/partner_delete_ajax.js')}}"></script>


        @if(session('success'))
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
                    title: '{{ __('partner.Add_Success') }}'
                })
            </script>
        @endif

        @if(session('update'))
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
                    title: '{{ __('partner.Edit_Success') }}'
                })
            </script>
        @endif



        <script>
            var delete_confirmation = '{{ __('partner.warning_message') }}';
            var _delete = '{{ __('partner.delete') }}';
            var cancel = '{{ __('partner.Button_cancel') }}';
            var deleted = '{{ __('partner.deleted') }}';
            var data_deleted = '{{ __('partner.deleted_data') }}';
            var canceled = '{{ __('partner.canceled') }}';
            var data_is_safe = '{{ __('partner.secure_data') }}';
        </script>


    @endsection
