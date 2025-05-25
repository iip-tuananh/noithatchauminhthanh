@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
    {{ url('' . $banners[0]->image->path ?? '') }}
@endsection

@section('css')
@endsection


@section('content')
    <!--Main Slider Start-->
    <section class="main-slider clearfix">
{{--        <style>--}}
{{--            /* ---- SMARTPHONE ---- */--}}
{{--            @media (max-width: 768px) {--}}
{{--                /* 1) Cho mỗi slide tự điều chỉnh chiều cao */--}}
{{--                .main-slider__carousel .item {--}}
{{--                    height: auto !important;--}}
{{--                }--}}

{{--                /* 2) Image-layer dùng contain thay vì cover */--}}
{{--                .main-slider__carousel .image-layer {--}}
{{--                    background-size: contain !important;--}}
{{--                    background-repeat: no-repeat !important;--}}
{{--                    background-position: center center !important;--}}

{{--                    /* 3) Dùng padding-top để đặt tỉ lệ khung hình, ví dụ 40% = 2.5:1 */--}}
{{--                    padding-top: 40% !important;--}}

{{--                    /* 4) Bỏ mọi height cố định */--}}
{{--                    height: auto !important;--}}
{{--                    min-height: 0 !important;--}}
{{--                }--}}


{{--            }--}}



