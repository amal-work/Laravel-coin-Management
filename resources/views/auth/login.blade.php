<!doctype html>
<html lang="en" >
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Hustlers</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('user_assets/images/favicon.ico')}}" />
      <link rel="stylesheet" href="{{asset('user_assets/css/libs.min.css')}}">      
      <link rel="stylesheet" href="{{asset('user_assets/css/login.css')}}">   

    </head>
    <body class="" data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
        <!-- loader Start -->
        <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>    </div>
        <!-- loader END -->
        <!-- <div style="background-image: url('{{asset('user_assets/images/auth/01.png')}}')" >   -->
        <div style="" >  
            <div class="wrapper">
                <section class="vh-100 bg-image">
                    <div class="container h-100">
                        <div class="row justify-content-center h-100 align-items-center">
                            <div class="col-md-5 mt-5">
                                <div class="card">
                                    <div class="card-body m-3">
                                        <div class="auth-form">
                                                <h3 class="text-center mb-4">Wealth at Your Fingertips</h3>
                                                <h5 class="text-center">Access Now!</h5>
                                                <form  method="POST" action="{{ route('login') }}">
                                                @csrf
                                                    <p></p>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="str_id" id="str_id" placeholder="ID" value="{{session('name')}}">
                                                        <label for="str_id">ID</label>
                                                    </div>
                                                    @error('str_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <div class="form-floating mb-2">
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{session('password')}}">
                                                        <label for="password">Password</label>
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    {{session(['captcha'=>random_int (1000,9999)])}}

                                                    <p>Captcha Code: <strong style="color: transparent;text-shadow: 0 2px 2px #fff;">{{session('captcha')}}</strong></p>
                                                    <div class="form-floating mb-2">
                                                        <input type="text" class="form-control" name="captcha" placeholder="Enter Captcha Code">
                                                        <label for="captcha">Enter Captcha</label>
                                                    </div>
                                                    @if (session('failed'))
                                                        <div class="alert alert-danger">
                                                            {{
                                                                session('failed')
                                                            }}
                                                        </div>
                                                    @endif
                                                    {{--<div class="d-flex justify-content-between  align-items-center flex-wrap">
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember"  id="remember"  {{ old('remember') ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <a href="{{ route('password.request') }}"></a>
                                                        </div>
                                                    </div>--}}
                                                    <div class="text-center">
                                                        @error('str_id')
                                                            <span class="invalid-feedback d-block pb-2" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                        <button type="submit" class="btn btn-success">{{ __('Login') }}</button>
                                                    </div>
                                                    <!-- <div class="text-center mt-3">
                                                        <p>or sign in with others account?</p>
                                                    </div>
                                                    <div class="d-flex justify-content-center ">
                                                        <ul class="list-group list-group-horizontal   list-group-flush">
                                                            <li class="list-group-item bg-transparent border-0">
                                                            <a href="#"><img src="{{asset('user_assets/images/brands/01.png')}}" class="img-fluid avatar avatar-30 avatar-rounded" alt="img60"></a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0">
                                                            <a href="#"><img src="{{asset('user_assets/images/brands/02.png')}}" class="img-fluid avatar avatar-30 avatar-rounded" alt="gm"></a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0">
                                                            <a href="#"><img src="{{asset('user_assets/images/brands/03.png')}}" class="img-fluid avatar avatar-30 avatar-rounded" alt="im"></a>
                                                            </li>
                                                            <li class="list-group-item bg-transparent border-0">
                                                            <a href="#"><img src="{{asset('user_assets/images/brands/04.png')}}" class="img-fluid avatar avatar-30 avatar-rounded" alt="li"></a>
                                                            </li>
                                                        </ul>
                                                    </div> -->
                                                </form>
                                                <div class="new-account mt-3 text-center">
                                                    <p>Unlock Your Riches <a class="" href="{{route('register')}}">Sign up</a></p>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
            
        <!-- Backend Bundle JavaScript -->
        <script src="{{asset('user_assets/js/libs.min.js')}}"></script>
        <!-- widgetchart JavaScript -->
        <script src="{{asset('user_assets/js/charts/widgetcharts.js')}}"></script>
        <!-- fslightbox JavaScript -->
        <script src="{{asset('user_assets/js/fslightbox.js')}}"></script>
        <!-- app JavaScript -->
        <script src="{{asset('user_assets/js/app.js')}}"></script>
        <!-- apexchart JavaScript -->
        <script src="{{asset('user_assets/js/charts/apexcharts.js')}}"></script>
    </body>
</html>