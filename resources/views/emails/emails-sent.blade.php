@extends('layouts.app')

@section('css')

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

                        <div class="mt-3">
                            <ul class="message-list">
                                @foreach($emails as $email)
                                    <li class="unread">
                                        <div class="col-mail col-mail-1">
                                            <div class="checkbox-wrapper-mail">
                                                <input type="checkbox" id="chk1">
                                                <label for="chk1" class="toggle"></label>
                                            </div>
                                            <span class="star-toggle far fa-star text-warning"></span>
                                            <a href="{{route('emails.show', $email->id)}}" class="title">{{$email->user->name}}</a>
                                        </div>
                                        <div class="col-mail col-mail-2">
                                            <a href="{{route('emails.show', $email->id)}}" class="subject">{{$email->user->name}} -
                                                <span class="teaser">{{$email->subject}}</span>
                                            </a>
                                            <div class="date">{{$email->created_at->shortRelativeDiffForHumans()}}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- end .mt-4 -->

                        <div class="row">
                            <div class="col-7 mt-1">
                                Showing 1 - 20 of 289
                            </div> <!-- end col-->
                            <div class="col-5">
                                <div class="btn-group float-right">
                                    <button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-chevron-left"></i></button>
                                    <button type="button" class="btn btn-info btn-sm"><i class="mdi mdi-chevron-right"></i></button>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                    </div>
                    <!-- end inbox-rightbar-->

                    <div class="clearfix"></div>
                </div> <!-- end card-box -->

            </div> <!-- end Col -->
        </div><!-- End row -->

    </div>

@endsection

@section('js')

@endsection
