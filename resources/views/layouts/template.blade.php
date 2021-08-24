<!doctype html>
<html lang="en">

  <head>
    <title>Libra Rentcar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('front/css/bootstrap-datepicker.css') }}">-->
    <link rel="stylesheet" href="{{ asset('front/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/fonts/flaticon/font/flaticon.css') }}">
    <!--<link rel="stylesheet" href="{{ asset('front/css/aos.css') }}">-->
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/iCheck/all.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css')}}">
    <!-- datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href=""><img src="{{ asset('front/images/logo.png') }}" alt="Image" class="img-fluid"></a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class=""><a href="{{ url('/') }}/booking" class="nav-link">Home</a></li>
                  <li><a href="{{ url('/') }}/booking/mobil" class="nav-link">Mobil</a></li>
                  <li><a href="{{ url('/') }}/booking/daftar" class="nav-link">Daftar</a></li>
                  <li><a href="{{ url('login') }}" class="nav-link">Admin</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

@yield('content')

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="footer-heading mb-4">About Us</h2>
                <p>Libra RentCar, Solusi transportasi murah yang ada di Kota Surabaya</p>
          </div>
          <div class="col-lg-8 ml-auto">
            <!--<div class="row">
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>-->
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('front/js/aos.js') }}"></script>

    <script src="{{ asset('front/js/main.js') }}"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <!-- jQuery -->
    <script src=" {{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Datepicker -->
    <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function(){
        $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
        changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
        $( "#datepickers" ).datepicker({ dateFormat: 'yy-mm-dd', changeYear: true,
        changeMonth: true, yearRange: '1945:'+(new Date).getFullYear() });
        });
    </script>

    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- cleave js -->
    <script src="{{ asset('cleave-js/dist/cleave.min.js') }}"></script>
    <!-- CHECKBOX -->
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>

    @stack('scripts-user')
    @include('sweetalert::alert')
    </body>

</html>

