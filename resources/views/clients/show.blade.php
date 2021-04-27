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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
                            <li class="breadcrumb-item active">{{__('client.details_of_client')}}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{__('client.profile')}}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card-box text-center">
                    @if($client->logo)
                        <img src="{{asset('storage/clients/'.$client->logo)}}" class="rounded-circle avatar-lg img-thumbnail"
                             alt="profile-image">
                    @else
                        <img src="{{asset('assets/images/users/default_user.png')}}" class="rounded-circle avatar-lg img-thumbnail"
                             alt="profile-image">
                    @endif

                    <h4 class="mb-0">{{$client->name}}</h4>
                    <p class="text-muted">{{$client->domain}}</p>

                    <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Blank</button>
                    <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">{{__('client.contact')}}</button>

                    <div class="text-left mt-3">
                        <h4 class="font-13 text-uppercase">{{__('client.address')}} :</h4>
                        <p class="text-muted font-13 mb-3">
                            {{$client->address}}
                        </p>
                        <p class="text-muted mb-2 font-13"><strong>{{__('client.name')}} :</strong> <span class="ml-2">{{$client->name}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>{{__('client.phone')}} :</strong><span class="ml-2">{{$client->phone}}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">{{$client->email}}</span></p>

                        <p class="text-muted mb-1 font-13"><strong>{{__('client.location')}} :</strong> <span class="ml-2">{{$client->country}}</span></p>
                    </div>

                    <ul class="social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i
                                    class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                    class="mdi mdi-google"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                    class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i
                                    class="mdi mdi-github"></i></a>
                        </li>
                    </ul>
                </div> <!-- end card-box -->

                <div class="card-box">



                </div> <!-- end card-box-->

            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card-box">

                </div> <!-- end card-box-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div>
@endsection

@section('js')



@endsection
