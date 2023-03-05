<!DOCTYPE html>
<html lang="en-US">


<!-- Mirrored from theme.dsngrid.com/droow/one-page-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Feb 2023 17:31:01 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>{{ $setting->meta_title }}</title>
	<meta name="description" content="{{ $setting->meta_description }}">
	<meta name="keywords" content="{{ $setting->meta_keywords }}">

    <!-- Font Google -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700&amp;display=swap" rel="stylesheet">

    <!--Favicon-->
	<link rel="icon" type="image/png" href="{{ url('storage/'.$setting->favicon) }}">
    <!-- custom styles (optional) -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />
    <link href="{{ url('assets/css/plugins.css?v='.env("APP_VERSION"))}}" rel="stylesheet" />
    <link href="{{ url('assets/css/style.css?v='.env("APP_VERSION"))}}" rel="stylesheet" />
</head>

<body class="dsn-effect-scroll dsn-ajax" data-dsn-mousemove="true">

    <div class="preloader">
        <div class="preloader-after"></div>
        <div class="preloader-before"></div>
        <div class="preloader-block">
            <div class="title"><img src="{{ url('storage/'.$setting->slider_logo).'?v='.env('APP_VERSION') }}" width="200" /></div>
            <div class="percent">0</div>
            <div class="loading">loading...</div>
        </div>
        <div class="preloader-bar">
            <div class="preloader-progress"></div>
        </div>
    </div>

    <!-- Nav Bar -->
    <div class="dsn-nav-bar">
        <div class="site-header">
            <div class="extend-container">
                <div class="inner-header">
                    <div class="main-logo">
                        <a href="{{ url('/') }}">
                            <img class="dark-logo" src="{{ url('storage/'.$setting->logo).'?v='.env('APP_VERSION') }}" alt="" width="100" />
                            <img class="light-logo" src="{{ url('storage/'.$setting->logo).'?v='.env('APP_VERSION') }}" alt="" width="100" />
                        </a>
                    </div>
                </div>
                <nav class=" accent-menu main-navigation">
                    <ul class="extend-container">
                        <li><a href="tel:{{ $setting->phone }}"><i class="fas fa-phone"></i> {{ $setting->phone }}</a></li>
                        <!-- <li><a href="tel:{{ $setting->fax }}"><i class="fas fa-fax"></i> {{ $setting->fax }}</a></li> -->
                        <!-- <li><a href="mailto:{{ $setting->email }}"><i class="far fa-envelope"></i> {{ $setting->email }}</a></li> -->
                        <li><a href="https://vvol.briskbase.com/volunteer-detail"><i class="far fa-user"></i> Register as Volunteer</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Nav Bar -->
    <div class="vlt-fixed-socials">
            @if($setting->facebook_link)
            <a href="{{$setting->facebook_link}}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
            </a>
            @endif
            @if($setting->twitter_link)
            <a href="{{$setting->twitter_link}}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
