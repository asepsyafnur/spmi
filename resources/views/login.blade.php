<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    
    <title>{{ config('app.name', 'LPM') }}</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Animation CSS -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    
    <!-- Color CSS -->
    <link href="{{ asset('css/colors/megna.css') }}" id="theme" rel="stylesheet">
    
    <style>
        .login-register {
            background: url("{{ asset('images/spmi.png') }}") no-repeat left center / cover !important;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>

    <section id="wrapper" class="login-register">
        <div class="login-box login-sidebar">
            <div class="white-box">
                <form class="form-horizontal form-material" id="loginform" action="{{ route('login.store') }}" method="POST">
                    @csrf
                    
                    <a href="javascript:void(0)" class="text-center db">
                        <img style="width: 50%;" src="{{ asset('images/logo/logo@2x.png') }}" alt="Home" />
                    </a>
                    <br>
                    <h5 class="text-center db">Selamat Datang di</h5>
                    <h4 class="text-center db">Sistem Penjaminan Mutu Internal</h4>
                    <h5 class="text-center db">POLITEKNIK <strong>BOSOWA</strong></h5>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('email') is-invalid @enderror" 
                                   type="email" 
                                   placeholder="Email" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control @error('password') is-invalid @enderror" 
                                   type="password" 
                                   placeholder="Password" 
                                   id="password" 
                                   name="password" 
                                   required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary px-0">
                                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember"> Remember Me </label>
                            </div>
                        </div>
                    </div>
                    
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <div class="form-group text-center m-t-10">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-sm btn-block text-uppercase waves-effect waves-light" type="submit">
                                Log In
                            </button>
                        </div>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="form-group m-t-10">
                            <div class="col-xs-12 text-center">
                                <a href="{{ route('password.request') }}" class="text-dark">
                                    <i class="fa fa-lock m-r-5"></i> Forgot your password?
                                </a>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </section>
    
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('plugins/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    
    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    
    <!-- Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    
    <!-- Toggle between login and recover form -->
    <script>
        $(document).ready(function() {
            // Toggle to recover form
            $('#to-recover').on('click', function() {
                $('#loginform').slideUp();
                $('#recoverform').fadeIn();
            });
            
            // Toggle back to login form
            $('#to-login').on('click', function() {
                $('#recoverform').fadeOut();
                $('#loginform').slideDown();
            });
        });
    </script>
</body>
</html>
