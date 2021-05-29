
@extends('emails.index')

@section('cont')


    <div class="mt-3">
        <ul class="message-list">
            @foreach($messages as $message)
                <li class="{{!$message->email->status?'unread':''}}">
                    <div class="col-mail col-mail-1">
                        <div class="checkbox-wrapper-mail">
                            <input type="checkbox" id="chk1">
                            <label for="chk1" class="toggle"></label>
                        </div>
                        <span class="star-toggle far fa-star text-warning"></span>
                        <a href="{{url('emails/'.$message->id.'/read')}}" class="title">
                            {{$message->email->employee->first_name}}&nbsp;
                            {{$message->email->employee->last_name}}
                        </a>
                    </div>
                    <div class="col-mail col-mail-2">
                        <a href="" class="subject">
                            {{$message->email->subject}}&nbsp;&ndash;&nbsp;
                            <span class="teaser">{{$message->email->content}}</span>

                        </a>
                        <div class="date">{{$message->created_at->format('G:i a')}}</div>
                    </div>
                </li>
            @endforeach


            {{--<li>
                <div class="col-mail col-mail-1">
                    <div class="checkbox-wrapper-mail">
                        <input type="checkbox" id="chk3">
                        <label for="chk3" class="toggle"></label>
                    </div>
                    <span class="star-toggle far fa-star"></span>
                    <a href="" class="title">Randy, me (5)</a>
                </div>
                <div class="col-mail col-mail-2">
                    <a href="" class="subject">Last pic over my village &nbsp;&ndash;&nbsp;
                        <span class="teaser">Yeah i'd like that! Do you remember the video you showed me of your train ride between Colombo and Kandy? The one with the mountain view? I would love to see that one again!</span>
                    </a>
                    <div class="date">5:01 am</div>
                </div>
            </li>--}}
        </ul>
    </div>
    <!-- end .mt-4 -->
    <div class="row">
        <div class="col-7 mt-1">
            Showing 1 - 20 of 289
        </div>
        <div class="col-5">
            <div class="btn-group float-right">
                <button type="button" class="btn btn-light btn-sm"><i class="mdi mdi-chevron-left"></i></button>
                <button type="button" class="btn btn-info btn-sm"><i class="mdi mdi-chevron-right"></i></button>
            </div>
        </div>
    </div>
    <!-- end row--><!-- end col--><!-- end col-->


@endsection
