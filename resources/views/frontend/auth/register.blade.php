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
                                    <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes less than a minute</p>
                                </div>

                                {{ Form::open(['route' => 'frontend.auth.register', 'class' => 'form-horizontal']) }}

                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        {{ Form::input('name', 'first_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.firstName')]) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="fullname">Last Name</label>
                                        {{ Form::input('name', 'last_name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.lastName')]) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        {{ Form::input('email', 'email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.email')]) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        {{ Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password')]) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Confirm Password</label>
                                        {{ Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.frontend.register-user.password_confirmation')]) }}
                                    </div>
                                    <div class="form-group">
                                        <div class="">
                                            <label class="control-label">
                                            {!! Form::checkbox('is_term_accept',1,false) !!}
                                            I accept {!! link_to_route('frontend.pages.show', trans('validation.attributes.frontend.register-user.terms_and_conditions').'*', ['page_slug'=>'terms-and-conditions']) !!} </label>
                                        </div>
                                    </div>

                                    @if (config('access.captcha.registration'))
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                {!! Form::captcha() !!}
                                                {{ Form::hidden('captcha_status', 'true') }}
                                            </div><!--col-md-6-->
                                        </div><!--form-group-->
                                    @endif

                                    <div class="form-group mb-0 text-center">
                                        <!-- <button class="btn btn-success btn-block" type="submit"> Sign Up </button> -->
                                        {{ Form::submit(trans('labels.frontend.auth.register_button'), ['class' => 'bg-custom-dark btn  btn-block']) }}
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
                                <p class="text-white-50">Already have account?  <a href="{{route('frontend.auth.login')}}" class="text-white ml-1"><b>Sign In</b></a></p>
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

