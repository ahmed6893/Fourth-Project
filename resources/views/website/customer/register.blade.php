@extends('website.master')
@section('body')

    <body>
    <!--====== Login Part Start ======-->
    <section class="login-registration-wrapper pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div
                        class="login-registration-style-1 registration text-center mt-50"
                    >
                        <h1 class="heading-4 font-weight-500 title">
                            Create an Account
                        </h1>
                        <div class="login-registration-form pt-10">
                            <form action="#">
                                <div class="single-form form-default form-border text-left">
                                    <label>Full Name</label>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-input">
                                                <input type="text" placeholder="First Name" name="first_name"/>
                                                <i class="mdi mdi-account"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-input form">
                                                <input type="text" placeholder="Last Name" name="last_name"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-form form-default form-border text-left">
                                    <label>Email Address</label>
                                    <div class="form-input">
                                        <input type="email" placeholder="user@email.com" name="email"/>
                                        <i class="mdi mdi-email"></i>
                                    </div>
                                </div>
                                <div class="single-form form-default form-border text-left">
                                    <label>Phone Number</label>
                                    <div class="form-input">
                                        <input type="tel" pattern="01[0-9]{9}" required placeholder="e.g. 01XXXXXXXXX" name="phone"/>
                                        <i class="mdi mdi-phone"></i>
                                    </div>
                                </div>
                                <div class="single-form form-default form-border text-left">
                                    <label>Choose Password</label>
                                    <div class="form-input">
                                        <input
                                            id="password-3"
                                            type="password"
                                            placeholder="Password"
                                            name="password"
                                        />
                                        <i class="mdi mdi-lock"></i>
                                        <span
                                            toggle="#password-3"
                                            class="mdi mdi-eye-outline toggle-password"
                                        ></span>
                                    </div>
                                </div>
                                <div class="single-form">
                                    <button class="main-btn primary-btn" type="submit">Sign up</button>
                                </div>
                            </form>
                        </div>
                        <p class="login">
                            Have an account? <a href="{{ 'customer.login' }}">Log in</a>
                        </p>
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
                        <img src="assets/images/client-logo/uideck-logo.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="assets/images/client-logo/graygrids-logo.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="assets/images/client-logo/lineicons-logo.svg" alt="" />
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-logo-wrapper">
                        <img src="assets/images/client-logo/pagebulb-logo.svg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== Clients Logo Part Ends ======-->

    </body>

@endsection
