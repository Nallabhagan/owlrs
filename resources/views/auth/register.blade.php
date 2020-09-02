@extends('layouts.auth')
@section('head-tag')
    <title>OWLRS | LOGIN</title>
    <meta property="og:description" content="A platform for readers to click the best parts of what they read, and share with all of us." />
    <meta property="og:title" content="OWLRS | Click what You Read, Share What You Click" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://owlrs.com" />
    <meta property="og:image" content="{{ url('assets/img/cover_1600x460.jpg') }}" />
    <meta property="fb:app_id" content="298710931222304" />
@endsection
@section('content')

<!-- Main Wrapper -->
<div class="login-wrapper columns is-gapless">
    <!--Left Side (Desktop Only)-->
    <div class="column is-6 is-hidden-mobile hero-banner">
        <div class="hero is-fullheight is-login">
            <div class="hero-body">
                <div class="container">
                    <div class="left-caption">
                        <h2>Click what You Read, Share What You Click.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Right Side-->
    <div class="column is-6">
        <div class="hero form-hero is-fullheight">
            <!--Logo-->
            <div class="logo-wrap">
                <div class="wrap-inner">
                    <img src="{{ url('assets/img/logo.svg') }}" alt="">
                </div>
            </div>
            <!--Login Form-->
            <div class="hero-body">
                <div class="form-wrapper">
                    
                    <div class="login-form">
                        <!--Avatar-->
                        <div class="avatar">
                            <img src="{{ url('assets/img/logo.svg') }}" alt="">
                        </div>
                        <h1 class="has-text-centered is-size-3 mb-3 font-weight-bold">Sign In or Sign Up</h1>
                        <div class="field">
                            <div class="control">
                                <a href="{{ url('login/facebook') }}" class="button is-solid primary-button facebook-login font-weight-bold raised is-fullwidth">
                                    <i data-feather="facebook" class="mr-2"></i>Facebook
                                </a>
                               
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                               
                                <a href="{{ url('login/google') }}" class="button is-solid primary-button google-login font-weight-bold raised is-fullwidth">
                                    <i class="mdi mdi-google mt-1 mr-2"></i>
                                    Google
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection