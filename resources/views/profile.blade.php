@extends('layouts.app')

@section('content')
    <div class="container"><br>
        <div class="col-lg-12 col-xl-6">
            <div class="card-box text-center">
                <!--<img src="../assets/images/users/user-1.jpg" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">-->

                @if(Auth::user()->employee->image)
                    <img src="{{asset('storage/employees/'.Auth::user()->employee->image)}}" alt="image" class="avatar-sm rounded-circle">
                @else
                    <img src="{{asset('assets/images/users/default_user.png')}}" alt="image" class="avatar-sm rounded-circle">
                @endif

                <h4 class="mb-0">{{ Auth::user()->employee->first_name }} {{ Auth::user()->employee->last_name }} <br><br></h4>
                <p class="text-muted">@webdesigner</p>

                <div class="text mt-3">
                    <h4 class="font-13 text-uppercase">{{ __('navbar.about_me') }} :</h4><br>
                    <p class="text-muted mb-2 font-13"><strong>{{ __('navbar.full_name') }} :</strong> <span class="ml-2">{{ Auth::user()->employee->first_name }}
                            {{ Auth::user()->employee->last_name }}  </span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{ __('navbar.mobile') }} :</strong><span class="ml-2">
                                               {{ Auth::user()->employee->phone }} </span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{ __('navbar.email') }} :</strong> <span class="ml-2 ">{{ Auth::user()->employee->email }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{ __('navbar.location') }} :</strong> <span class="ml-2">{{ Auth::user()->employee->address }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{ __('navbar.salary') }} :</strong> <span class="ml-2">{{ Auth::user()->employee->salary }}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>{{ __('navbar.hire_date') }} :</strong> <span class="ml-2">{{ Auth::user()->employee->hire_date }}</span></p>
                </div><br>

                <ul class="social-list list-inline mt-3 mb-0">
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                    </li>
                </ul>
            </div> <!-- end card-box -->

        </div>
    </div>
@endsection


