<!-- Left sidebar -->
<div class="inbox-leftbar">

    <a href="{{route('emails.create')}}" class="btn btn-danger btn-block waves-effect waves-light">Compose</a>

    <div class="mail-list mt-4">
        <a href="{{route('emails.index')}}" class="{{Route::currentRouteName() === 'emails.index' ? 'text-danger font-weight-bold' : ''}}">
            <i class="dripicons-inbox mr-2"></i>
            Inbox
            @if(Auth()->user()->received_emails->where('status', 0)->count() > 0)
                <span class="badge badge-soft-danger float-right ml-2">
                    {{Auth()->user()->received_emails->where('status', 0)->count()}}
                </span>
            @endif
        </a>
        <a href="javascript: void(0);"><i class="dripicons-star mr-2"></i>Starred</a>
        <a href="{{route('emails.sent')}}" class="{{Route::currentRouteName() === 'emails.sent' ? 'text-danger font-weight-bold' : ''}}"><i class="dripicons-exit mr-2"></i>Emails Envoyés</a>
        <a href="javascript: void(0);"><i class="dripicons-trash mr-2"></i>Trash</a>
        <a href="javascript: void(0);"><i class="dripicons-tag mr-2"></i>Important</a>
    </div>

</div>
<!-- End Left sidebar -->
