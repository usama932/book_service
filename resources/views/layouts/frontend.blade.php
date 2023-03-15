<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link href="{{asset('frontend/css/fontawesome_all.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- MAIN SITE STYLE SHEETS -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
     alpha/css/bootstrap.css" rel="stylesheet">
	  <link href="{{asset('frontend/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <title>Book in 60 seconds - Xtreme Cleanings</title>

</head>

<body class="d-flex flex-column min-vh-100 justify-content-center justify-content-md-between">

    <header>
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <ul class="header-top-list d-flex">
                            <li class="header-top-list-item">
                                <a href="tel:12334567890" class="header-top-list-item-link">
                                    <i class="fas fa-phone"></i>
                                    <span>1 (233) 456 7890</span>
                                </a>
                            </li>
                            <li class="header-top-list-item">
                                <a href="mailto:support@xtremecleanings" class="header-top-list-item-link">
                                    <i class="fas fa-envelope"></i>
                                    <span>support@xtremecleanings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="top-socials d-flex justify-content-end">
                            <li class="d-flex">
                                <a href="#">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li class="d-flex">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="d-flex">
                                <a href="#">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="d-flex">
                                <a href="#">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-top-menu d-none d-md-block">
            <div class="container-fluid container-lg">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="top-nav-menu d-flex">
                            <li class="top-nav-menu-item">
                                <a href="{{url('/login')}}" class="top-nav-menu-item-link">
                                    <span>LOGIN</span>
                                </a>
                            </li>
                            <li class="top-nav-menu-item">
                                <a href="" class="top-nav-menu-item-link">
                                    <span>Testimonials</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href="#">
                            <img alt="" src="{{asset('frontend/images/logo.png')}}" width="200"/>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <ul class="top-nav-menu d-flex">
                            <li class="top-nav-menu-item">
                                <a href="" class="top-nav-menu-item-link">
                                    <span>About Us</span>
                                </a>
                            </li>
                            <li class="top-nav-menu-item active">
                                <a href="{{url('/'.'#payment-form'  )}}" class="top-nav-menu-item-link">
                                    <span>BOOK IN 60 SECONDS</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-top-mobile d-block d-md-none">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-md py-0">
                        <div class="container-fluid">
                            <button class="navbar-toggler me-5" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <svg width="28" height="28" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 96C0 78.33 14.33 64 32 64H416C433.7 64 448 78.33 448 96C448 113.7 433.7 128 416 128H32C14.33 128 0 113.7 0 96zM0 256C0 238.3 14.33 224 32 224H416C433.7 224 448 238.3 448 256C448 273.7 433.7 288 416 288H32C14.33 288 0 273.7 0 256zM416 448H32C14.33 448 0 433.7 0 416C0 398.3 14.33 384 32 384H416C433.7 384 448 398.3 448 416C448 433.7 433.7 448 416 448z"/></svg>
                            </button>
                            <div class="col navbar-brand">
                                <img alt="" src="{{asset('frontend/images/logo.png')}}" width="181"/>
                            </div>
                            <div class="col collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/login')}}" class="">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="" class="">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="" class="">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{url('/'.'#payment-form'  )}}" class="">BOOK IN 60 SECONDS</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <main class="d-flex flex-column justify-content-start flex-grow-1">
    @yield('content')
    </main>

    <!-- footer Start-->
    <footer>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        © 2023 Xtreme Cleanings | All Rights Reserved
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer End-->

    <!-- Js -->
    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('frontend/js/sticky.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    
    <script>  
        @if(Session::has('success'))  
                toastr.success("{{ Session::get('success') }}");  
        @endif  
        @if(Session::has('info'))  
                toastr.info("{{ Session::get('info') }}");  
        @endif  
        @if(Session::has('warning'))  
                toastr.warning("{{ Session::get('warning') }}");  
        @endif  
        @if(Session::has('error'))  
                toastr.error("{{ Session::get('error') }}");  
        @endif  
    </script>  
    <script>
        var sticky = new Sticky('.selector');
        $(".datepicker").datepicker({
            autoclose: true,
            formatSubmit: 'yyyy-mm-dd',
            todayHighlight: true,
            showDropdowns: true,
        })
    </script>
    @stack('custom-scripts')
    
</body>

</html>