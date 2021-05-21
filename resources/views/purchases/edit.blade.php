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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('purchase.Purchase') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('purchase.edit_Purchase') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('purchase.edit_purchase') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{ __('purchase.purchase_information') }}</h4>

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
                        <form action="{{route('purchases.update', $purchase->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">


                                    <div class="row">
                                        <div class="col-12">
                                            <div class="dropdown">

                                                <label for="product">{{ __('purchase.edit_product_id') }}</label>
                                                <select name="product_id" class="form-control">
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id}}" {{old('product_id', $product->id) == $product->product_id ? 'selected' : ' '}}>{{ $product->title }}</option>
                                                    @endforeach

                                                </select>
                                            </div>


                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('purchase.Edit_description') }}</label>
                                        <input type="text" id="simpleinput" class="form-control" name="description" placeholder="Description" value="{{old('description', $purchase->description)}}">
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('purchase.Edit_price') }}</label>
                                        <input type="number" id="simpleinput" class="form-control" name="price" placeholder="Prix" value="{{old('price', $purchase->price)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('purchase.Edit_date') }}</label>
                                        <input type="date" id="simpleinput" class="form-control" name="date" placeholder="Date" value="{{old('date', $purchase->date)}}">
                                    </div>


                                </div> <!-- end col -->

                                <div class="col-lg-6">


                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('purchase.Edit_quantity') }}</label>
                                        <input type="number" id="simpleinput" class="form-control" name="quantity" placeholder="Quantity" value="{{old('quantity', $purchase->quantity)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{ __('purchase.Edit_total') }}</label>
                                        <input type="number" id="simpleinput" class="form-control" name="total" placeholder="Total" value="{{old('total', $purchase->total)}}">
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{ __('purchase.Button_edit') }}</button>
                                <a href="{{url('purchases')}}" class="btn btn-white btn-rounded waves-effect">{{ __('purchase.Button_cancel') }}</a>
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