{{--            @media (max-width: 768px) {--}}
{{--                .main-slider__sub-title {--}}
{{--                    font-size: 12px;--}}
{{--                }--}}
{{--                .main-slider__title {--}}
{{--                    font-size: 20px;--}}
{{--                }--}}
{{--                .main-slider__btn {--}}
{{--                    font-size: 12px;--}}
{{--                    padding: 6px 12px;--}}
{{--                }--}}
{{--                /* Ẩn logo trên mobile */--}}
{{--                .main-slider__icon {--}}
{{--                    display: none;--}}
{{--                }--}}

{{--                .main-slider__icon img {--}}
{{--                    width: 40px;      /* ví dụ giảm còn 40px */--}}
{{--                    height: auto;--}}
{{--                }--}}


{{--                /* 2. Thu nhỏ sub-title */--}}
{{--                .main-slider__sub-title {--}}
{{--                    font-size: 14px;      /* trước đây có thể 18px, bây giờ giảm */--}}
{{--                    line-height: 1.2;--}}
{{--                }--}}

{{--                /* 3. Thu nhỏ title chính */--}}
{{--                .main-slider__title {--}}
{{--                    font-size: 28px;      /* ví dụ giảm từ 40px xuống 28px */--}}
{{--                    line-height: 1.3;--}}
{{--                }--}}

{{--                /* 4. Thu nhỏ button nếu cần */--}}
{{--                .main-slider__btn {--}}
{{--                    font-size: 14px;--}}
{{--                    padding: 8px 16px;--}}
{{--                }--}}
{{--            }--}}
{{--        </style>--}}


        <div class="main-slider__carousel thm-owl__carousel owl-carousel" data-owl-options='{
                "loop": true,
                "animateOut": "fadeOut",
                "animateIn": "fadeIn",
                "items": 1,
                "autoplay": true,
                "autoplayTimeout": 7000,
                "smartSpeed": 1000,
                "nav": true,
                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                "dots": false,
                "margin": 0
                }'>
            @foreach($banners as $banner)
                <div class="item">

                    <div class="main-slider-one__item">
                        <img class="image-layer" src="{{ @$banner->image->path ?? '' }}">
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="main-slider__content">
                                    <div class="main-slider__icon">
                                        <img src="/site/images/shapes/main-slider-icon.png" alt="">
                                    </div>
                                    <div class="main-slider__sub-title-box">
                                        <p class="main-slider__sub-title">{{ $banner->title }}</p>
                                        <div class="main-slider__border-left"></div>
                                        <div class="main-slider__border-right"></div>
                                    </div>
                                    <h2 class="main-slider__title">
                                        {!! $banner->intro !!} <br>

                                    </h2>
                                    <div class="main-slider__btn-box">
                                        <a href="{{ $banner->link }}" class="thm-btn main-slider__btn">Khám phá thêm</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <style>

        @media (max-width: 767px) {
            /* 1. Đẩy carousel xuống dưới header (thay 60px bằng chiều cao thực của header bạn) */
            .main-slider__carousel {
                padding-top: 60px !important;
            }

            /* 2. Cho phép .owl-stage-outer hiện overflow
               (nếu bạn muốn kéo ảnh ra ngoài vùng mặc định) */
            .main-slider__carousel .owl-stage-outer {
                overflow: visible !important;
            }

            /* 3. Override chiều cao do OwlCarousel gán inline */
            .main-slider__carousel .owl-item,
            .main-slider__carousel .owl-item .item {
                height: auto !important;
            }

            /* 4. Cho ảnh full-width, giữ tỉ lệ, không crop */
            .main-slider__carousel .owl-item .image-layer {
                display: block !important;
                width: 100% !important;
                height: auto !important;
                object-fit: contain !important;
            }

            /* 5. Kéo content lên overlay trên ảnh, không làm ảnh change chiều cao */
            .main-slider__carousel .owl-item .main-slider__content {
                position: absolute !important;
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                z-index: 2 !important;
                width: calc(100% - 30px) !important;  /* 15px padding hai bên */
                padding: 0 15px !important;
                text-align: center !important;
            }
        }



        @media (max-width: 767px) {
            /* 1) .item cao = ảnh, ẩn overflow */
            .main-slider__carousel .owl-item .item {
                position: relative !important;
                overflow: hidden !important;
                height: auto !important;
            }

            /* 2) Để ảnh trong luồng, width 100%, giữ tỉ lệ */
            .main-slider__carousel .owl-item .item > div:first-child,
            .main-slider__carousel .owl-item .item > div:first-child img.image-layer {
                position: relative !important;
                width: 100% !important;
                height: auto !important;
                display: block !important;
                object-fit: cover !important;
            }

            /* 3) “Nhúng” container/content chồng lên ảnh, không thay đổi chiều cao .item */
            .main-slider__carousel .owl-item .item .container {
                position: absolute !important;
                top: 0; left: 0;
                width: 100%; height: 100%;
                margin: 0 !important; padding: 0 !important;
            }
            .main-slider__carousel .main-slider__content {
                position: absolute !important;
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                width: calc(100% - 20px) !important;
                padding: 0 10px !important;
                text-align: center !important;
                background: transparent !important;
            }

            /* 4) Ẩn nav arrows & dots */
            .main-slider__carousel .owl-nav,
            .main-slider__carousel .owl-dots {
                display: none !important;
            }

            /* 5) Thu nhỏ icon / text / button cho vừa */
            .main-slider__carousel .main-slider__icon img {
                max-width: 30px !important;
                max-height: 30px !important;
            }
            .main-slider__carousel .main-slider__sub-title {
                font-size: 12px !important;
                margin-bottom: 4px !important;
            }
            .main-slider__carousel .main-slider__title {
                font-size: 16px !important;
                line-height: 1.2 !important;
                margin-bottom: 6px !important;
            }
            .main-slider__carousel .main-slider__btn {
                font-size: 12px !important;
                padding: 5px 10px !important;
            }
        }

        @media (max-width: 767px) {
            /* 1. Ẩn nav arrows & dots */
            .main-slider__carousel .owl-nav,
            .main-slider__carousel .owl-dots {
                display: none !important;
            }

            /* 2. Giữ khung .item overflow:hidden để không có phần thừa */
            .main-slider__carousel .owl-item .item {
                position: relative !important;
                overflow: hidden !important;
                height: auto !important;
            }

            /* 3. Chuyển toàn bộ content thành absolute, sau đó chỉ show icon */
            .main-slider__carousel .owl-item .main-slider__content {
                position: absolute !important;
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                width: auto !important;
                padding: 0 !important;
                text-align: center !important;
                background: transparent !important;
            }

            /* 4. Ẩn mọi thứ trong .main-slider__content ngoại trừ icon */
            .main-slider__carousel .main-slider__content > *:not(.main-slider__icon) {
                display: none !important;
            }

            /* 5. Căn và thu icon cho vừa */
            .main-slider__carousel .main-slider__icon {
                display: block !important;
                margin: 0 auto !important;
            }
            .main-slider__carousel .main-slider__icon img {
                width: 40px !important;    /* hoặc điều chỉnh theo ý bạn */
                height: auto !important;
            }
        }

    </style>
    <!--Main Slider End-->

    <!--About One Start-->
    <section class="about-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Kiến tạo phong cách</span>
                <h2 class="section-title__title">Cảm hứng nội thất</h2>
                <div class="section-title__line"></div>
            </div>
            <style>
                .project-three__single {
                    display: flex;
                    flex-direction: column;
                    flex: 1;              /* chiếm hết chiều cao .owl-item */
                }

                /* 3) Khung ảnh cố định tỉ lệ 4:3 (padding-top = 75%) */
                .project-three__img {
                    position: relative;
                    width: 100%;
                    padding-top: 75%;     /* 3/4 = 0.75 -> 4:3 */
                    overflow: hidden;
                }

                /* 4) Ảnh luôn phóng to che kín khung, không bị méo */
                .project-three__img img {
                    position: absolute;
                    top:   0;
                    left:  0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                /* 5) Phần nội dung bên dưới ảnh (tiêu đề, icon…) */
                .project-three__content {
                    padding: 15px;
                    /* có thể thêm flex-shrink:0 nếu ko muốn nội dung co lại */
                }

                /* 6) Giữa ảnh & nội dung có khoảng */
                .project-three__img-box {
                    margin-bottom: 10px;
                }
            </style>
            <div class="thm-owl__carousel owl-theme owl-carousel owl-with-shadow owl-dot-one owl-dot-one--md owl-nav-one owl-nav-one--md"
                 data-owl-options='{
					"items": 3,
					"margin": 30,
					"smartSpeed": 700,
					"loop":true,
					"autoplay": 6000,
					"nav":true,
					"dots":true,
					"navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
					"responsive":{
						"0":{
							"items":1
						},
						"575":{
							"items":2
						},
						"992":{
							"items": 3
						}
					}
				}'>
                @foreach($categoriesProduct as $cateProduct)
                    <div class="item">
                        <div class="project-three__single">
                            <div class="project-three__img-box">
                                <div class="project-three__img">
                                    <img src="{{ @$cateProduct->image->path ?? '' }}" alt="">
                                    <div class="project-three__arrow">
                                        <a href="{{ route('front.products', $cateProduct->slug) }}"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                    <div class="project-three__content">
                                        <h3 class="project-three__title">
                                            <a href="{{ route('front.products', $cateProduct->slug) }}">{{ $cateProduct->name }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--About One End-->
    <style>
        /* 1) Cho các cột services thành flex container để các .services-one__single có cùng chiều cao */
        .services-section .row {
            display: flex;
            flex-wrap: wrap;
        }
        .services-section .col-xl-4,
        .services-section .col-lg-4 {
            display: flex;
        }

        /* 2) Block chính flex-col, kéo cao đầy parent */
        .services-one__single {
            display: flex;
            flex-direction: column;
            flex: 1;
            background: #fff;      /* nếu cần */
            border: 1px solid #eaeaea;
            padding: 15px;
        }

        /* 3) Khung ảnh cố định tỉ lệ 16:9 (hoặc chỉnh padding-top) */
        .services-one__img {
            position: relative;
            width: 100%;
            padding-top: 85%;   /* 3/4 = 0.75 --> 4:3 */
            overflow: hidden;
            margin-bottom: 15px;
        }
        /* Ảnh cover toàn khung */
        .services-one__img img {
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* 4) Phần content cũng flex, để title + text chia không gian đều */
        .services-one__content {
            /*display: flex;*/
            flex-direction: column;
            flex: 1;
        }

        /* 5) Tit le để auto margin-bottom */
        .services-one__title {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        /* 6) Text clamp 3 dòng, overflow dấu … */
        .services-one__text {
            flex: 1;               /* chiếm chỗ còn lại */
            display: -webkit-box;
            -webkit-line-clamp: 5;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.4em;    /* điều chỉnh theo font */
            max-height: calc(1.4em * 5);
        }

    </style>
    <section class="services-one services-section">
        <div class="services-one-bg-box">
            <div class="services-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                 style="background-image: url(/site/images/backgrounds/services-one-bg.jpg);"></div>
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Dịch vụ</span>
                <h2 class="section-title__title">Dịch vụ của chúng tôi</h2>
                <div class="section-title__line"></div>
            </div>

            <div class="row">
                @foreach($categoryServices as $cateService)
                    <div class="col-xl-4 col-lg-4">
                        <!--Services One Single-->
                        <div class="services-one__single wow fadeInUp" data-wow-delay="100ms">
                            <div class="services-one__img">
                                <img src="{{ @$cateService->image->path ?? '' }}" alt="">
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="{{ route('front.services', ['parentSlug' => $cateService->slug]) }}">{{ $cateService->name }}</a></h3>
                                <div class="services-one__text" title="{{ $cateService->intro }}">
                                    {{ $cateService->intro }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="project-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Dự án</span>
                <h2 class="section-title__title">Công trình đã triển khai</h2>
                <div class="section-title__line"></div>
            </div>


            <div class="project-one__inner">
                <div class="project-one__main-content">
                    <div class="project-one__carousel thm-slick__carousel" data-slick-options='{
                            "slidesToShow": 1,
                            "slidesToScroll": 1,
                            "asNavFor": ".project-one__thumb",
                            "autoplay": true,
                            "dots": false,
                            "centerPadding": 0,
                            "arrows": false
                            }'>

                        @foreach($projects as $project)
                            <div class="item">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="project-one__left">
                                            <div class="project-one__img">
                                                <img src="{{ @$project->image->path ?? '' }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="project-one__right">
                                            <div class="project-one__content-box">
                                                <div class="project-one-shape-1 float-bob-y">
                                                    <img src="/site/images/shapes/project-one-shape-1.png" alt="">
                                                </div>
                                                <div class="project-one__content">
                                                    <h4 class="project-one__title">{{ $project->name }}</h4>
                                                    <p class="project-one__text">{{ $project->description }}</p>
                                                    <a href="{{ route('front.getProjectDetail', $project->slug) }}"
                                                       class="thm-btn project-one__btn">Chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>

                    <style>
                        .project-one__thumb .item {
                            display: flex !important;
                            align-items: center;
                            justify-content: center;
                            padding: 5px; /* nếu muốn khoảng đệm */
                        }

                        /* 2) Khung ảnh vuông (tỉ lệ 1:1) */
                        .project-one__img-holder {
                            position: relative;
                            width: 100%;
                            padding-top: 100%;   /* 1:1 ratio */
                            overflow: hidden;
                            background: #f5f5f5; /* nền để lộ khi ảnh không phủ hết */
                        }

                        /* 3) Ảnh phủ kín khung, crop thừa nếu cần */
                        .project-one__img-holder img {
                            position: absolute;
                            top: 0; left: 0;
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                        }

                        /* 4) Nếu muốn bo góc thumbnail */
                        .project-one__img-holder,
                        .project-one__img-holder img {
                            border-radius: 6px;
                        }
                    </style>
                    <div class="project-one__thumb thm-slick__carousel" data-slick-options='{
                            "slidesToShow": 4,
                            "slidesToScroll": 1,
                            "asNavFor": ".project-one__carousel",
                            "autoplay": true,
                            "dots": false,
                            "centerPadding": 0,
                            "focusOnSelect": true,
                            "arrows": true,
                            "nextArrow": "<button class=\"next\"><i class=\"fa fa-angle-right\"></i></button>",
                            "prevArrow": "<button class=\"prev\"><i class=\"fa fa-angle-left\"></i></button>",
                            "responsive": [
                                {
                                    "breakpoint": 575,
                                    "settings": {
                                        "slidesToShow": 3,
                                        "vertical": false,
                                        "slidesToScroll": 1
                                    }
                                }
                            ]
                            }'>

                        @foreach($projects as $project)
                            <div class="item">
                                <div class="project-one__img-holder">
                                    <img src="{{ @$project->image->path ?? '' }}" alt="">
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-one__more-project">
                        <div class="project-one__more-project-content">
                            <p>Còn hơn 300 dự án chúng tôi đã hoàn thành. <a href="{{ route('front.projects') }}">Xem thêm dự án</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="feature-one">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">Vì Sao Nên Chọn {{ $config->short_name_company }}</h2>
                <div class="section-title__line"></div>
            </div>

            <ul class="list-unstyled feature-one__list">
                @foreach($reasons as $reason)
                    <li class="feature-one__single wow fadeInLeft animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInLeft;">
                        <div class="feature-one__content">
                            <div class="feature-one__shape-1">
                                <img src="https://aceslighting.vn/frontend/images/feature-one-shape-1.png" alt="">
                            </div>
                            <div class="feature-one__shape-2">
                                <img src="https://aceslighting.vn/frontend/images/feature-one-shape-2.png" alt="">
                            </div>
                            <div class="feature-one__icon">
                                <img style="height: auto" decoding="async" src="{{ @$reason->image->path ?? '' }}"
                                     alt="icon" width="80" height="80">
                            </div>
                            <h3 class="feature-one__title"><a href="#">{{ $reason->title }}</a></h3>
                            <p class="feature-one__text">{{ $reason->content }}</p>
                        </div>
                    </li>

                @endforeach

            </ul>
        </div>
    </section>

    <section class="brand-one">
        <div class="container">
            <div class="brand-one__inner">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="brand-one__title">
                            <h2>Đối tác tiêu biểu</h2>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="brand-one__main-content">
                            <div class="brand-one__one thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                                    "loop": true,
                                    "autoplay": true,
                                    "margin": 100,
                                    "nav": false,
                                    "dots": false,
                                    "smartSpeed": 500,
                                    "autoplayTimeout": 10000,
                                    "responsive": {
                                        "0": {
                                            "margin": 30,
                                            "items": 2
                                        },
                                        "575": {
                                            "margin": 50,
                                            "items": 3
                                        },
                                        "768": {
                                            "margin": 50,
                                            "items": 4
                                        },
                                        "992": {
                                            "margin": 50,
                                            "items": 5
                                        },
                                        "1200": {
                                            "margin": 100,
                                            "items": 5
                                        }
                                    }
                                    }'>
                                @foreach($partners as $partner)
                                    <div class="item">
                                        <img src="{{ @$partner->image->path ?? '' }}" alt="{{ $partner->name }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Tin tức mới nhất</span>
                <h2 class="section-title__title">Tin tức & Hoạt động</h2>
                <div class="section-title__line"></div>
            </div>
            <style>
                .row.blog-list > .col-xl-4,
                .row.blog-list > .col-lg-4 {
                    display: flex;        /* biến mỗi cột thành flex container */
                }
                /* 2) Card chính kéo cao toàn bộ .col */
                .blog-one__single {
                    display: flex;
                    flex-direction: column;
                    flex: 1;              /* ép card cao bằng nhau */
                }

                /* 3) Khung ảnh cố định tỉ lệ 16:9 */
                .blog-one__img {
                    position: relative;
                    width: 100%;
                    padding-top: 56.25%;  /* 9/16 = 0.5625 */
                    overflow: hidden;
                }

                /* 4) Ảnh cover khung, crop để đồng đều */
                .blog-one__img img {
                    position: absolute;
                    top: 0; left: 0;
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                /* 5) Phần nội dung flex để lấp đầy phần còn lại */
                .blog-one__content {
                    flex: 1;
                    display: flex;
                    flex-direction: column;
                    padding: 15px;
                }

                /* 6) Ngày và meta không giãn */
                .blog-one__date,
                .blog-one__meta {
                    flex-shrink: 0;
                    margin-bottom: 10px;
                }

                /* 7) Tiêu đề luôn nằm ngay sau meta */
                .blog-one__title {
                    margin: 0 0 10px;
                }
            </style>
            <div class="row blog-list">
                @foreach($news as $new)
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <!--Blog One Start-->
                        <div class="blog-one__single">
                            <div class="blog-one__img">
                                <img src="{{ @$new->image->path ?? '' }}" alt="">
                                <a href="{{ route('front.blogDetail', $new->slug) }}">
                                    <span class="blog-one__plus"></span>
                                </a>
                            </div>
                            <div class="blog-one__content">
                                <div class="blog-one__date">
                                    <p> {{ \Carbon\Carbon::parse($new->created_at)->format('d/m/Y') }} </p>
                                </div>
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="{{ route('front.blogDetail', $new->slug) }}"><i class="far fa-user-circle"></i> by {{ @$new->user_create->name ?? '' }} </a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title"><a href="{{ route('front.blogDetail', $new->slug) }}">{{ $new->name }}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

{{--    --}}
{{--    <section class="feature-one">--}}
{{--        <div class="container">--}}
{{--            <ul class="list-unstyled feature-one__list">--}}
{{--                <!--Feature One Single-->--}}
{{--                <li class="feature-one__single wow fadeInLeft" data-wow-delay="100ms">--}}
{{--                    <div class="feature-one__content">--}}
{{--                        <div class="feature-one__shape-1">--}}
{{--                            <img src="/site/images/shapes/feature-one-shape-1.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="feature-one__shape-2">--}}
{{--                            <img src="/site/images/shapes/feature-one-shape-2.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="feature-one__icon">--}}
{{--                            <span class="icon-mind"></span>--}}
{{--                        </div>--}}
{{--                        <h3 class="feature-one__title"><a href="about.html">Smart Work</a></h3>--}}
{{--                        <p class="feature-one__text">There are many of pass of lorem ipsum available, but the--}}
{{--                            majority.</p>--}}
{{--                        <div class="feature-one__arrow">--}}
{{--                            <a href="about.html"><i class="fa fa-arrow-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <!--Feature One Single-->--}}
{{--                <li class="feature-one__single wow fadeInLeft" data-wow-delay="200ms">--}}
{{--                    <div class="feature-one__content">--}}
{{--                        <div class="feature-one__shape-1">--}}
{{--                            <img src="/site/images/shapes/feature-one-shape-1.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="feature-one__shape-2">--}}
{{--                            <img src="/site/images/shapes/feature-one-shape-2.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="feature-one__icon">--}}
{{--                            <span class="icon-wallpaper-2"></span>--}}
{{--                        </div>--}}
{{--                        <h3 class="feature-one__title"><a href="about.html">Unique Designs</a></h3>--}}
{{--                        <p class="feature-one__text">There are many of pass of lorem ipsum available, but the--}}
{{--                            majority.</p>--}}
{{--                        <div class="feature-one__arrow">--}}
{{--                            <a href="about.html"><i class="fa fa-arrow-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <!--Feature One Single-->--}}
{{--                <li class="feature-one__single wow fadeInLeft" data-wow-delay="300ms">--}}
{{--                    <div class="feature-one__content">--}}
{{--                        <div class="feature-one__shape-1">--}}
{{--                            <img src="/site/images/shapes/feature-one-shape-1.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="feature-one__shape-2">--}}
{{--                            <img src="/site/images/shapes/feature-one-shape-2.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="feature-one__icon">--}}
{{--                            <span class="icon-programmer"></span>--}}
{{--                        </div>--}}
{{--                        <h3 class="feature-one__title"><a href="team.html">Skilled Team</a></h3>--}}
{{--                        <p class="feature-one__text">There are many of pass of lorem ipsum available, but the--}}
{{--                            majority.</p>--}}
{{--                        <div class="feature-one__arrow">--}}
{{--                            <a href="team.html"><i class="fa fa-arrow-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <!--Feature One Single-->--}}
{{--                <li class="feature-one__single wow fadeInLeft" data-wow-delay="400ms">--}}
{{--                    <div class="feature-one__content">--}}
{{--                        <div class="feature-one__shape-1">--}}
{{--                            <img src="/site/images/shapes/feature-one-shape-1.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="feature-one__shape-2">--}}
{{--                            <img src="/site/images/shapes/feature-one-shape-2.png" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="feature-one__icon">--}}
{{--                            <span class="icon-best-price"></span>--}}
{{--                        </div>--}}
{{--                        <h3 class="feature-one__title"><a href="contact.html">Best Pricing</a></h3>--}}
{{--                        <p class="feature-one__text">There are many of pass of lorem ipsum available, but the--}}
{{--                            majority.</p>--}}
{{--                        <div class="feature-one__arrow">--}}
{{--                            <a href="contact.html"><i class="fa fa-arrow-right"></i></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    --}}

{{-- --}}
{{--    <section class="quality-work">--}}
{{--        <div class="quality-work-shape-1 float-bob-x">--}}
{{--            <img src="/site/images/shapes/quality-work-shape-1.png" alt="">--}}
{{--        </div>--}}
{{--        <div class="quality-work-shape-2 float-bob-y">--}}
{{--            <img src="/site/images/shapes/quality-work-shape-2.png" alt="">--}}
{{--        </div>--}}
{{--        <div class="quality-work-shape-3 float-bob-x">--}}
{{--            <img src="/site/images/shapes/quality-work-shape-3.png" alt="">--}}
{{--        </div>--}}
{{--        <div class="quality-work-shape-4">--}}
{{--            <img src="/site/images/shapes/quality-work-shape-4.png" alt="">--}}
{{--        </div>--}}
{{--        <div class="quality-work-shape-5 float-bob-x">--}}
{{--            <img src="/site/images/shapes/quality-work-shape-5.png" alt="">--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-6">--}}
{{--                    <div class="quality-work__left">--}}
{{--                        <div class="quality-work__img-box">--}}
{{--                            <div class="quality-work__img">--}}
{{--                                <img src="/site/images/resources/quality-work-img-1.png" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="quality-work__small-img">--}}
{{--                                <img src="/site/images/resources/quality-work-small-img.jpg" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="quality-work__video-box">--}}
{{--                                <div class="quality-work__curved-circle-box">--}}
{{--                                    <div class="curved-circle">--}}
{{--                                        <span class="curved-circle--item">NEW COLLECTION 2022.</span>--}}
{{--                                    </div><!-- /.curved-circle -->--}}
{{--                                    <div class="quality-work__video-link">--}}
{{--                                        <a href="https://www.youtube.com/watch?v=Get7rqXYrbQ" class="video-popup">--}}
{{--                                            <div class="quality-work__video-icon">--}}
{{--                                                <span class="fa fa-play"></span>--}}
{{--                                            </div>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-6">--}}
{{--                    <div class="quality-work__right">--}}
{{--                        <div class="section-title text-left">--}}
{{--                            <span class="section-title__tagline">Interior designing</span>--}}
{{--                            <h2 class="section-title__title">Quality Work That Meets Your Expectations</h2>--}}
{{--                            <div class="section-title__line"></div>--}}
{{--                        </div>--}}
{{--                        <p class="quality-work__text-1">There are many variations of passages of lorem ipsum--}}
{{--                            available but the majority have suffered.</p>--}}
{{--                        <ul class="list-unstyled quality-work__feature">--}}
{{--                            <li>--}}
{{--                                <div class="icon">--}}
{{--                                    <span class="icon-image-gallery1"></span>--}}
{{--                                </div>--}}
{{--                                <div class="text">--}}
{{--                                    <p>Innovative <br> Wallpaper Designs</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="icon">--}}
{{--                                    <span class="icon-wallpaper-5"></span>--}}
{{--                                </div>--}}
{{--                                <div class="text">--}}
{{--                                    <p>High Quality Wall <br> Materials</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        <p class="quality-work__text-2">There are many variations of passages of Lorem Ipsum--}}
{{--                            available, but the majority have suffered alteration in some form, by injected humour,--}}
{{--                            or randomised words which don't look even.</p>--}}
{{--                        <div class="quality-work__progress">--}}
{{--                            <div class="quality-work__progress-single">--}}
{{--                                <h4 class="quality-work__progress-title">Interior Wall Design</h4>--}}
{{--                                <div class="bar">--}}
{{--                                    <div class="bar-inner count-bar" data-percent="88%">--}}
{{--                                        <div class="count-text">88%</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="quality-work__progress-single">--}}
{{--                                <h4 class="quality-work__progress-title">Exterior Painting</h4>--}}
{{--                                <div class="bar marb-0">--}}
{{--                                    <div class="bar-inner count-bar" data-percent="60%">--}}
{{--                                        <div class="count-text">60%</div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{-- --}}


{{--  --}}

{{--  --}}
{{--    <section class="team-one">--}}
{{--        <div class="container">--}}
{{--            <div class="team-one__top">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-7 col-lg-6">--}}
{{--                        <div class="team-one__top-left">--}}
{{--                            <div class="section-title text-left">--}}
{{--                                <span class="section-title__tagline">Team members</span>--}}
{{--                                <h2 class="section-title__title">Meet the Expert Team</h2>--}}
{{--                                <div class="section-title__line"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-5 col-lg-6">--}}
{{--                        <div class="team-one__top-right">--}}
{{--                            <p class="team-one__top-text">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor to--}}
{{--                                incidut labore et dolore magna for aliqua.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="team-one__bottom">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">--}}
{{--                        <!--Team One single-->--}}
{{--                        <div class="team-one__single">--}}
{{--                            <div class="team-one__img-box">--}}
{{--                                <div class="team-one__img">--}}
{{--                                    <img src="/site/images/team/team-1-1.jpg" alt="">--}}
{{--                                    <div class="team-one__social">--}}
{{--                                        <a href="#"><i class="fab fa-twitter"></i></a>--}}
{{--                                        <a href="#"><i class="fab fa-facebook"></i></a>--}}
{{--                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>--}}
{{--                                        <a href="#"><i class="fab fa-instagram"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="team-one__content">--}}
{{--                                <div class="team-one__title-box">--}}
{{--                                    <div class="team-one__title-shape">--}}
{{--                                        <img src="/site/images/shapes/team-one-title-box-shape.png" alt="">--}}
{{--                                        <div class="team-one__title-text">--}}
{{--                                            <p class="team-one__title">Designer</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 class="team-one__name"><a href="team-details.html">David Cooper</a></h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">--}}
{{--                        <!--Team One single-->--}}
{{--                        <div class="team-one__single">--}}
{{--                            <div class="team-one__img-box">--}}
{{--                                <div class="team-one__img">--}}
{{--                                    <img src="/site/images/team/team-1-2.jpg" alt="">--}}
{{--                                    <div class="team-one__social">--}}
{{--                                        <a href="#"><i class="fab fa-twitter"></i></a>--}}
{{--                                        <a href="#"><i class="fab fa-facebook"></i></a>--}}
{{--                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>--}}
{{--                                        <a href="#"><i class="fab fa-instagram"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="team-one__content">--}}
{{--                                <div class="team-one__title-box">--}}
{{--                                    <div class="team-one__title-shape">--}}
{{--                                        <img src="/site/images/shapes/team-one-title-box-shape.png" alt="">--}}
{{--                                        <div class="team-one__title-text">--}}
{{--                                            <p class="team-one__title">Designer</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 class="team-one__name"><a href="team-details.html">Monica Manly</a></h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">--}}
{{--                        <!--Team One single-->--}}
{{--                        <div class="team-one__single">--}}
{{--                            <div class="team-one__img-box">--}}
{{--                                <div class="team-one__img">--}}
{{--                                    <img src="/site/images/team/team-1-3.jpg" alt="">--}}
{{--                                    <div class="team-one__social">--}}
{{--                                        <a href="#"><i class="fab fa-twitter"></i></a>--}}
{{--                                        <a href="#"><i class="fab fa-facebook"></i></a>--}}
{{--                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>--}}
{{--                                        <a href="#"><i class="fab fa-instagram"></i></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="team-one__content">--}}
{{--                                <div class="team-one__title-box">--}}
{{--                                    <div class="team-one__title-shape">--}}
{{--                                        <img src="/site/images/shapes/team-one-title-box-shape.png" alt="">--}}
{{--                                        <div class="team-one__title-text">--}}
{{--                                            <p class="team-one__title">Designer</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <h3 class="team-one__name"><a href="team-details.html">Kevin Martin</a></h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--  --}}

{{--    <section class="testimonial-one">--}}
{{--        <div class="testimonial-one-bg-box">--}}
{{--            <div class="testimonial-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"--}}
{{--                 style="background-image: url(/site/images/backgrounds/testimonial-one-bg.jpg);"></div>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-3">--}}
{{--                    <div class="testimonial-one__left">--}}
{{--                        <div class="section-title text-left">--}}
{{--                            <span class="section-title__tagline">testimonials</span>--}}
{{--                            <h2 class="section-title__title">What Our Customers Say?</h2>--}}
{{--                            <div class="section-title__line"></div>--}}
{{--                        </div>--}}
{{--                        <p class="testimonial-one__text">Lorem ipsum dolor sit amet elit, sed do eiusmod tempor to--}}
{{--                            incidut labore et dolore magna for aliqua.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-9">--}}
{{--                    <div class="testimonial-one__right">--}}
{{--                        <div class="owl-carousel owl-theme thm-owl__carousel testimonial-one__carousel"--}}
{{--                             data-owl-options='{--}}
{{--                                "loop": true,--}}
{{--                                "autoplay": false,--}}
{{--                                "margin": 30,--}}
{{--                                "nav": false,--}}
{{--                                "dots": true,--}}
{{--                                "smartSpeed": 500,--}}
{{--                                "autoplayTimeout": 10000,--}}
{{--                                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],--}}
{{--                                "responsive": {--}}
{{--                                    "0": {--}}
{{--                                        "items": 1--}}
{{--                                    },--}}
{{--                                    "768": {--}}
{{--                                        "items": 1--}}
{{--                                    },--}}
{{--                                    "992": {--}}
{{--                                        "items": 2--}}
{{--                                    },--}}
{{--                                    "1200": {--}}
{{--                                        "items": 2.25545--}}
{{--                                    }--}}
{{--                                }--}}
{{--                            }'>--}}
{{--                            <!--Testimonial One Single-->--}}
{{--                            <div class="testimonial-one__single">--}}
{{--                                <div class="testimonial-one__quote">--}}
{{--                                    <span class="icon-quotation"></span>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-one__text-2">Lorem ipsum dolor sit amet elit, sed do eiusmod--}}
{{--                                    tempor to incidut labore et dolore magna for aliqua. Quis ipsum suspendisse.</p>--}}
{{--                                <div class="testimonial-one__client-info">--}}
{{--                                    <div class="testimonial-one__img">--}}
{{--                                        <img src="/site/images/testimonial/testimonial-1-1.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="testimonial-one__client-content">--}}
{{--                                        <h4 class="testimonial-one__client-name">John Smith</h4>--}}
{{--                                        <p class="testimonial-one__client-title">Our Customer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--Testimonial One Single-->--}}
{{--                            <div class="testimonial-one__single">--}}
{{--                                <div class="testimonial-one__quote">--}}
{{--                                    <span class="icon-quotation"></span>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-one__text-2">Lorem ipsum dolor sit amet elit, sed do eiusmod--}}
{{--                                    tempor to incidut labore et dolore magna for aliqua. Quis ipsum suspendisse.</p>--}}
{{--                                <div class="testimonial-one__client-info">--}}
{{--                                    <div class="testimonial-one__img">--}}
{{--                                        <img src="/site/images/testimonial/testimonial-1-2.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="testimonial-one__client-content">--}}
{{--                                        <h4 class="testimonial-one__client-name">Sarah Albert</h4>--}}
{{--                                        <p class="testimonial-one__client-title">Our Customer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--Testimonial One Single-->--}}
{{--                            <div class="testimonial-one__single">--}}
{{--                                <div class="testimonial-one__quote">--}}
{{--                                    <span class="icon-quotation"></span>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-one__text-2">Lorem ipsum dolor sit amet elit, sed do eiusmod--}}
{{--                                    tempor to incidut labore et dolore magna for aliqua. Quis ipsum suspendisse.</p>--}}
{{--                                <div class="testimonial-one__client-info">--}}
{{--                                    <div class="testimonial-one__img">--}}
{{--                                        <img src="/site/images/testimonial/testimonial-1-3.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="testimonial-one__client-content">--}}
{{--                                        <h4 class="testimonial-one__client-name">Kevin Martin</h4>--}}
{{--                                        <p class="testimonial-one__client-title">Our Customer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--Testimonial One Single-->--}}
{{--                            <div class="testimonial-one__single">--}}
{{--                                <div class="testimonial-one__quote">--}}
{{--                                    <span class="icon-quotation"></span>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-one__text-2">Lorem ipsum dolor sit amet elit, sed do eiusmod--}}
{{--                                    tempor to incidut labore et dolore magna for aliqua. Quis ipsum suspendisse.</p>--}}
{{--                                <div class="testimonial-one__client-info">--}}
{{--                                    <div class="testimonial-one__img">--}}
{{--                                        <img src="/site/images/testimonial/testimonial-1-1.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="testimonial-one__client-content">--}}
{{--                                        <h4 class="testimonial-one__client-name">John Smith</h4>--}}
{{--                                        <p class="testimonial-one__client-title">Our Customer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--Testimonial One Single-->--}}
{{--                            <div class="testimonial-one__single">--}}
{{--                                <div class="testimonial-one__quote">--}}
{{--                                    <span class="icon-quotation"></span>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-one__text-2">Lorem ipsum dolor sit amet elit, sed do eiusmod--}}
{{--                                    tempor to incidut labore et dolore magna for aliqua. Quis ipsum suspendisse.</p>--}}
{{--                                <div class="testimonial-one__client-info">--}}
{{--                                    <div class="testimonial-one__img">--}}
{{--                                        <img src="/site/images/testimonial/testimonial-1-2.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="testimonial-one__client-content">--}}
{{--                                        <h4 class="testimonial-one__client-name">Sarah Albert</h4>--}}
{{--                                        <p class="testimonial-one__client-title">Our Customer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--Testimonial One Single-->--}}
{{--                            <div class="testimonial-one__single">--}}
{{--                                <div class="testimonial-one__quote">--}}
{{--                                    <span class="icon-quotation"></span>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-one__text-2">Lorem ipsum dolor sit amet elit, sed do eiusmod--}}
{{--                                    tempor to incidut labore et dolore magna for aliqua. Quis ipsum suspendisse.</p>--}}
{{--                                <div class="testimonial-one__client-info">--}}
{{--                                    <div class="testimonial-one__img">--}}
{{--                                        <img src="/site/images/testimonial/testimonial-1-3.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="testimonial-one__client-content">--}}
{{--                                        <h4 class="testimonial-one__client-name">Kevin Martin</h4>--}}
{{--                                        <p class="testimonial-one__client-title">Our Customer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--Testimonial One Single-->--}}
{{--                            <div class="testimonial-one__single">--}}
{{--                                <div class="testimonial-one__quote">--}}
{{--                                    <span class="icon-quotation"></span>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-one__text-2">Lorem ipsum dolor sit amet elit, sed do eiusmod--}}
{{--                                    tempor to incidut labore et dolore magna for aliqua. Quis ipsum suspendisse.</p>--}}
{{--                                <div class="testimonial-one__client-info">--}}
{{--                                    <div class="testimonial-one__img">--}}
{{--                                        <img src="/site/images/testimonial/testimonial-1-1.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="testimonial-one__client-content">--}}
{{--                                        <h4 class="testimonial-one__client-name">John Smith</h4>--}}
{{--                                        <p class="testimonial-one__client-title">Our Customer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--Testimonial One Single-->--}}
{{--                            <div class="testimonial-one__single">--}}
{{--                                <div class="testimonial-one__quote">--}}
{{--                                    <span class="icon-quotation"></span>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-one__text-2">Lorem ipsum dolor sit amet elit, sed do eiusmod--}}
{{--                                    tempor to incidut labore et dolore magna for aliqua. Quis ipsum suspendisse.</p>--}}
{{--                                <div class="testimonial-one__client-info">--}}
{{--                                    <div class="testimonial-one__img">--}}
{{--                                        <img src="/site/images/testimonial/testimonial-1-2.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="testimonial-one__client-content">--}}
{{--                                        <h4 class="testimonial-one__client-name">Sarah Albert</h4>--}}
{{--                                        <p class="testimonial-one__client-title">Our Customer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!--Testimonial One Single-->--}}
{{--                            <div class="testimonial-one__single">--}}
{{--                                <div class="testimonial-one__quote">--}}
{{--                                    <span class="icon-quotation"></span>--}}
{{--                                </div>--}}
{{--                                <p class="testimonial-one__text-2">Lorem ipsum dolor sit amet elit, sed do eiusmod--}}
{{--                                    tempor to incidut labore et dolore magna for aliqua. Quis ipsum suspendisse.</p>--}}
{{--                                <div class="testimonial-one__client-info">--}}
{{--                                    <div class="testimonial-one__img">--}}
{{--                                        <img src="/site/images/testimonial/testimonial-1-3.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="testimonial-one__client-content">--}}
{{--                                        <h4 class="testimonial-one__client-name">Kevin Martin</h4>--}}
{{--                                        <p class="testimonial-one__client-title">Our Customer</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}





{{--    <section class="newsletter">--}}
{{--        <div class="container">--}}
{{--            <div class="newsletter__inner wow fadeInUp" data-wow-delay="100ms">--}}
{{--                <div class="newsletter-shape-1"--}}
{{--                     style="background-image: url(/site/images/shapes/newsletter-shape-1.png);"></div>--}}
{{--                <div class="newsletter__left">--}}
{{--                    <h3 class="newsletter__title">Join Our Newsletter</h3>--}}
{{--                    <p class="newsletter__text">Lorem ipsum dolor amet, elit do eiusmod sed</p>--}}
{{--                </div>--}}
{{--                <div class="newsletter__right">--}}
{{--                    <form class="newsletter__form">--}}
{{--                        <div class="newsletter__input-box">--}}
{{--                            <input type="email" placeholder="Enter your email" name="email">--}}
{{--                            <button type="submit" class="thm-btn newsletter__btn">Subscribe</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

@endsection
@push('scripts')
    <script>
        // Hàm cân bằng chiều cao
        function equalizeFeatureHeights() {
            const items = document.querySelectorAll('.feature-one__content');
            let maxH = 0;

            // 1) Reset trước để đo lại chính xác
            items.forEach(el => el.style.height = 'auto');

            // 2) Tìm chiều cao lớn nhất
            items.forEach(el => {
                const h = el.offsetHeight;
                if (h > maxH) maxH = h;
            });

            // 3) Gán chiều cao max cho tất cả
            items.forEach(el => el.style.height = maxH + 'px');
        }

        // Chạy khi trang load xong và mỗi khi resize
        window.addEventListener('load', equalizeFeatureHeights);
        window.addEventListener('resize', equalizeFeatureHeights);
    </script>

@endpush
