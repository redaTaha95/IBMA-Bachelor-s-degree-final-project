@extends('emails.index')

@section('cont')


    <div class="mt-4">
        <h5 class="font-18">{{$message->email->subject}}</h5>

        <hr/>

        <div class="media mb-3 mt-1">
            <!-- <img class="d-flex mr-2 rounded-circle" src="../assets/images/users/user-2.jpg" alt="placeholder image" height="32"> -->
            <div class="media-body">
                <!-- <small class="float-right">Dec 14, 2017, 5:17 AM</small> -->
                <small class="float-right">{{$message->email->created_at->format('F d, Y, g:i A')}}</small>
                <h6 class="m-0 font-14">{{$message->email->employee->first_name}}&nbsp;
                    {{$message->email->employee->last_name}}</h6>
                <small class="text-muted">From: {{$message->employee->email}}</small>
            </div>
        </div>
        <p>{{$message->email->content}}</p>

    {{--<p>Hi Coderthemes!</p>
    <p>Clicking ‘Order Service’ on the right-hand side of the above page will present you with an order page. This service has the following Briefing Guidelines that will need to be filled before placing your order:</p>
    <ol>
        <li>Your design preferences (Color, style, shapes, Fonts, others) </li>
        <li>Tell me, why is your item different? </li>
        <li>Do you want to bring up a specific feature of your item? If yes, please tell me </li>
        <li>Do you have any preference or specific thing you would like to change or improve on your item page? </li>
        <li>Do you want to include your item's or your provider's logo on the page? if yes, please send it to me in vector format (Ai or EPS) </li>
        <li>Please provide me with the copy or text to display</li>
    </ol>

    <p>Filling in this form with the above information will ensure that they will be able to start work quickly.</p>
    <p>You can complete your order by putting your coupon code into the Promotional code box and clicking ‘Apply Coupon’.</p>
    <p><b>Best,</b> <br/> Graphic Studio</p>
    <hr/>--}}

    {{--<h5 class="mb-3">Attachments</h5>

    <div class="row">
        <div class="col-xl-4">
            <div class="card mb-1 shadow-none border">
                <div class="p-2">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar-sm">
                                                                        <span class="avatar-title bg-soft-primary text-primary rounded">
                                                                            .ZIP
                                                                        </span>
                            </div>
                        </div>
                        <div class="col pl-0">
                            <a href="javascript:void(0);" class="text-muted font-weight-bold">ubold-admin-design.zip</a>
                            <p class="mb-0">2.3 MB</p>
                        </div>
                        <div class="col-auto">
                            <!-- Button -->
                            <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                <i class="dripicons-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card mb-1 shadow-none border">
                <div class="p-2">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar-sm">
                                                                        <span class="avatar-title bg-soft-success text-success rounded">
                                                                            .JPG
                                                                        </span>
                            </div>
                        </div>
                        <div class="col pl-0">
                            <a href="javascript:void(0);" class="text-muted font-weight-bold">Dashboard-design.jpg</a>
                            <p class="mb-0">3.25 MB</p>
                        </div>
                        <div class="col-auto">
                            <!-- Button -->
                            <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                <i class="dripicons-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-xl-4">
            <div class="card mb-0 shadow-none border">
                <div class="p-2">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="avatar-sm">
                                                                        <span class="avatar-title bg-secondary rounded">
                                                                            .MP4
                                                                        </span>
                            </div>
                        </div>
                        <div class="col pl-0">
                            <a href="javascript:void(0);" class="text-muted font-weight-bold">Admin-bug-report.mp4</a>
                            <p class="mb-0">7.05 MB</p>
                        </div>
                        <div class="col-auto">
                            <!-- Button -->
                            <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                <i class="dripicons-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>--}}
    <!-- end row-->

        <div class="mt-5">
            <a href="" class="btn btn-secondary mr-2"><i class="mdi mdi-reply mr-1"></i> Reply</a>
            <a href="" class="btn btn-light">Forward <i class="mdi mdi-forward ml-1"></i></a>
        </div>

    </div>
    <!-- end .mt-4 -->


@endsection
