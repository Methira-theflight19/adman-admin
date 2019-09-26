@extends('layouts.master-without-nav')

@section('body')
<body class="bg-custom">
@endsection

@section('content')

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card ">
                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index">
                                        <span><img class="w-75" src="assets/images/company/logo.png" alt="" ></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                                </div>

                                {{ Form::open(['route' => 'frontend.auth.login', 'class' => 'form-horizontal']) }}

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-checkbox">
                                            {{ Form::checkbox('remember') }} {{ trans('labels.frontend.auth.remember_me') }}
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <!-- <button class="btn btn-blue btn-block" type="submit"> Log In </button> -->
                                        {{ Form::submit(trans('labels.frontend.auth.login_button'), ['class' => 'bg-custom-dark btn  btn-block', 'style' => 'margin-right:15px']) }}
                                    </div>

                                    {{ Form::close() }}

                                    
                                    <div id="app">
                                        <div class="mt-3">
                                            @include('includes.partials.messages')
                                        </div> 
                                    </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="{{route('frontend.auth.password.reset')}}" class="text-white-50 ml-1">Forgot your password?</a></p>
                                <p class="text-white-50">Don't have an account? <a  href="{{route('frontend.auth.register')}}" class="text-white ml-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
@endsection
@section('after-scripts')
    @if (config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif

    <script type="text/javascript">

        $(document).ready(function() {
            // To Use Select2
            Backend.Select2.init();
        });
    </script>
@endsection
