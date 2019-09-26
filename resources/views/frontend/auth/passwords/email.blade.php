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
                                        <span><img class="w-75" src="../assets/images/company/logo.png" alt="" ></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                                </div>

                                {{ Form::open(['route' => 'frontend.auth.password.email', 'class' => 'form-horizontal']) }}

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        {{ Form::submit(trans('labels.frontend.passwords.send_password_reset_link_button'), ['class' => 'bg-custom-dark btn btn-block']) }}
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
                                <p class="text-white-50">Back to <a href="{{route('frontend.auth.login')}}" class="text-white ml-1"><b>Log in</b></a></p>
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
