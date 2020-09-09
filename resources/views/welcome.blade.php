<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Bintang Tobing" />
    <meta name="description" content="@yield('deschomepage')">
    <meta name="keywords" content="musim panen, musimpanen, musimpanen.co.id, cv musim panen">
    <link rel="shortcut icon" href="{!!asset('auth/images/avatar-01.ico')!!}" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('titlepage')</title>
    <script src="https://kit.fontawesome.com/bf3b9c3659.js" crossorigin="anonymous"></script>

    <!-- Stylesheets
	============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{!!asset('homepage/css/bootstrap.css')!!}" type="text/css" />
    <link rel="stylesheet" href="{!!asset('homepage/style.css')!!}" type="text/css" />
    <link rel="stylesheet" href="{!!asset('homepage/css/swiper.css')!!}" type="text/css" />
    <link rel="stylesheet" href="{!!asset('homepage/css/dark.css')!!}" type="text/css" />
    <link rel="stylesheet" href="{!!asset('homepage/css/font-icons.css')!!}" type="text/css" />
    <link rel="stylesheet" href="{!!asset('homepage/css/animate.css')!!}" type="text/css" />
    <link rel="stylesheet" href="{!!asset('homepage/css/magnific-popup.css')!!}" type="text/css" />

    <link rel="stylesheet" href="{!!asset('homepage/css/custom.css')!!}" type="text/css" />


    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{!!asset('homepage/include/rs-plugin/css/settings.css')!!}"
        media="screen" />
    <link rel="stylesheet" type="text/css" href="{!!asset('homepage/include/rs-plugin/css/layers.css')!!}">
    <link rel="stylesheet" type="text/css" href="{!!asset('homepage/include/rs-plugin/css/navigation.css')!!}">


    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "WebSite",
            "name": "Musim Panen",
            "url": "https://musimpanen.co.id/about-us",
            "potentialAction": {
                "@type": "SearchAction",
                "target": "https://musimpanen.co.id/{search_term_string}",
                "query-input": "required name=search_term_string"
            }
        }

    </script>

    {{-- METAGRAPH FACEBOOK --}}
    <meta property="fb:admins" content="593740541289378">
    <meta property="og:site_name" content="@yield('title')" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="@yield('ogtype')" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:description" content="@yield('deschomepage')" />
    <meta property="og:image"
        content="{!!url('https://res.cloudinary.com/sarjanamalam/image/upload/v1596438013/fbimg_vsmk7u.jpg')!!}')!!}">

    <!--GTAG JS-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-68593210-14"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-68593210-14');

    </script> --}}


    <style>
        .revo-slider-emphasis-text {
            font-size: 64px;
            font-weight: 700;
            letter-spacing: -1px;
            font-family: 'Poppins', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Poppins', sans-serif;
        }

        .tp-video-play-button {
            display: none !important;
        }

        .tp-caption {
            white-space: nowrap;
        }

    </style>
</head>

