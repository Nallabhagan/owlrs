@extends('layouts.auth')
@section('head-tag')
<title>OWLRS | LOGIN</title>
@endsection
@section('content')

<div class="container">
    <!--Container-->
    <div class="login-container">
        <div class="columns is-vcentered">
            <div class="column is-6 image-column">
                <!--Illustration-->
                <img class="login-image" src="assets/img/illustrations/login/login.svg" alt="">
            </div>
            <div class="column is-6">

                <h2 class="form-title">Welcome Back</h2>
                <h3 class="form-subtitle">Enter your credentials to sign in.</h3>

                <!--Form-->
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-panel">
                        <div class="field">
                            <label>Email</label>
                            <div class="control">
                                <input id="email" type="email" class="input @error('email') is-danger @enderror" placeholder="Enter your email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                
                                @error('email')
                                    <strong class="help is-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="field">
                            <label>Password</label>
                            <div class="control">
                                <input id="password" type="password" class="input @error('email') is-danger @enderror" placeholder="Enter your password" name="password" required autocomplete="current-password">
                                @error('password')
                                    <strong class="help is-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="field is-flex">
                            <div class="switch-block">
                                <label class="f-switch">
                                    <input type="checkbox" class="is-switch">
                                    <i></i>
                                </label>
                                <div class="meta">
                                    <p>Remember me?</p>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            
                        </div>
                    </div>
                
                    <div class="buttons">
                        <button type="submit" class="button is-solid primary-button is-fullwidth raised">Login</button>
                    </div>

                    <div class="account-link has-text-centered">
                        <a href="{{ url('register') }}">Don't have an account? Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
