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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{__('product.products')}}</a></li>
                            <li class="breadcrumb-item active">{{__('product.edit_product')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('product.edit_product')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">{{__('product.add_product')}}}</h4>

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
                        <form action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('product.title')}} *</label>
                                        <input type="text" id="simpleinput" class="form-control" name="title" placeholder="{{__('product.title')}}" value="{{old('title', $product->title)}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('product.supplier')}}</label>
                                        <select id="inputState" name="supplier_id" class="form-control placeholder">
                                            <option selected disabled>{{__('product.choose')}}</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}" {{old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : ''}}>{{$supplier->full_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('product.description')}}</label>
                                        <textarea class="form-control" id="example-textarea" name="description" rows="8">{{old('description', $product->description)}}</textarea>
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="form-group mb-3">
                                        <label for="simpleinput">{{__('product.price')}}</label>
                                        <input id="touchsprinPrice" data-toggle="touchspin" type="number" data-bts-prefix="$" class="form-control" name="price" placeholder="{{__('product.price')}}" value="{{old('price', $product->price)}}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="simpleinput">Image</label>
                                        <input type="file" data-plugins="dropify" name="image" data-default-file="{{$product->image ? asset('storage/products/'.$product->image) : ''}}"/>
                                    </div>


                                </div> <!-- end col -->
                            </div>
                            <!-- end row-->
                            <div class="row">
                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">{{__('product.edit')}}</button>
                                <a href="{{url('products')}}" class="btn btn-white btn-rounded waves-effect">{{__('product.cancel')}}</a>
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

    <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

    <script>
        $("input[id='touchsprinPrice']").TouchSpin({
            min: 0,
            max: 999999999,
            initval: 0,
            step: 0.5,
            decimals: 2,
            stepinterval: 0.5,
            maxboostedstep: 10000000,
            prefix: '$'
        });
    </script>
@endsection
