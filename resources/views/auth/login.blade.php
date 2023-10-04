<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Infinityhub</title> 
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
 <link href="{{asset('adminpanel')}}/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100" style="">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-5 col-md-5">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href=""> <h4> Infinityhub</h4></a>
        
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
            
                                    <div class="row mb-3">
                                        
            
                                        <div class="col-md-12">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('E.Mail') }}</label><br>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        
            
                                        <div class="col-md-12">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label><br>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row mb-0">
                                        <div class="col-md-8">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
            
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link d-none" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                               
                                <p class="mt-5 login-form__footer">Dont have account? <a href="{{route('register')}}" class="text-primary">Register</p>
                           
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('adminpanel')}}/plugins/common/common.min.js"></script>
    <script src="{{asset('adminpanel')}}/js/custom.min.js"></script>
    <script src="{{asset('adminpanel')}}/js/settings.js"></script>
    <script src="{{asset('adminpanel')}}/js/gleek.js"></script>
    <script src="{{asset('adminpanel')}}/js/styleSwitcher.js"></script>
</body>
</html>





