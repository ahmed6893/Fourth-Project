@extends('website.master')
@section('body')

    <body>
    <!--====== Login Part Start ======-->
    <section class="login-registration-wrapper pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="login-registration-style-2 mt-50">
                        <h1 class="heading-4 font-weight-500 title">Login</h1>
                        <div class="login-registration-form pt-10">
                                 @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                            <form action="{{route('customer.login')}}" method="POST">
                                @csrf
                                <div class="single-form form-default form-border">
                                    <label>Email Address or Phone</label>
                                    <div class="form-input">
                                        <input type="text" placeholder="user@email.com" name="email_phone"/>
                                        <i class="mdi mdi-email"></i>
                                    </div>
                                </div>
                                <div class="single-form form-default form-border">
                                    <label>Your Password</label>
                                    <div class="form-input">
                                        <input
                                            id="password-7"
                                            type="password"
                                            placeholder="Password"
                                            name="password"
                                        />
                                        <i class="mdi mdi-lock"></i>
                                        <span
                                            toggle="#password-7"
                                            class="mdi mdi-eye-outline toggle-password"
                                        ></span>
                                    </div>
                                </div>
                                <div
                                    class="login-checkbox-forget d-sm-flex justify-content-between align-items-center"
                                >
                                    <div class="single-checkbox checkbox-style-3">
                                        <input type="checkbox" id="login-7" />
                                        <label for="login-7"><span></span> </label>
                                        <p>Remember Me</p>
                                    </div>
                                    <a class="forget" href="#">Forget Password?</a>
                                </div>
                                <div class="single-form text-center">
                                    <button class="main-btn primary-btn" type="submit">Sign in</button>
                                </div>

                            </form>
                        </div>
                        <div class="text-center">
                            <p class="login">
                                Don’t have an account? <a href="{{route('customer.register')}}">Sign up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Login Part Ends ======-->

    <!--====== Clients Logo Part Start ======-->
    <section class="clients-logo-section pt-70 pb-70">
        <div class="container">
            <div class="row client-logo-active">
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/uideck-logo.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/graygrids-logo.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/lineicons-logo.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="{{asset('/')}}website/assets/images/client-logo/pagebulb-logo.svg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Clients Logo Part Ends ======-->

    </body>

@endsection
