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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('sale.sales') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('sale.Add_sale') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('sale.add_sale') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('sale.info_sale') }}</h4>

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
                        <form action="{{route('sales.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">


                                    <div class="dropdown">

                                        <label for="simpleinput">{{ __('sale.product_id') }}</label>
                                        <select name="product_id" class="form-control">
                                            <option value="" hidden>--- {{ __('sale.select_product') }} ---</option>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->title }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <br>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('sale.add_description') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="description" placeholder="Description" value="{{old('description')}}" required>
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('sale.add_price') }}</label>
                                        <input type="number" id="simpleinput" class="form-control" name="price" placeholder="Prix" value="{{old('price')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('sale.add_date') }}</label>
                                        <input type="date" id="simpleinput" class="form-control" name="date" placeholder="Date" value="{{old('date')}}">
                                    </div>



                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('sale.add_quantity') }}</label>
                                        <input type="number" id="simpleinput" class="form-control" name="quantity" placeholder="Quantity" value="{{old('quantity')}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('sale.add_total') }}</label>
                                        <input type="number" id="simpleinput" class="form-control" name="total" placeholder="Total" value="{{old('total')}}">
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{ __('sale.button_add') }}</button>
                                <a href="{{url('sales')}}" class="btn btn-white btn-rounded waves-effect">{{ __('sale.button_cancel') }}</a>
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
@endsection