<body class="stretched">

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="clearfix">
        <div id="top-bar">
            <div class="container-fluid">

                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-md-auto">
                        <p class="mb-0 py-2 text-center text-md-left"><strong>Hotline:</strong> 0123-0000-0000 |
                            <strong>Email:</strong> <a href="mailto:info@musimpanen.co.id">info@musimpanen.co.id</a> |
                            <strong><a href="#">Live Chat</a></strong>
                        </p>
                    </div>

                    <div class="col-12 col-md-auto">

                        <!-- Top Links
						============================================= -->
                        <div class="top-links on-click">
                            <ul class="top-links-container">
                                <li class="top-links-item"><a href="#"><span><i
                                                class="fab fa-facebook fa-2x"></i></span></a>
                                </li>
                                <li class="top-links-item"><a href="#"><span><i
                                                class="fab fa-instagram fa-2x"></i></span></a>
                                </li>
                            </ul>
                        </div><!-- .top-links end -->

                    </div>
                </div>

            </div>
        </div>
        <!-- Header
		============================================= -->
        <header id="header" class="full-header" data-sticky-logo-height="74" data-menu-padding="32">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">
                        <!-- Logo
						============================================= -->
                        <div id="logo">
                            <a href="/" class="standard-logo"
                                data-dark-logo="{!!asset('homepage/images/logo.png')!!}"><img
                                    src="{!!asset('homepage/images/logo.png')!!}" alt="Musim Panen Logo"></a>
                            <a href="/" class="retina-logo"
                                data-dark-logo="{!!asset('homepage/images/logo@2x.png')!!}"><img
                                    src="{!!asset('homepage/images/logo@2x.png')!!}" alt="Musim Panen Logo"></a>
                        </div><!-- #logo end -->

                        <div class="header-misc">
                            <div id="top-search" class="header-misc-icon">
                                <a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i
                                        class="icon-line-cross"></i></a>
                            </div>

                        </div>

                        <div id="primary-menu-trigger">
                            <svg class="svg-trigger" viewBox="0 0 100 100">
                                <path
                                    d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20">
                                </path>
                                <path d="m 30,50 h 40"></path>
                                <path
                                    d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20">
                                </path>
                            </svg>
                        </div>

                        <!-- Primary Navigation
						============================================= -->
                        <nav class="primary-menu sub-title">

                            <ul class="menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="/">
                                        <div>Home</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="#">
                                        <div>Product</div><span>Our products</span>
                                    </a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="#">
                                                <div>Panen</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="/gallery">
                                        <div>Gallery</div><span>Our documentations</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="/demonstration">
                                        <div>Videos</div><span>Our Demonstration</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="/blog">
                                        <div>News</div><span>Our updates</span>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="/about-us">
                                        <div>About Us</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="/contact-us">
                                        <div>Contact Us</div>
                                    </a>
                                </li>
                            </ul>

                        </nav><!-- #primary-menu end -->

                        <form class="top-search-form" action="search.html" method="get">
                            <input type="text" name="q" class="form-control" value=""
                                placeholder="Type &amp; Hit Enter.." autocomplete="off">
                        </form>

                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header>
        @yield('sliderhomepage')

        @yield('content')


        <!-- Footer
		============================================= -->
        <footer id="footer" class="dark">
            <div class="container">

                <!-- Footer Widgets
				============================================= -->
                <div class="footer-widgets-wrap">

                    <div class="row col-mb-50">
                        <div class="col-lg-8">

                            <div class="row col-mb-50">
                                <div class="col-md-4">
                                    <div class="widget clearfix">
                                        <img src="{!!asset('homepage/images/logo-white.png')!!}" alt="Image"
                                            class="footer-logo">
                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam architecto
                                            repellat deserunt eum nostrum sed eos id.</p>
                                        <div
                                            style="background: url('{!!asset('homepage/images/world-map.png')!!}') no-repeat center center; background-size: 100%;">
                                            <address>
                                                <strong>Kantor Kami:</strong><br>
                                                Jalan Cemara No. 167<br>
                                                Medan, Indonesia<br>
                                            </address>
                                            <abbr title="Phone Number"><strong>Phone:</strong></abbr> (061) 000 000<br>
                                            <abbr title="Email Address"><strong>Email:</strong></abbr>
                                            info@musimpanen.co.id
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <!-- Copyrights
			============================================= -->
            <div id="copyrights">
                <div class="container">

                    <div class="row col-mb-30">
                        <?php $y = Date('Y') ?>
                        <div class="col-md-6 text-center text-md-left">
                            Copyrights &copy; {{$y}} - Musim Panen.co.id | All Rights Reserved by <a
                                href="https://infinitysolutions.co.id">Infinity Solutions</a>.<br>
                            <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy
                                    Policy</a>
                            </div>
                        </div>

                        <div class="col-md-6 text-center text-md-right">
                            <div class="d-flex justify-content-center justify-content-md-end">
                                <a href="#" class="social-icon si-small si-borderless si-facebook">
                                    <i class="icon-facebook"></i>
                                    <i class="icon-facebook"></i>
                                </a>

                                <a href="#" class="social-icon si-small si-borderless si-instagram">
                                    <i class="icon-instagram"></i>
                                    <i class="icon-instagram"></i>
                                </a>
                            </div>

                            <div class="clear"></div>

                            <i class="icon-envelope2"></i> info@musimpanen.co.id <span class="middot">&middot;</span> <i
                                class="icon-headphones"></i> +62 61 000 000 <span class="middot"></span>
                        </div>

                    </div>

                </div>
            </div><!-- #copyrights end -->
        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- JavaScripts
	============================================= -->
    <script src="{!!asset('homepage/js/jquery.js')!!}"></script>
    <script src="{!!asset('homepage/js/plugins.min.js')!!}"> </script>
    <!-- Footer
        Scripts=============================================-->
    <script src="{!!asset('homepage/js/functions.js')!!}">
    </script>


    <!-- SLIDER REVOLUTION 5.x SCRIPTS  -->
    <script src="{!!asset('homepage/include/rs-plugin/js/jquery.themepunch.tools.min.js')!!}"></script>
    <script src="{!!asset('homepage/include/rs-plugin/js/jquery.themepunch.revolution.min.js')!!}"></script>

    <script src="{!!asset('homepage/include/rs-plugin/js/extensions/revolution.extension.video.min.js')!!}"></script>
    <script src="{!!asset('homepage/include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')!!}">
    </script>
    <script src="{!!asset('homepage/include/rs-plugin/js/extensions/revolution.extension.actions.min.js')!!}"></script>
    <script src="{!!asset('homepage/include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')!!}">
    </script>
    <script src="{!!asset('homepage/include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')!!}"></script>
    <script src="{!!asset('homepage/include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')!!}">
    </script>
    <script src="{!!asset('homepage/include/rs-plugin/js/extensions/revolution.extension.migration.min.js')!!}">
    </script>
    <script src="{!!asset('homepage/include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')!!}"></script>
    <script>
        var tpj = jQuery;
        var revapi31;
        var $ = jQuery.noConflict();

        tpj(document).ready(function () {
            if (tpj("#rev_slider_679_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_679_1");
            } else {
                revapi31 = tpj("#rev_slider_679_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "include/rs-plugin/js/",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 16000,
                    hideThumbs: 200,
                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 5,
                    navigation: {
                        keyboardNavigation: "on",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "hades",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: false,
                            tmp: '<div class="tp-arr-allwrapper">	<div class="tp-arr-imgholder"></div></div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            }
                        },
                    },
                    responsiveLevels: [1140, 1024, 778, 480],
                    visibilityLevels: [1140, 1024, 778, 480],
                    gridwidth: [1140, 1024, 778, 480],
                    gridheight: [700, 768, 960, 720],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "0px",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }

            revapi31.on("revolution.slide.onloaded", function (e) {
                setTimeout(function () {
                    SEMICOLON.slider.sliderDimensions();
                }, 200);
            });

            revapi31.on("revolution.slide.onchange", function (e, data) {
                SEMICOLON.slider.revolutionSliderMenu();
            });
        }); /*ready*/

    </script>
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyBPHBkHbxlsp255-WwFSBcj4Eq3WUovF00"></script>
</body>

</html>
