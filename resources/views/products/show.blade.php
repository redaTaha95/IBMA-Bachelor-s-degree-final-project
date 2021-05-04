@extends('layouts.app')

@section('css')

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
                            <li class="breadcrumb-item active">{{__('product.details_of_product')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('product.details_of_product')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-5">

                            <div class="tab-content pt-0">
                                <div class="tab-pane active show" id="product-1-item">
                                    @if($product->image)
                                        <img src="{{asset('storage/products/'.$product->image)}}" alt="image" class="img-fluid mx-auto d-block rounded">
                                    @else
                                        <img src="{{asset('assets/images/products/default_product.png')}}" alt="image" class="img-fluid mx-auto d-block rounded">
                                    @endif
                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-7">
                            <div class="pl-xl-3 mt-3 mt-xl-0">
                                <h4 class="mb-3">{{$product->title}}</h4>
                                <p class="text-muted float-left mr-3">
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star text-warning"></span>
                                    <span class="mdi mdi-star"></span>
                                </p>
                                <p class="mb-4"><a href="" class="text-muted">( 36 Customer Reviews )</a></p>
                                <h6 class="text-danger text-uppercase">Soon</h6>
                                <h4 class="mb-4">Price : <span class="text-muted mr-2"></span> <b>${{$product->price}} USD</b></h4>
                                <h4><span class="badge bg-soft-success text-success mb-4">{{isset($product->supplier->full_name)? $product->supplier->full_name : __('product.unknown')}}</span></h4>
                                <p class="text-muted mb-4">{{$product->description}}</p>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i> Soon Soon Soon</p>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i> Soon Soon Soon</p>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i> Soon Soon Soon</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i> Soon Soon Soon</p>
                                            <p class="text-muted"><i class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i> Soon Soon Soon</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
        <!-- end row-->
    </div>

@endsection

@section('js')


@endsection
