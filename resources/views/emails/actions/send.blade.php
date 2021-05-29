
@extends('emails.index')

@section('cont')
    <div class="mt-4">
        <form action="{{url('emails/send')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="form-control" placeholder="To" id="receiver">
                <input type="hidden" name="receiver_id" id="receiver_id" value="">
                <input type="hidden" name="sender_id" id="sender_id" value="">
            </div>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject" name="subject">
            </div>
            <div class="form-group">
                <!-- <div class="summernote">
                    <h6>Hello Summernote</h6>
                    <ul>
                        <li>
                            Select a text to reveal the toolbar.
                        </li>
                        <li>
                            Edit rich document on-the-fly, so elastic!
                        </li>
                    </ul>
                    <p>
                        End of air-mode area
                    </p>

                </div> -->
                <textarea name="content">

                    </textarea>
            </div>

            <div class="form-group m-b-0">
                <div class="text-right">
                    {{--<button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="mdi mdi-content-save-outline"></i></button>
                    <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="mdi mdi-delete"></i></button>--}}
                    <button type="submit" class="btn btn-primary waves-effect waves-light"> <span>Send</span> <i class="mdi mdi-send ml-2"></i> </button>
                </div>
            </div>

        </form>
    </div> <!-- end card-->

    <!-- end inbox-rightbar-->

@endsection
