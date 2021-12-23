@extends('templates.default-page')

@section('css')
   <link rel="stylesheet" href="{{ asset('public/css/app.css?v=').time() }}"> 
   <script src="{{ asset('public/js/app.js') }}" defer></script>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div id="back">
            <canvas id="canvas" class="canvas-back"></canvas>
            <div class="backRight">    
            </div>
            <div class="backLeft">
            </div>
        </div>
          
        <div id="slideBox">
            <div class="topLayer">
                <div class="left">
                    <div class="content">
                        <h2>Sign Up</h2>
                        <form id="form-signup" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="form-element form-stack">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" name="name" class="@error('email') is-invalid @enderror" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-element form-stack">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-element form-stack">
                                <label for="password-signup" class="form-label">Password</label>
                                <input id="password-signup" type="password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-element form-stack">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" name="password_confirmation" class="@error('password') is-invalid @enderror" required autocomplete="new-password">
                            </div>
                            <div class="form-element form-submit">
                                <button id="signUp" class="signup" type="submit" name="signup">{{ __('Register') }}</button>
                            </div>
                        </form>
                        <div class="form-switch-login">
                            <button id="goLeft" class="signup off" onsubmit="return false;">Log In</button> 
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="content">
                        <h2>Login</h2>
                        <form id="form-login" method="post" onsubmit="{{ route('login') }}">
                            @csrf
                            <div class="form-element form-stack">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" class=" @error('email') is-invalid @enderror"  >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
        
                            <div class="form-element form-stack">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" >
        
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-element form-submit">
                                <button id="logIn" class="login " type="submit" name="login">{{ __('Login') }}</button>
                            </div>
                            
                        </form>
                        <div class="form-switch-signup">
                            <button id="goRight" class="login off" name="signup">Sign Up</button>
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
