<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title> @yield('title') </title>

    <!-- Favicon  -->
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('css/core-style.css')}}">
    <link rel="stylesheet" href="{{asset('style.css')}}">

    <!-- Responsive CSS -->
    <link href="{{asset('css/responsive.css')}}" rel="stylesheet">

</head>
<body>
    <!-- Header Area Start -->
    <header class="header-area">
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Breaking News Area -->
                    <div class="col-12 col-md-6">
                        <div class="breaking-news-area">
                            <h5 class="breaking-news-title">Breaking news</h5>
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="#">Brexit breakthrough in Brussels comes after week of drama</a></li>
                                    <li><a href="#">Brexit breakthrough in Brussels</a></li>
                                    <li><a href="#">Brexit breakthrough in Brussels comes after week of drama</a></li>
                                    <li><a href="#">Brex comes after week of drama</a></li>
                                    <li><a href="#">Brexit breakthrough in Bweek of drama</a></li>
                                    <li><a href="#">Brexit bssels comes after week of drama</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Stock News Area -->
                    <div class="col-12 col-md-6">
                        <div class="stock-news-area">
                            <div id="stockNewsTicker" class="ticker">
                                <ul>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>0.18</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>8.60</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>13.60</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>0.18</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>8.60</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>13.60</h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>eur/usd</span>
                                                <span>1.1862</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>3.95</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>BTC/usd</span>
                                                <span>15.674.99</span>
                                            </div>
                                            <div class="stock-index plus-index">
                                                <h4>4.78</h4>
                                            </div>
                                        </div>
                                        <div class="single-stock-report">
                                            <div class="stock-values">
                                                <span>ETH/usd</span>
                                                <span>674.99</span>
                                            </div>
                                            <div class="stock-index minus-index">
                                                <h4>11.37</h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Middle Header Area -->
        <div class="middle-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <!-- Logo Area -->
                    <div class="col-12 col-md-4">
                        <div class="logo-area">
                            <a href="#"><img src="img/core-img/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <!-- Header Advert Area -->
                    <div class="col-12 col-md-8">
                        <div class="header-advert-area">
                            <a href="{{get_static_option('ads1_link')}}"><img src="img/bg-img/top-advert.png" alt="header-add"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Header Area -->
        <div class="bottom-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false"
                                    aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                                <div class="collapse navbar-collapse" id="gazetteMenu">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="{{route('index')}}">Today <span
                                                    class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Pages</a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{route('index')}}">Home</a>
                                                <a class="dropdown-item" href="{{route('catagory')}}">Catagory</a>
                                                <a class="dropdown-item" href="{{route('about-us')}}">About Us</a>
                                                <a class="dropdown-item" href="{{route('contact')}}">Contact</a>
                                            </div>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact')}}">Politics</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact')}}">Lifestyle</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact')}}">Travel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact')}}">Health</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact')}}">Entertainment</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('contact')}}">sport</a>
                                        </li> --}}
                                    </ul>
                                    <!-- Search Form -->
                                    <div class="header-search-form mr-auto">
                                        <form action="#">
                                            <input type="search" placeholder="Input your keyword then press enter..."
                                                id="search" name="search">
                                            <input class="d-none" type="submit" value="submit">
                                        </form>
                                    </div>
                                    <!-- Search btn -->
                                    <div id="searchbtn">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    @yield('home')

    <!-- Footer Area Start -->
    <footer class="footer-area bg-img background-overlay" style="background-image: url(img/bg-img/4.jpg);">
        <!-- Top Footer Area -->
        <div class="top-footer-area section_padding_100_70">
            <div class="container">
                <div class="row">
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">المنطفة</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">U.S.</a></li>
                                <li><a href="#">افريقيا</a></li>
                                <li><a href="#">اريكا</a></li>
                                <li><a href="#">اسيا</a></li>
                                <li><a href="#">الصين</a></li>
                                <li><a href="#">اوروبا</a></li>
                                <li><a href="#">الشرق الاوسط</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">Fashion</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">Election 2016</a></li>
                                <li><a href="#">Nation</a></li>
                                <li><a href="#">العالم</a></li>
                                <li><a href="#">فريقنا</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">السياسة</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">اعمال</a></li>
                                <li><a href="#">تسويق</a></li>
                                <li><a href="#">تقنية</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">خصائص</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">كرة القدم</a></li>
                                <li><a href="#">جولف</a></li>
                                <li><a href="#">تينيس</a></li>
                                <li><a href="#">سباق الدراحات</a></li>
                                <li><a href="#">سباق الخيول</a></li>
                                <li><a href="#">سباق التزلج</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">اسئلة شائعة</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">اعمال</a></li>
                                <li><a href="#">سفر</a></li>
                                <li><a href="#">وجهة</a></li>
                                <li><a href="#">طعام</a></li>
                                <li><a href="#">فنادق</a></li>
                                <li><a href="#">مطاعم</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                        <div class="single-footer-widget">
                            <div class="footer-widget-title">
                                <h4 class="font-pt">+المزيد</h4>
                            </div>
                            <ul class="footer-widget-menu">
                                <li><a href="#">الموظة</a></li>
                                <li><a href="#">تصميم</a></li>
                                <li><a href="#">همعمارية</a></li>
                                <li><a href="#">فن</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-12">
                        <div class="copywrite-text">
                        <p>
                            @php
                            $footer_copyright_text = get_static_option('site_footer_copyright');
                            $footer_copyright_text = str_replace('{copy}','&copy;',$footer_copyright_text);
                            $footer_copyright_text = str_replace('{year}',date('Y'),$footer_copyright_text);
                            @endphp
                            {!! $footer_copyright_text !!}
                        </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    </body>

    </html>
