
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> {{ $config->web_title }} </title>
    <!-- favicons Icons -->
    <link rel="shortcut icon" href="{{@$config->favicon->path ?? ''}}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{@$config->favicon->path ?? ''}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{@$config->favicon->path ?? ''}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{@$config->favicon->path ?? ''}}">


    <meta name="description" content="{{ $config->web_title }}" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
{{--    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">


{{--    <link rel="stylesheet" href="/site/vendors/bootstrap/css/bootstrap.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/animate/animate.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/animate/custom-animate.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/fontawesome/css/all.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/jarallax/jarallax.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/nouislider/nouislider.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/nouislider/nouislider.pips.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/odometer/odometer.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/slick/slick.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/ambed-icons/style.css">--}}
{{--    <link rel="stylesheet" href="/site/vendors/tiny-slider/tiny-slider.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/reey-font/stylesheet.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/owl-carousel/owl.carousel.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/owl-carousel/owl.theme.default.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/bxslider/jquery.bxslider.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/bootstrap-select/css/bootstrap-select.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/vegas/vegas.min.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/jquery-ui/jquery-ui.css" />--}}
{{--    <link rel="stylesheet" href="/site/vendors/timepicker/timePicker.css" />--}}
{{--    <link rel="stylesheet" href="/site/css/swiper.min.css" />--}}

{{--    <!-- template styles -->--}}
{{--    <link rel="stylesheet" href="/site/css/ambed.css" />--}}
{{--    <link rel="stylesheet" href="/site/css/ambed-responsive.css" />--}}

{{--    <!-- modes css -->--}}
{{--    <link rel="stylesheet" id="jssMode" href="/site/css/ambed-light.css">--}}


{{--    <!-- toolbar css -->--}}
{{--    <link rel="stylesheet" href="/site/vendors/toolbar/css/toolbar.css">--}}
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/site/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/site/css/animate.min.css" />
    <link rel="stylesheet" href="/site/css/custom-animate.css" />
    <link rel="stylesheet" href="/site/css/all.min.css" />
    <link rel="stylesheet" href="/site/css/jarallax.css" />
    <link rel="stylesheet" href="/site/css/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="/site/css/nouislider.min.css" />
    <link rel="stylesheet" href="/site/css/nouislider.pips.css" />
    <link rel="stylesheet" href="/site/css/odometer.min.css" />
    <link rel="stylesheet" href="/site/css/swiper.min.css" />
    <link rel="stylesheet" href="/site/css/style.css">
    <link rel="stylesheet" href="/site/css/tiny-slider.min.css" />
    <link rel="stylesheet" href="/site/css/stylesheet.css" />
    <link rel="stylesheet" href="/site/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="/site/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="/site/css/jquery.bxslider.css" />
    <link rel="stylesheet" href="/site/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="/site/css/vegas.min.css" />
    <link rel="stylesheet" href="/site/css/jquery-ui.css" />

    <!-- template styles -->
    <link rel="stylesheet" href="/site/css/ambed.css" />
    <link rel="stylesheet" href="/site/css/ambed-responsive.css" />
    <!-- modes css -->
    <!-- toolbar css -->
    <link rel="stylesheet" href="/site/css/toolbar.css">
    <link rel="stylesheet" href="/site/css/callbutton.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script type="text/javascript"
            src="/site/js/elementa0d8.js?cb=googleTranslateElementInit"></script>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'vi',includedLanguages:'en,hi,vi,zh-CN', }, 'translate_select');
        }
    </script>
    <style>
        .VIpgJd-ZVi9od-aZ2wEe-wOHMyf-ti6hGc {
            display: none;
        }
        .skiptranslate{
            display: none;
            top: 0;
        }
        .goog-te-banner-frame{display: none !important;}
        .goog-text-highlight { background: none !important; box-shadow: none !important;}
        .goog-te-banner-frame.skiptranslate {
            display: none !important;
        }
        body {
            position: revert!important;
            top: 0px !important;
        }
    </style>
