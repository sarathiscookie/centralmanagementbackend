<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Default scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Plugin scripts -->
    <script src="{{ mix('js/plugins.js') }}" defer></script>

    <!-- Each page scripts -->
    <script src="{{ mix('js/allTheme.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Default styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Plugin styles -->
    <link href="{{ mix('css/plugins.css') }}" rel="stylesheet">

    <!-- Each page styles -->
    <link href="{{ mix('css/allTheme.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="page login-page">
        <div class="container">
            <div class="form-outer text-center d-flex align-items-center">
                <div class="form-inner">
                    <div class="logo text-uppercase"><span></span><strong class="text-primary">Central Management</strong></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                    <form method="POST" action="{{ route('login') }}" class="text-left form-validate">

                        {{csrf_field()}}

                        <div class="form-group-material">
                            <input id="email" type="email" class="input-material {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus data-msg="Please enter your email">
                            <label for="email" class="label-material">{{ __('E-Mail Address') }}</label>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group-material">
                            <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material{{ $errors->has('password') ? ' is-invalid' : '' }}">
                            <label for="password" class="label-material">Password</label>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group text-center">
                            <button id="login" type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>
                        </div>

                        <a href="{{ route('password.request') }}" class="forgot-pass">{{ __('Forgot Your Password?') }}</a>
                    </form>
                </div>

                <div class="copyrights text-center">
                    <p><strong><a href="#" class="external">{{ config('app.name') }}</a> &copy; {{ date('Y') }}</strong> All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
