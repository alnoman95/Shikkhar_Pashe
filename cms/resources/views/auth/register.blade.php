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
                    <h1>Sign Up  </h1>
                    <ul class="breadcrumb">
                        <li><a href="{{route('user.index')}}">Home</a></li>
                        <li class="active">Sign Up </li>
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

        <div class="signup1">Sign Up As A User/Donor</div>
        <div class="signup-form1 register-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="text"  placeholder="Your Name" class="input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br />
                <input type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your Email Address" >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br />
                <input type="text" class="input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required  placeholder="Your Username" >
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br />
                <select name="post" class="input" id="myselect">
                    <option value="">Select One</option>
                    <option id="toggle" value="student">Student</option>
                    <option value="volunteer">Volunteer</option>
                    <option value="donar">Donar</option>
                </select>
                
                <input placeholder="Your class" id="content" style="display:none;" type="text" class="input @error('class') is-invalid @enderror" name="class" autocomplete="current-class">
                @error('class')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br />  
                <textarea placeholder="Enter Your Address" name="address" id="address" class="input @error('address') is-invalid @enderror" cols="4" rows="4" required></textarea>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input placeholder="Enter Your Password" id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <br />
                <input id="password-confirm" placeholder="Confirm Password" type="password" class="input" name="password_confirmation" required autocomplete="new-password">             
                <br />
                <button type="submit" class="btn btn-primary">Create account</button>
                <a class="btn btn-link" href="{{ route('login') }}">
                    {{ __('Already have a account?') }}
                </a>
            </form>
        </div>

        <div class="login-form1">
        </div>

    </div>
</div>
@endsection
