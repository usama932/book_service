<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link href="{{asset('frontend/js/css/fontawesome_all.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/js/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/js/css/lightbox.min.css')}}" rel="stylesheet">
    <!-- MAIN SITE STYLE SHEETS -->
    <link href="{{asset('frontend/js/css/main.css')}}" rel="stylesheet">

    <title>Booking Service</title>

</head>

<body class="d-flex flex-column min-vh-100 justify-content-center justify-content-md-between">

    <!--    Header Start -->
    @php
        use App\Models\Setting;
        $phone = Setting::where('name','phone')->first();
        $facebook = Setting::where('name','facebook')->first();
        $instagram = Setting::where('name','instagram')->first();
        $twitter = Setting::where('name','twitter')->first();
        $email = Setting::where('name','email')->first(); 
        $youtube = Setting::where('name','youtube')->first();
        $setting = Setting::where('name','banner_image')->first();
    @endphp 
    <header>
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <ul class="header-top-list d-flex">
                            <li class="header-top-list-item">
                                <a href="tel:12334567890" class="header-top-list-item-link">
                                    <i class="fas fa-phone"></i>
                                    <span>{{$phone->value ?? ''}}</span>
                                </a>
                            </li>
                            <li class="header-top-list-item">
                                <a href="mailto:{{$email->value ?? ''}}" class="header-top-list-item-link">
                                    <i class="fas fa-envelope"></i>
                                    <span>{{$email->value ?? ''}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="top-socials d-flex justify-content-end">
                            <li class="d-flex">
                                <a href="{{$facebook->value ?? ''}}">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li class="d-flex">
                                <a href="{{$twitter->value ?? ''}}">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="d-flex">
                                <a href="{{$instagram->value ?? ''}}">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="d-flex">
                                <a href="{{$youtube->value ?? ''}}">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-top-menu">
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
                                <a href="{{route('frontend')}}">
                                    <img alt="" src="{{asset('frontend/images/logo.png')}}" width="181"/>
                                </a>
                            </div>
                            <div class="col collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                                <ul class="navbar-nav top-nav-menu ">
                                
                                    <li class="nav-item top-nav-menu-item @if(Route::current()->getName() == 'aboutus') active @endif">
                                        <a class="nav-link top-nav-menu-item-link " href="{{route('aboutus') }}" class="">About Us</a>
                                    </li>
                                    <li class="nav-item top-nav-menu-item @if(Route::current()->getName() == 'galleries') active @endif">
                                        <a class="nav-link top-nav-menu-item-link" href="{{route('galleries')}}" class="">Gallery</a>
                                    </li>
                                    <li class="nav-item top-nav-menu-item @if(Route::current()->getName() == 'testimonial') active @endif">
                                        <a class="nav-link top-nav-menu-item-link" href="{{route('testimonial')}}" class="">Testimonials</a>
                                    </li>
                                    <li class="nav-item top-nav-menu-item @if(Route::current()->getName() == 'frontend') active @endif">
                                        <a class="nav-link top-nav-menu-item-link " href="{{url('/'.'#payment-form'  )}}" class="">BOOK IN 60 SECONDS</a>
                                    </li>
                                    <li class="nav-item top-nav-menu-item">
                                        <a class="nav-link top-nav-menu-item-link @if(Route::current()->getName() == 'login') active @endif" href="{{route('login')}}" class="">LOGIN</a>
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
    <script src="{{asset('frontend/js/lightbox.min.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    
    <script src="{{asset('frontend/js/js/isotope.pkgd.min.js')}}"></script>
    <script>
        /*** gallery isotope Start  ***/
        window.onload = (event) => {
            var $grid = $('.filters_items').isotope({
                itemSelector: '.filters_item',
                percentPosition: true,
            });
            // change is-checked class on buttons
            var $buttonGroup = $('.filters_btns');
                $buttonGroup.on( 'click', 'li', function( event ) {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                var $button = $( event.currentTarget );
                $button.addClass('is-checked');
                var filterValue = $button.attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });
        };
        /*** gallery isotope End  ***/
    </script>
    
</body>

</html>