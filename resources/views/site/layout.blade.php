<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/gijgo.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Orbitron&display=swap" rel="stylesheet">

    <style>
        .footer .footer_top .footer_widget ul li a:hover {
            background-color: {{$front_config['textcolor']}};
        }
    </style>

</head>
<body>
    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area" style="background-color:{{$front_config['bgcolor']}};">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="{{route('home')}}">
                                    <div style="text-align: center; font-family: 'Orbitron', sans-serif; color: #FFF; font-size: 40px; flex-direction: column;" class="d-flex">
                                        <img src="{{ asset('media/images').'/'.$front_config['logo']}}" style="width:100px;">
                                        {{-- <strong>P</strong>
                                        <span style="text-align: center; font-family: 'Orbitron', sans-serif; color: #FFF; font-size: 20px;">Pieno</span> --}}
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        @foreach ($front_menu as $menuslug => $menutitle)
                                            <li><a style="color:{{$front_config['textcolor']}};" href="@if($menuslug == '/') {{route('home')}} @else {{$menuslug}} @endif">{{$menutitle}}</a></li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        {{-- <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment">
                                <div class="book_btn d-none d-lg-block">
                                    <a  href="{{route('login')}}" target="_blanck">Login</a>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    @yield('content')

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top" style="background-color:{{$front_config['bgcolor']}}; color:{{$front_config['textcolor']}};">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="{{route('home')}}">
                                    <div style="text-align: center; font-family: 'Orbitron', sans-serif; color: #FFF; font-size: 40px; flex-direction: column;" class="d-flex">
                                        <img src="{{ asset('media/images').'/'.$front_config['logo']}}" style="width:100px;">
                                    </div>
                                </a>
                            </div>
                            <h2 style="color:{{$front_config['textcolor']}};">
                                {{$front_config['title']}}
                            </h2>
                            <p>
                                {{$front_config['subtitle']}}
                            </p>
                            <div class="socail_links">
                                <ul>
                                    @if($front_config['facebook'])
                                    <li>
                                        <a href="{{$front_config['facebook']}}" target="blank">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if($front_config['twitter'])
                                    <li>
                                        <a href="{{$front_config['twitter']}}" target="blank">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if($front_config['instagram'])
                                    <li>
                                        <a href="{{$front_config['instagram']}}" target="blank">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if($front_config['youtube'])
                                    <li>
                                        <a href="{{$front_config['youtube']}}" target="blank">
                                            <i class="fa fa-youtube"></i>
                                        </a>
                                    </li>
                                    @endif
                                    @if($front_config['linkedin'])
                                    <li>
                                        <a href="{{$front_config['linkedin']}}" target="blank">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                    {{-- Services --}}
                            </h3>
                            <ul>
                                {{-- <li><a href="#">Team management</a></li>
                                <li><a href="#">Collaboration</a></li>
                                <li><a href="#">Todo</a></li>
                                <li><a href="#">Events</a></li> --}}
                            </ul>

                        </div>
                    </div>
                    <div class="col-xl-2 col-md-6 col-lg-2">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                    {{-- Useful Links --}}
                            </h3>
                            <ul>
                                {{-- <li><a href="#">Pricing</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                    @if($front_config['email'] || $front_config['telefone'])
                                    CONTATOS
                                    @endif
                            </h3>
                            <ul>
                                @if($front_config['email'])
                                <li>
                                    <a href="mailto={{$front_config['email']}}">
                                        {{$front_config['email']}}

                                    </a>
                                </li>
                                @endif
                                @if($front_config['telefone'])
                                <li><a href="#">
                                        {{$front_config['telefone']}}
                                    </a>
                                </li>
                                @endif
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <br>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Websystem by <a href="https://cwrsdevelopment.com" target="_blank">CWRS tech</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--/ footer end  -->

    <!-- JS here -->
    <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/scrollIt.js')}}"></script>
    <script src="{{asset('assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/gijgo.min.js')}}"></script>

    <!--contact js-->
    <script src="{{asset('assets/js/contact.js')}}"></script>
    <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/mail-script.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>



