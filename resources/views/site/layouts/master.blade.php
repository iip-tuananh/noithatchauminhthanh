<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('site.partials.head')
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-769309501">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-769309501');
    </script>

    @yield('css')
</head>

<body  class="custom-cursor" >
    <!-- Custom Cursor -->
    <div id="translate_select"></div>
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>

    <!-- Preloader Start-->
    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- Preloader End-->
    <div class="page-wrapper">
        @include('site.partials.header')
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
        </div>

        @yield('content')
        @include('site.partials.footer')
    </div>



    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="{{ route('front.home-page') }}" aria-label="logo image"><img src="{{@$config->image->path ?? ''}}"
                                                                 style="max-width: 200px" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a>
                </li>
                <li>
                    <i class="fa fa-map-marker"></i>
                    <a href="#">{{ $config->address_company }}</a>
                </li>

            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="{{$config->facebook}}" target="_blank"><i class="fab fa-facebook"></i></a>

                    <a href="{{$config->instagram}}" target="_blank"><i class="fab fa-tiktok"></i></a>

                    <a href="{{$config->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup" ng-controller="searchModal">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form>
                <label for="search" class="sr-only">Tìm kiếm sản phẩm</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Nhập tên sản phẩm..." ng-model="keyword" required />
                <button type="button" aria-label="search submit" class="thm-btn" ng-click="search()">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

{{--    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>--}}

{{--    <div onclick="window.location.href= 'tel:{{ $config->hotline }}'" class="hotline-phone-ring-wrap">--}}
{{--        <div class="hotline-phone-ring">--}}
{{--            <div class="hotline-phone-ring-circle"></div>--}}
{{--            <div class="hotline-phone-ring-circle-fill"></div>--}}
{{--            <div class="hotline-phone-ring-img-circle">--}}
{{--                <a href="tel:{{ $config->hotline }}" class="pps-btn-img">--}}
{{--                    <img src="/site/images/phone.png" alt="Gọi điện thoại" width="50">--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <a href="tel:0947988562">--}}
{{--        </a>--}}
{{--        <div class="hotline-bar"><a href="tel:0947988562">--}}
{{--            </a><a href="tel:0947988562">--}}
{{--                <span class="text-hotline">0947988562</span>--}}
{{--            </a>--}}
{{--        </div>--}}

{{--    </div>--}}



    <div class="hidden-xs">
        <div onclick="window.location.href= 'tel:0927 989 689'" class="hotline-phone-ring-wrap">
            <div class="hotline-phone-ring">
                <div class="hotline-phone-ring-circle"></div>
                <div class="hotline-phone-ring-circle-fill"></div>
                <div class="hotline-phone-ring-img-circle">
                    <a href="tel: {{ $config->hotline }}" class="pps-btn-img">
                        <img src="/site/images/phone.png" alt="Gọi điện thoại" width="50" loading="lazy">
                    </a>
                </div>
            </div>
            <a href="tel:0927 989 689">
            </a>
            <div class="hotline-bar"><a href="tel:{{ $config->hotline }}">
                </a><a href="tel:{{ $config->hotline }}">
                    <span class="text-hotline">{{ $config->hotline }}</span>
                </a>
            </div>

        </div>
        <div class="inner-fabs">
            <a target="blank" href="{{ $config->facebook }}" class="fabs roundCool" id="challenges-fab"
               data-tooltip="Send Messenger">
                <img class="inner-fab-icon" src="/site/images/messenger-icon.png" alt="challenges-icon" border="0" loading="lazy">
            </a>
            <a target="blank" href="https://zalo.me/{{ preg_replace('/\s+/', '', $config->zalo) }}" class="fabs roundCool" id="chat-fab"
               data-tooltip="Send message Zalo">
                <img class="inner-fab-icon" src="/site/images/zalo.png" alt="chat-active-icon" border="0" loading="lazy">
            </a>
{{--            <a target="blank" href="{{ $config->google_map }}" class="fabs roundCool" id="chat-fab"--}}
{{--               data-tooltip="View map">--}}
{{--                <img class="inner-fab-icon" src="/site/images/map.png" alt="chat-active-icon" border="0" loading="lazy">--}}
{{--            </a>--}}

        </div>
        <div class="fabs roundCool call-animation" id="main-fab">
            <img class="img-circle" src="/site/images/lienhe.png" alt="" width="135" loading="lazy">
        </div>
    </div>




{{--    @include('site.partials.angular_mix')--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script data-cfasync="false" src="/site/js/email-decode.min.js"></script>
    <script src="/site/js/jquery-3.6.0.min.js"></script>
    <script src="/site/js/bootstrap.bundle.min.js"></script>
    <script src="/site/js/jarallax.min.js"></script>
    <script src="/site/js/jquery.appear.min.js"></script>
    <script src="/site/js/jquery.circle-progress.min.js"></script>
    <script src="/site/js/jquery.magnific-popup.min.js"></script>
    <script src="/site/js/swiper.min.js"></script>
    <script src="/site/js/tiny-slider.min.js"></script>
    <script src="/site/js/wow.js"></script>
    <script src="/site/js/countdown.min.js"></script>
    <script src="/site/js/owl.carousel.min.js"></script>
    <script src="/site/js/jquery.bxslider.min.js"></script>
    <script src="/site/js/vegas.min.js"></script>
    <script src="/site/js/jquery-ui.js"></script>
    <script src="/site/js/jquery.lettering.min.js"></script>
    <!-- template js -->
    <script src="/site/js/ambed.js?v=1234"></script>
    <script src="/site/js/jQuery.style.switcher.min.js"></script>
    <script src="/site/js/toolbar.js"></script>
    <script src="/site/js/callbutton.js"></script>


    <script>
        function translateheader(lang) {
            var sel = document.querySelector("select.goog-te-combo");
            if (!sel) {
                // Nếu chưa có, thử lại sau 100ms
                return setTimeout(function() {
                    translateheader(lang);
                }, 100);
            }

            // 1) Gán giá trị
            sel.value = lang;

            // 2) Tạo event theo chuẩn cũ (HTMLEvents)
            var evOld = document.createEvent("HTMLEvents");
            evOld.initEvent("change", true, true);
            sel.dispatchEvent(evOld);

            // 3) Tạo event theo chuẩn mới (Event constructor)
            var evNew = new Event("change", { bubbles: true, cancelable: true });
            sel.dispatchEvent(evNew);
        }

    </script>
    <script type="text/javascript"
            src="/site/js/elementa0d8.js?cb=googleTranslateElementInit">
    </script>
    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>

    @stack('scripts')

</body>

</html>
