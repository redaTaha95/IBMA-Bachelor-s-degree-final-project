
@extends('layouts.app')

@section('css')

    <link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Sweet Alert-->
    <link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active"><a href="javascript: void(0);">IBMA</a></li>
                            <li class="breadcrumb-item active"><a href="javascript: void(0);">{{ __('sale.Sales') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('sale.List_sales') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('sale.list_sales') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="text-lg-right mb-2"><!---->
                            <a href="{{url('export/sales/')}}" class="btn btn-info btn-rounded waves-effect waves-light mb-2">
                                <span class="btn-label"><i class="mdi mdi-download"></i></span>{{__('sale.Export')}}
                            </a>
                            <a href="{{url('sales/create')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2">
                                <span class="btn-label"><i class="mdi mdi-account-plus"></i></span>{{ __('sale.add') }}
                            </a>
                        </div>

                        <table id="data_table" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('sale.product_id') }}</th>
                                <th>{{ __('sale.description') }}</th>

                                <th>{{ __('sale.price') }}</th>
                                <th>{{ __('sale.date') }}</th>
                                <th>{{ __('sale.quantity') }}</th>
                            <!--<th>{{ __('sale.total') }}</th>-->
                                <th style="width: 15%;">{{ __('sale.action') }}</th>

                            </tr>
                            </thead>


                            <tbody>
                            @foreach($sales as $index => $sale)
                                <tr>
                                    <td class="align-middle">{{$index + 1}}</td>
                                    <td class="align-middle">{{$sale->product->title}}&nbsp;
                                        @if($sale->product->logo)
                                            <img src="{{asset('storage/sales/'.$sale->product->logo)}}" alt="image" class="avatar-sm rounded-circle">
                                        @else
                                            <img src="{{asset('assets/images/products/default_product.png')}}" alt="image" class="avatar-sm rounded-circle">
                                        @endif
                                    </td>
                                    <td class="align-middle">{{$sale->description}}</td>
                                    <td class="align-middle">{{$sale->price}}</td>
                                    <td class="align-middle">{{$sale->date}}</td>
                                    <td class="align-middle">{{$sale->quantity}}</td>

                                    <td class="align-middle">
                                        <a href="{{route('sales.show', $sale->id)}}" class="btn btn-success btn-sm waves-effect waves-light"><i class="mdi mdi-eye-outline"></i></a>
                                        <a href="{{route('sales.edit', $sale->id)}}" class="btn btn-blue btn-sm waves-effect waves-light"><i class="mdi mdi-pencil"></i></a>
                                        <a href="{{url('sales/'.$sale->id)}}" class="btn btn-danger btn-sm waves-effect waves-light delete-sale"><i class="mdi mdi-trash-can-outline"></i></a>
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

    <!-- <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>-->

    <!-- Sweet alert init js-->
    <!-- <script src="{{asset('assets/js/pages/sweet-alerts.init.js')}}"></script>-->

    {{--file of delete client--}}

    <script src="{{asset('ajax/sales/sale_delete_ajax.js')}}"></script>

    @if(session('success'))
        <!-- <script>
            Swal.fire({
                position: "top-end",
                type: "success",
                title: "{{ __('sale.Add_Success') }}",
                showConfirmButton: !1,
                timer: 1500
            })
        </script>-->
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
                title: '{{ __('sale.Add_Success') }}'
            })
        </script>
    @endif

    @if(session('update'))
        <!-- <script>
            Swal.fire({
                position: "top-end",
                type: "success",
                title: "{{ __('sale.Edit_Success') }}",
                showConfirmButton: !1,
                timer: 1500
            })
            </script>-->
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
                title: '{{ __('sale.Edit_Success') }}'
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
                    "sInfo": "{{__('sale.show_page')}} _PAGE_ {{__('sale.in')}} _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "{{ __('sale.Search') }}...",
                    "sLengthMenu": "{{ __('sale.Result') }} :  _MENU_",
                    "sEmptyTable": "{{ __('sale.NoData') }}",
                    "sZeroRecords": "{{ __('sale.Not_save') }}",
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
        var delete_confirmation = '{{ __('sale.warning_message') }}';
        var _delete = '{{ __('sale.delete') }}';
        var cancel = '{{ __('sale.Button_cancel') }}';
        var deleted = '{{ __('sale.deleted') }}';
        var data_deleted = '{{ __('sale.deleted_data') }}';
        var canceled = '{{ __('sale.canceled') }}';
        var data_is_safe = '{{ __('sale.secure_data') }}';
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
