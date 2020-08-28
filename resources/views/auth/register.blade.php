@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
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
                <h3 class="form-subtitle">Enter your credentials to sign up.</h3>

                <!--Form-->
                <form class="login-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-panel">
                        <div class="field">
                            <label>Name</label>
                            <div class="control">
                                <input id="name" type="text" class="input @error('name') is-danger @enderror" placeholder="Enter your name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                
                                @error('name')
                                    <strong class="help is-danger">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>

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

                        <div class="field">
                            <label>Confirm Password</label>
                            <div class="control">
                                <input id="password-confirm" type="password" class="input" placeholder="Confirm your password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        
                        
                    </div>
                
                    <div class="buttons">
                        <button type="submit" class="button is-solid primary-button is-fullwidth raised mt-5">Register</button>
                    </div>

                    <div class="account-link has-text-centered">
                        <a href="{{ url('login') }}">Already have an account? Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
