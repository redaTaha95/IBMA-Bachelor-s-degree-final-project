@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-13 text-center">{{ __('navbar.contact_user') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            {{ __('navbar.image') }} :
                            @if(Auth::user()->employee->image)
                                <img src="{{asset('storage/employees/'.Auth::user()->employee->image)}}" alt="image" class="avatar-sm rounded-circle">
                            @else
                                <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-sm rounded-circle">
                            @endif
                            <br><br>
                        {{ __('navbar.firstname') }} : {{ Auth::user()->employee->first_name }} <br><br>
                            {{ __('navbar.lastname') }} : {{ Auth::user()->employee->last_name }} <br>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


