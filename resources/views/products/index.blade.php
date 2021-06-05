@extends('layouts.app')

@section('css')

    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

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
                            <li class="breadcrumb-item active">{{__('product.list_of_products')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('product.list_of_products')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="text-lg-right mb-2">
                            <a href="{{url('export/products/')}}" class="btn btn-info btn-rounded waves-effect waves-light mb-2">
                                <span class="btn-label"><i class="mdi mdi-download"></i></span>{{__('product.export')}}
                            </a>
                            <a href="{{url('products/create')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                <span class="btn-label"><i class="mdi mdi-account-plus"></i></span>{{__('product.add_product')}}
                            </a>
                        </div>

                        <table id="data_table" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>{{__('product.supplier')}}</th>
                                <th>{{__('product.title')}}</th>
                                <th>{{__('product.description')}}</th>
                                <th>{{__('product.price')}}</th>
                                <th style="width: 15%;">Actions</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($products as $index => $product)
                                <tr>
                                    <td class="align-middle">{{$index + 1}}</td>
                                    <td class="align-middle">
                                        @if($product->image)
                                            <img src="{{asset('storage/products/'.$product->image)}}" alt="image" class="avatar-sm rounded-circle">
                                        @else
                                            <img src="{{asset('assets/images/products/default_product.png')}}" alt="image" class="avatar-sm rounded-circle">
                                        @endif
                                    </td>
                                    <td class="{{isset($product->supplier->full_name) ? '' : 'text-danger'}} align-middle">
                                        {{isset($product->supplier->full_name) ? $product->supplier->full_name : __('product.unknown')}}
                                    </td>
                                    <td class="align-middle">{{$product->title}}</td>
                                    <td class="align-middle"><a href="Javascript:void(0)" data="{{$product->title. '$$' . $product->description}}" class="showDescriptionModal">{{strlen($product->description) > 30 ? Str::limit($product->description, 30).'...' : $product->description }}</a></td>
                                    <td class="align-middle">{{$product->price}}</td>
                                    <td class="align-middle">
                                        <a href="{{route('products.show', $product->id)}}" class="btn btn-success btn-sm waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a>
                                        <a href="{{route('products.edit', $product->id)}}" class="btn btn-blue btn-sm waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                        <a href="{{url('products/'.$product->id)}}" class="btn btn-danger btn-sm waves-effect waves-light delete-product"><i class="mdi mdi-trash-can-outline"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
    </div>

    <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myCenterModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p id="productDescription"></p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('js')

    <!-- third party js -->
    <script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>>

    {{--file of delete client--}}
    <script src="{{asset('ajax/products/product_delete_ajax.js')}}"></script>

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
                title: '{{__('product.product_added')}}'
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
                title: '{{__('product.product_updated')}}'
            })
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $('#data_table').DataTable( {
                language: {
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    }
                }, drawCallback: function () {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                },
                "oLanguage": {
                    "sInfo": "{{__('datatable.show_page')}} _PAGE_ {{__('datatable.in')}} _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "{{__('datatable.search')}}...",
                    "sLengthMenu": "{{__('datatable.results')}} :  _MENU_",
                    "sEmptyTable": "{{__('datatable.no_data')}}",
                    "sZeroRecords": "{{__('datatable.search_failed')}}",
                    "sInfoFiltered":   "({{__('datatable.filtered_from')}} _MAX_ {{__('datatable.total_inputs')}})",
                    "infoEmpty": "{{__('datatable.no_entries_to_show')}}"
                },
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }],
                "stripeClasses": [],
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 7,
                "aaSorting": []
            } );
        } );
    </script>

    <script>
        var delete_confirmation = '{{__('product.delete_confirmation')}}';
        var _delete = '{{__('product.delete')}}';
        var cancel = '{{__('product.cancel')}}';
        var deleted = '{{__('product.deleted')}}';
        var data_deleted = '{{__('product.data_deleted')}}';
        var canceled = '{{__('product.canceled')}}';
        var data_is_safe = '{{__('product.data_is_safe')}}';
    </script>

    <script>
        $('.showDescriptionModal').on('click', function (event) {
            var data = $(this).attr('data');
            data = data.split('$$');
            $('#myCenterModalLabel').text(data[0]);
            $('#productDescription').text(data[1]);
            $('#centermodal').modal('show');
        })
    </script>

@endsection
