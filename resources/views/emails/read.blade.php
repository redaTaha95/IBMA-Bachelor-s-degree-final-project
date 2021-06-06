@extends('layouts.app')

@section('css')

    <!-- Summernote css -->
    <link href="{{asset('assets/libs/summernote/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                            <li class="breadcrumb-item active">Inbox</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Inbox</h4>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="card-box">

                    @include('emails.menu.inbox-leftbar')

                    <div class="inbox-rightbar">

                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light waves-effect"><i class="mdi mdi-archive font-18"></i></button>
                        </div>

                        <div class="mt-4">
                            <h5 class="font-18">{{$email->subject}}</h5>

                            <hr/>

                            <div class="media mb-3 mt-1">
                                @if(isset($email->user->employee->image))
                                    <img class="d-flex mr-2 rounded-circle" src="{{asset('storage/employees/'.$email->user->employee->image)}}" alt="placeholder image" height="32">
                                @else
                                    <img class="d-flex mr-2 rounded-circle" src="{{asset('assets/images/users/default_user.png')}}" alt="placeholder image" height="32">
                                @endif
                                <div class="media-body">
                                    <small class="float-right">{{$email->created_at->toDayDateTimeString()}}</small>
                                    <h6 class="m-0 font-14">{{$email->user->name}}</h6>
                                    <small class="text-muted">From: {{$email->user->email}}</small>
                                </div>
                            </div>

                            {!! $email->content !!}
                            <hr/>

                            @foreach($responses as $response)
                                <div class="media mb-3 mt-1">
                                    @if(isset($response->user->employee->image))
                                        <img class="d-flex mr-2 rounded-circle" src="{{asset('storage/employees/'.$response->user->employee->image)}}" alt="placeholder image" height="32">
                                    @else
                                        <img class="d-flex mr-2 rounded-circle" src="{{asset('assets/images/users/default_user.png')}}" alt="placeholder image" height="32">
                                    @endif

                                    <div class="media-body">
                                        <small class="float-right">{{$response->created_at->toDayDateTimeString()}}</small>
                                        <h6 class="m-0 font-14">{{$response->user->name}}</h6>
                                        <small class="text-muted">From: {{$response->user->email}}</small>
                                    </div>
                                </div>

                                {!! $response->content !!}
                                <hr/>
                            @endforeach

                            <div class="mt-4">
                                <form action="{{route('responses.store')}}" method="post">
                                    @csrf
                                    <input type="text" name="email_id" value="{{$email->id}}" hidden>
                                    <div class="form-group">
                                    <textarea class="summernote" name="content">

                                    </textarea>
                                    </div>

                                    <div class="form-group m-b-0">
                                        <div class="text-right">
                                            <button class="btn btn-primary waves-effect waves-light"> <span>Replay</span> <i class="mdi mdi-reply mr-2"></i> </button>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                        <!-- end .mt-4 -->
                    </div>
                    <!-- end inbox-rightbar-->

                    <div class="clearfix"></div>
                </div> <!-- end card-box -->

            </div> <!-- end Col -->
        </div><!-- End row -->

    </div>

@endsection

@section('js')

    <!--Summernote js-->
    <script src="{{asset('assets/libs/summernote/summernote-bs4.min.js')}}"></script>

    <script>
        jQuery(document).ready(function(){
            $('.summernote').summernote({
                height: 120,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                // set focus to editable area after initializing summernote
            });

            $('.summernote').find('textarea').attr('name','mytextarea');
        });
    </script>

@endsection

