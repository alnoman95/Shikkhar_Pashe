@extends('user.layouts.master') 
@section('title','Log In') 
@section('user-content')
<!-- Page Header -->
<div id="page-header">
    <!-- section background -->
    <div class="section-bg" style="background-image: url(user/img/background-2.jpg);"></div>
    <!-- /section background -->

    <!-- page header content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="header-content">
                    <h1>Log In </h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('user.index')}}">Home</a></li>
                        <li class="active">log in</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header content -->
</div>
<!-- /Page Header -->

<div class="wrapper1">
    <div class="container1">   
        <div class="signup1">Log In</div>
        <div class="signup-form1 login-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <label for="">Your Email:</label>
                <input placeholder="Enter Email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br />
                <label for="">Password:</label>
                <input placeholder="********" id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br />
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                <br />                
                <button type="submit" class="btn btn-primary">Log In</button>
                <br />
                <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('Or Create a account?') }}
                </a>
                <!-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif -->
            </form>    
        </div>
        <div class="login-form1">        
        </div>
    </div>
</div>
@endsection
