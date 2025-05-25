<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App" class="custom-cursor" ng-cloak>
    <!-- Custom Cursor -->
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


    @include('site.partials.angular_mix')

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
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">needhelp@ambed.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
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

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>



    <script src="/site/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="/site/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/site/vendors/jarallax/jarallax.min.js"></script>
    <script src="/site/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="/site/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="/site/vendors/jquery-circle-progress/jquery.circle-progress.min.js"></script>
    <script src="/site/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="/site/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="/site/vendors/nouislider/nouislider.min.js"></script>
    <script src="/site/vendors/odometer/odometer.min.js"></script>
    <script src="/site/vendors/slick/slick.min.js"></script>
    <script src="/site/vendors/tiny-slider/tiny-slider.min.js"></script>
    <script src="/site/vendors/wnumb/wNumb.min.js"></script>
    <script src="/site/vendors/wow/wow.js"></script>
    <script src="/site/vendors/isotope/isotope.js"></script>
    <script src="/site/vendors/countdown/countdown.min.js"></script>
    <script src="/site/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="/site/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="/site/vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="/site/vendors/vegas/vegas.min.js"></script>
    <script src="/site/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="/site/vendors/timepicker/timePicker.js"></script>
    <script src="/site/vendors/circleType/jquery.circleType.js"></script>
    <script src="/site/vendors/circleType/jquery.lettering.min.js"></script>

    <!-- template js -->
    <script src="/site/js/ambed.js"></script>


    <!-- toolbar js -->
    <script src="/site/vendors/toolbar/js/js.cookie.min.js"></script>
    <script src="/site/vendors/toolbar/js/jQuery.style.switcher.min.js"></script>
    <script src="/site/vendors/toolbar/js/toolbar.js"></script>

    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>

    @stack('scripts')
    <script>
        app.controller('searchModal', function ($rootScope, $scope) {
            $scope.search = function () {
                if (!$scope.keyword) {
                    return;
                }

                var url = '/tim-kiem/?keyword=' + encodeURIComponent($scope.keyword);
                window.location.href = url;
            }
        })

    </script>
</body>

</html>
