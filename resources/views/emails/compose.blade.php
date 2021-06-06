@extends('layouts.app')

@section('css')

    <!-- Summernote css -->
    <link href="{{asset('assets/libs/summernote/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @include('emails.menu.inbox-leftbar')

                    <div class="inbox-rightbar">

                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-light waves-effect"><i class="mdi mdi-archive font-18"></i></button>
                        </div>

                        <div class="mt-4">
                            <form action="{{route('emails.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <select class="form-control select2-multiple" name="users_id[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ...">
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->email}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject" name="subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="summernote" name="content">

                                    </textarea>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="mdi mdi-delete"></i></button>
                                        <button class="btn btn-primary waves-effect waves-light"> <span>Send</span> <i class="mdi mdi-send ml-2"></i> </button>
                                    </div>
                                </div>

                            </form>
                        </div> <!-- end card-->
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

    <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>

    <!-- Init js-->
    <script>
        $('.select2-multiple').select2();
    </script>

    <script>
        jQuery(document).ready(function(){
            $('.summernote').summernote({
                height: 230,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                // set focus to editable area after initializing summernote
            });

            $('.summernote').find('textarea').attr('name','mytextarea');
        });
    </script>

@endsection
