<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- css -->
    <link href="{{ URL::asset('assets/css/ltr.css') }}" rel="stylesheet">

</head>

<body>

<div class="wrapper">

    <!--=================================
preloader -->

    <div id="pre-loader">
        <img src="images/pre-loader/loader-01.svg" alt="">
    </div>

    <!--=================================
preloader -->

    <!--=================================
login-->

    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background: linear-gradient( #A4BC78,#E5E5E5);">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-9 login-fancy-bg bg"
                     style="background-image: url(assets/images/login-inner-bg.jpg);">
                    <div class="login-fancy">

                        <ul class="list-unstyled  pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#"> </a> </li>
                            <li class="list-inline-item"><a class="text-white" href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                    @if($type== 'student')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">Se connecter Student</h3>
                    @elseif($type== 'admin')

                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">Se connecter Admin</h3>
                    @endif

                        <form method="POST" action="{{route('login')}}">
                            @csrf

                            <div class="section-field mb-20">
                                <label class="mb-10" for="name">* Email</label>
                                <input id="email" type="email"  dir="ltr"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                                <input type="hidden" name="type" value="{{$type}}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>

                            <div class="section-field mb-20">
                                <label class="mb-10" for="Password">* Password </label>
                                <input id="password" type="password"  dir="ltr"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    @if($type== 'student')
                                    <a href="/register" class="float-left" >Register</a>

                                    <a href="#" class="float-right">? Mot de passe oublié</a>
                                    @endif
                                </div>
                            </div>
                            <br><br><br>
                            <button class="button" style="float: right"><span>Se connecter</span><i class="fa fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
login-->

</div>
<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script>
    var plugin_path = 'js/';
</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

</body>

</html>