</svg>
            </a>
            @endif
            @if($setting->linkedin_link)
            <a href="{{$setting->linkedin_link}}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                </svg>
            </a>
            @endif
            @if($setting->youtube_link)
            <a href="{{$setting->youtube_link}}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
                </svg>
            </a>
            @endif
    </div>

    <main class="main-root">
        <div id="dsn-scrollbar">
            <header>
                <div class="headefr-fexid headefr-fexid-onepage" data-dsn-header="project">
                    <div class="bg has-top-bottom" id="dsn-hero-parallax-img" data-dsn-ajax="img">
                        <div class=" " data-dsn="video" data-overlay="3">
                            <video class="bg-image cover-bg dsn-video" poster="{{url('assets/img/map-half1.png?v='.env("APP_VERSION"))}}" autoplay loop
                                muted playsinline>
                                <!-- <source src="http://theme.dsngrid.com/video/videos.mp4" type="video/mp4"> -->
                                Your browser does not support HTML5 video.
                            </video>
                        </div>
                    </div>

                    <div class="project-page__inner">
                        <div class="h-100">
                            <div class="row justify-content-center align-items-center h-100">
                                <div class="project-title" id="dsn-hero-parallax-title">
                                    <!-- <img class="white animate-updown1" src="{{ url('storage/'.$setting->slider_logo).'?v='.env('APP_VERSION') }}" alt="Microsite" width="300"> -->
                                    <div class="title-text-header">
                                        <span class="title-text-header-inner">
                                            <span>{{ $page->slider }}</span>
                                        </span>
                                    </div>
                                    <div>
                                        <div>
                                            <button style="background: transparent;">Location</button>
                                            <button style="background: transparent;">Interest</button>
                                            <button style="background: transparent;">Skills</button>
                                        </div>
                                        <div>
                                            <input type="text" class="form-control" placeholder="Enter Location, Topic etc" style="border: 1px solid #ddd;width: 60%;min-height: 60px !important;padding: 0 30px;">
                                            <div class="mt-4 link-custom">
                                                <a href="javascript:;" id="search-now">Search Now</a>
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="wrapper">
                <section class="" style="background: url({{ url('assets/img/map-black1.png?v='.env('APP_VERSION')) }});margin: 0;background-size: contain;background-position: center center;background-repeat: no-repeat;" id="Location">

                        <div class="row" id="map-location">
                            <div class="col-lg-12">
                                <div class="intro-content-text1" style="height: 800px;">
                                    <div class="map-area" >
                                        <div id="googleMap" style="width:100%;height:800px"></div>
                                        <!-- <div id="viewDiv" style="padding: 0;margin: 0;height: 100%;width: 100%;"></div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                <section class="intro-about section-margin">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="intro-content-text text-center">

                                    <h2 data-dsn-grid="move-section"  data-dsn-animate="text" data-dsn-move="-30" data-dsn-duration="100%"
                                        data-dsn-opacity="1.2" data-dsn-responsive="tablet" style="text-align:center;">
                                        {!! $page->about_title !!}
                                    </h2>

                                    <div data-dsn-animate="text">{!! $page->about_body !!}</div>

                                    <!-- <h6 data-dsn-animate="text">SALVADOR DALI</h6> -->
                                    <!-- <small data-dsn-animate="text">Digital Artisit</small> -->

                                    <div class="exper" style="margin-top:20px;">
                                        <img src="{{ url('storage/'.$page->about_signature) }}" data-dsn-animate="up" alt="signature" width="200">

                                        <!-- <h4 data-dsn-animate="up">YEARS OF <br> DIGITAL EXPERIENCE</h4> -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="background-mask">
                        <div class="background-mask-bg"></div>
                        <div class="img-box">
                            <div class="img-cent" data-dsn-grid="move-up">
                                <div class="img-container">
                                    <img data-dsn-y="30%" src="{{ url('assets/img/bgg.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div> -->
                </section>

                <div class="box-seat box-seat-full section-margin">
                    <div class="container-fluid">
                        <div class="inner-img" data-dsn-grid="move-up">
                            <img data-dsn-y="30%" src="{{ url('storage/'.$page->company_video_image) }}" alt="">
                        </div>
                        <div class="pro-text" data-dsn-animate="up">
                            <h3>{!! $page->company_title !!}</h3>
                            <p>{!! $page->company_description !!}</p>
                            <div class="link-custom">
                                <a class="image-zoom " href="{{ $page->company_video }}" target="_blank" data-dsn="parallax" data-fancybox data-type="iframe" data-preload="false" data-width="800">
                                    <span>Watch Video</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="our-work work-under-header  section-margin" data-dsn-col="3">
                    <!-- <div class="container">
                        <div class="one-title">
                            <div class="title-sub-container">
                                <p class="title-sub">Our Work</p>
                            </div>
                            <h2 class="title-main">Featured Projects</h2>
                        </div>
                    </div> -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9 offset-lg-3">
                                <div class="work-container">
                                    <div class="slick-slider">
                                        @foreach($videos as $video)
                                        <div class="work-item slick-slide">
                                            <img class="has-top-bottom" src="{{ url('storage/'.$video->image) }}" alt="">
                                            <div class="item-border"></div>
                                            <div class="item-info">
                                                <a href="{{ $video->url }}" target="_blank" data-dsn-grid="move-up" class="effect-ajax1" data-fancybox="gallery" data-type="iframe" data-preload="false" data-width="800">

                                                    <!-- <h5 class="cat">Photography</h5>
                                                    <h4>Nile - Kabutha</h4> -->
                                                    <span><span>Watch Video</span></span>
                                                </a>

                                            </div>
                                        </div>
                                        @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="intro-hero section-margin">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="intro-content-text text-center">

                                    <h2 data-dsn-grid="move-section"  data-dsn-animate="text" data-dsn-move="-30" data-dsn-duration="100%"
                                        data-dsn-opacity="1.2" data-dsn-responsive="tablet" style="text-align:center;">
                                        {!! $page->hero_title !!}
                                    </h2>

                                    <div data-dsn-animate="text">{!! $page->hero_body !!}</div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="background-mask">
                        <div class="background-mask-bg"></div>
                        <div class="img-box">
                            <div class="img-cent" data-dsn-grid="move-up">
                                <div class="img-container">
                                    <img data-dsn-y="30%" src="{{ url('assets/img/bgg.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div> -->
                </section>

                <div class=" box-gallery-vertical section-padding">
                    <div class="mask-bg"></div>
                    <div class="container">
                        <div class="row align-items-center h-100">
                            <div class="col-lg-6 ">
                                <div class="box-im" data-dsn-grid="move-up">
                                    <img class="has-top-bottom" src="{{ url('storage/'.$page->intro_video_image) }}" alt=""
                                        data-dsn-move="20%">
                                </div>
                            </div>

                            <div class="col-lg-6">


                                <div class="box-info">

                                    <div class="vertical-title" data-dsn-animate="up">
                                        <h2>{!! $page->intro_title !!}</h2>
                                    </div>

                                    <div data-dsn-animate="up">{!! $page->intro_description !!}</div>

                                    <div class="link-custom" data-dsn-animate="up">
                                        <a class="image-zoom effect-ajax1" href="{{ $page->intro_video }}" data-dsn="parallax" data-fancybox data-type="iframe" data-preload="false" data-width="800">
                                            <span>Watch Video</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 link-custom text-center">
                                <a href="https://www.firmengruppe-cfuchs.de/" target="_blank" >Zur Firmengruppe CFuchs</a>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <footer class="footer">
                <div class="container">


                    <div class="copyright">
                        <div class="text-center">
                            <p>{!! $setting->copyright_text !!}</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!-- Wait Loader -->
    <div class="wait-loader">
        <div class="loader-inner">
            <div class="loader-circle">
                <div class="loader-layer"></div>
            </div>
        </div>
    </div>
    <!-- // Wait Loader -->


    <!-- cursor -->
    <div class="cursor">

        <div class="cursor-helper cursor-view">
            <span></span>
        </div>

        <div class="cursor-helper cursor-close">
            <span>Close</span>
        </div>

        <div class="cursor-helper cursor-link"></div>
    </div>
    <!-- End cursor -->

    <!-- Optional JavaScript -->
    <script src="{{ url('assets/js/jquery-3.1.1.min.js?v='.env("APP_VERSION")) }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?language=en&v=beta&key=AIzaSyANJ03ykQk3sW_Osu4QRzuygNep9KiubH8"></script>
    <script src="{{ url('assets/js/plugins.js?v='.env("APP_VERSION")) }}"></script>
    <script src="{{ url('assets/js/dsn-grid.js?v='.env("APP_VERSION")) }}"></script>
    <script src="{{ url('assets/js/custom.js?v='.env("APP_VERSION")) }}"></script>

    <script src="{{ url('assets.bk/scripts/vlt-plugins.min.js?v='.env("APP_VERSION")) }}"></script>
	<script src="{{ url('assets.bk/scripts/vlt-helpers.js?v='.env("APP_VERSION")) }}"></script>
	<script src="{{ url('assets.bk/scripts/vlt-controllers.js?v='.env("APP_VERSION")) }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script>
      //  JavaScript will go here
      Fancybox.bind("[data-fancybox]", {
  // Your options go here
});
    </script>

    <script>
        var locationPins = {!! json_encode($pins) !!};
        var lat = '{{ $setting->lat }}'
        var lng = '{{ $setting->lng }}'
    </script>

	<script src="{{ url('assets.bk/scripts/map.js?v='.env("APP_VERSION")) }}"></script>
    <style>
        .gm-style-iw.gm-style-iw-c {
            background: #000;
        }
        .gmnoprint .gm-style-cc {
            display: none !important;
        }
        #googleMap img[alt="Google"] {
            display: none !important;
        }
        .vlt-fixed-socials {
            position: fixed;
            bottom: 50px;
            z-index: 999;
            left: 50px;
        }
        .vlt-fixed-socials a {
            color: #fff;
            margin-right: 20px;
        }

    </style>
    <script>
        $(function(){
            $("#search-now").click(function() {
                $(".scroll-content").attr("style", "transform: translate3d(0px, -"+$("#map-location").offset().top+"px, 0px);");
                // $("#dsn-hero-parallax-img").attr("style", "transform: translate(0%, 30%) translate3d(0px, 0px, 0px);");
                // $(".project-title").attr("style", "visibility: hidden; opacity: 0; top: 30%; transform: translate3d(0px, 0px, 0px);");

                $("html, body").animate({
                    scrollTop: $("#map-location").offset().top
                }, 2000);

            });
        })
    </script>
</body>
</html>
