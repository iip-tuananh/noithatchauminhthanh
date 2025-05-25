@extends('site.layouts.master')
@section('title')
    {{ $config->web_title }}
@endsection
@section('description')
    {{ $config->web_des }}
@endsection
@section('image')
@endsection

@section('css')

@endsection

@section('content')
    <section class="page-header">
        <div class="page-header-bg" style="background-image: url(/site/images/backgrounds/page-header-bg.jpg)">
        </div>
        <div class="container">
            <div class="page-header__inner">
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                    <li><span>/</span></li>
                    <li>{{ $category->name }}</li>
                </ul>
                <h2>{{ $product->name }}</h2>
            </div>
        </div>
    </section>

    <section class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__img">
                        <div class="product-gallery">
                            <!-- Ảnh chính -->
                            <style>
                                #sync2 .owl-item {
                                    cursor: pointer;
                                    opacity: 0.6;
                                }
                                #sync2 .owl-item.current {
                                    opacity: 1;
                                }
                                #sync2 .owl-item.current img {
                                }
                                #sync2 img {
                                    display: block;
                                    width: 100%;
                                    height: auto;
                                }

                                .product-gallery {
                                    position: relative; /* giúp nav được absolutely positioned trên ảnh */
                                }

                                /* 1. Đặt nav lên trên ảnh, canh giữa theo chiều dọc */
                                #sync1 .owl-nav {
                                    position: absolute;
                                    top: 50%;
                                    left: 0;
                                    width: 100%;
                                    display: flex;
                                    justify-content: space-between;
                                    transform: translateY(-50%);
                                    pointer-events: none;   /* để chỉ button nhận pointer */
                                    z-index: 10;
                                }

                                /* 2. Style cho từng nút prev/next thành hình tròn mờ */
                                #sync1 .owl-nav .owl-prev,
                                #sync1 .owl-nav .owl-next {
                                    pointer-events: all;    /* bật nhận sự kiện chuột */
                                    background: rgba(255, 255, 255, 0.6);
                                    width: 40px;
                                    height: 40px;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    border: none;
                                    transition: background 0.2s ease;
                                }

                                /* 3. Hover làm nền sáng hơn */
                                #sync1 .owl-nav .owl-prev:hover,
                                #sync1 .owl-nav .owl-next:hover {
                                    background: rgba(255, 255, 255, 0.9);
                                }

                                /* 4. Icon mũi tên bên trong */
                                #sync1 .owl-nav .owl-prev i,
                                #sync1 .owl-nav .owl-next i {
                                    color: #333;
                                    font-size: 18px;
                                }
                            </style>

                            <style>
                                /* 1) Cho cả item (main + thumb) cùng khung 4:3 */
                                #sync1 .owl-item .item,
                                #sync2 .owl-item .item {
                                    position: relative;
                                    width: 100%;
                                    padding-top: 75%;      /* 3/4 = 75%, tương đương aspect-ratio 4:3 */
                                    overflow: hidden;
                                }

                                /* 2) Ảnh phủ kín khung, crop đều */
                                #sync1 .owl-item .item img,
                                #sync2 .owl-item .item img {
                                    position: absolute;
                                    top: 0; left: 0;
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                }

                                /* 3) Nếu muốn thumbnail thấp hơn chính một chút, có thể giảm padding-top */
                                @media (max-width: 768px) {
                                    #sync2 .owl-item .item {
                                        padding-top: 50%;    /* ví dụ thumb vuông (1:1) */
                                    }
                                }
                            </style>
                            <div id="sync1" class="owl-carousel owl-theme">
                                @foreach($product->galleries as $gallery )
                                    <div class="item"><img src="{{@$gallery->image->path ?? ''}}" alt=""></div>
                                @endforeach
                                <!-- ... -->
                            </div>

                            <!-- Thumbnails -->
                            <div id="sync2" class="owl-carousel owl-theme" style="margin-top: 10px">
                                @foreach($product->galleries as $gallery )
                                    <div class="item"><img src="{{@$gallery->image->path ?? ''}}" alt=""></div>
                                @endforeach
                                <!-- ... -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <div class="product-details__top">
                        <h3 class="product-details__title">{{ $product->name }} </h3>
                    </div>
                    <div class="product-details__reveiw">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-details__content">
                        <p class="product-details__content-text1">
                            {!! $product->intro !!}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="product-description">
        <div class="container">
            <h3 class="product-description__title">Thông tin sản phẩm</h3>
            <p class="product-description__text1">
                {!! $product->body !!}
            </p>


        </div>
    </section>

    <section class="about-one">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title__title">Sản phẩm tương tự</h2>
                <div class="section-title__line"></div>
            </div>

            <style>
                /* 1. Card chính luôn dàn theo chiều dọc */
                .thm-owl__carousel .owl-item .project-three__single {
                    display: flex;
                    flex-direction: column;
                    height: 100%; /* chiếm trọn container .owl-item */
                }

                /* 2. Khung ảnh cố định chiều cao, ví dụ 250px */
                .thm-owl__carousel .project-three__img-box {
                    flex-shrink: 0;  /* không bị co lại */
                }
                .thm-owl__carousel .project-three__img-box .project-three__img {
                    width: 100%;
                    height: 250px;   /* chỉnh cao tuỳ ý */
                    overflow: hidden;
                }
                /* 3. Ảnh phủ kín khung, crop đều */
                .thm-owl__carousel .project-three__img-box .project-three__img img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }

                /* 4. Phần nội dung phía dưới ảnh co giãn để card luôn cùng chiều cao */
                .thm-owl__carousel .project-three__content {
                    flex: 1;
                    padding: 15px;
                    /* nếu muốn canh giữa nội dung theo chiều dọc: */
                    /* display: flex; flex-direction: column; justify-content: center; */
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
                @foreach($products as $pro)
                    <div class="item">
                        <!--Project Three Single-->
                        <div class="project-three__single">
                            <div class="project-three__img-box">
                                <div class="project-three__img">
                                    <img src="{{ @$pro->image->path ?? '' }}" alt="">
                                    <div class="project-three__arrow">
                                        <a href="{{ route('front.get-product-detail', $pro->slug) }}"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                    <div class="project-three__content">
                                        <h3 class="project-three__title">
                                            <a href="{{ route('front.get-product-detail', $pro->slug) }}">{{ $pro->name }}</a>
                                        </h3>
                                        {{--                                        <p class="project-three__sub-title">{{ $cateProduct->name }}</p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>

@endsection

@push('scripts')
{{--    <script>--}}
{{--        $(document).ready(function() {--}}

{{--            var sync1 = $("#sync1");--}}
{{--            var sync2 = $("#sync2");--}}
{{--            var slidesPerPage = 4; //globaly define number of elements per page--}}
{{--            var syncedSecondary = true;--}}

{{--            sync1.owlCarousel({--}}
{{--                items : 1,--}}
{{--                slideSpeed : 2000,--}}
{{--                nav: false,--}}
{{--                autoplay: false,--}}
{{--                dots: false ,--}}
{{--                loop: true,--}}
{{--                responsiveRefreshRate : 200,--}}
{{--                navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],--}}
{{--            }).on('changed.owl.carousel', syncPosition);--}}

{{--            sync2--}}
{{--                .on('initialized.owl.carousel', function () {--}}
{{--                    sync2.find(".owl-item").eq(0).addClass("current");--}}
{{--                })--}}
{{--                .owlCarousel({--}}
{{--                    items : slidesPerPage,--}}
{{--                    dots: false,--}}
{{--                    nav: true,--}}
{{--                    margin:5,--}}
{{--                    smartSpeed: 200,--}}
{{--                    slideSpeed : 500,--}}
{{--                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],--}}
{{--                    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel--}}
{{--                    responsiveRefreshRate : 100--}}
{{--                }).on('changed.owl.carousel', syncPosition2);--}}

{{--            function syncPosition(el) {--}}
{{--                //if you set loop to false, you have to restore this next line--}}
{{--                //var current = el.item.index;--}}

{{--                //if you disable loop you have to comment this block--}}
{{--                var count = el.item.count-1;--}}
{{--                var current = Math.round(el.item.index - (el.item.count/2) - .5);--}}

{{--                if(current < 0) {--}}
{{--                    current = count;--}}
{{--                }--}}
{{--                if(current > count) {--}}
{{--                    current = 0;--}}
{{--                }--}}

{{--                //end block--}}

{{--                sync2--}}
{{--                    .find(".owl-item")--}}
{{--                    .removeClass("current")--}}
{{--                    .eq(current)--}}
{{--                    .addClass("current");--}}
{{--                var onscreen = sync2.find('.owl-item.active').length - 1;--}}
{{--                var start = sync2.find('.owl-item.active').first().index();--}}
{{--                var end = sync2.find('.owl-item.active').last().index();--}}

{{--                if (current > end) {--}}
{{--                    sync2.data('owl.carousel').to(current, 100, true);--}}
{{--                }--}}
{{--                if (current < start) {--}}
{{--                    sync2.data('owl.carousel').to(current - onscreen, 100, true);--}}
{{--                }--}}
{{--            }--}}

{{--            function syncPosition2(el) {--}}
{{--                if(syncedSecondary) {--}}
{{--                    var number = el.item.index;--}}
{{--                    sync1.data('owl.carousel').to(number, 100, true);--}}
{{--                }--}}
{{--            }--}}

{{--            sync2.on("click", ".owl-item", function(e){--}}
{{--                e.preventDefault();--}}
{{--                var number = $(this).index();--}}
{{--                sync1.data('owl.carousel').to(number, 300, true);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            var sync1 = $('#sync1'),--}}
{{--                sync2 = $('#sync2'),--}}
{{--                slidesCount = {{ $product->galleries->count() }};--}}

{{--            // 1) Carousel chính--}}
{{--            sync1.owlCarousel({--}}
{{--                items: 1,--}}
{{--                loop: true,--}}
{{--                nav: true,--}}
{{--                dots: false,--}}
{{--                autoplay: false,--}}
{{--                navText: [--}}
{{--                    '<i class="fa fa-chevron-left"></i>',--}}
{{--                    '<i class="fa fa-chevron-right"></i>'--}}
{{--                ]--}}
{{--            }).on('changed.owl.carousel', syncPosition);--}}

{{--            // 2) Carousel thumbnail (loop: false để không sinh clone)--}}
{{--            sync2.owlCarousel({--}}
{{--                items: 4,--}}
{{--                loop: false,--}}
{{--                margin: 10,--}}
{{--                nav: false,--}}
{{--                dots: false,--}}
{{--                responsive: {--}}
{{--                    0:   { items: 3 },--}}
{{--                    600: { items: 4 }--}}
{{--                }--}}
{{--            })--}}
{{--                // đánh dấu thumbnail đầu tiên khi init xong--}}
{{--                .on('initialized.owl.carousel', function(){--}}
{{--                    sync2.find('.owl-item').eq(0).addClass('current');--}}
{{--                })--}}
{{--                // click vào thumbnail => chuyển ảnh chính--}}
{{--                .on('click', '.owl-item', function(e){--}}
{{--                    e.preventDefault();--}}
{{--                    var index = $(this).index();--}}
{{--                    sync1.trigger('to.owl.carousel', [index, 300, true]);--}}
{{--                });--}}

{{--            // 3) Hàm đồng bộ vị trí và đánh dấu đúng thumbnail--}}
{{--            function syncPosition(event) {--}}
{{--                // event.item.count = tổng slide gốc (có thể bỏ clone tính trong sync1)--}}
{{--                var count = slidesCount;--}}
{{--                // event.item.index = vị trí hiện tại tính cả clones--}}
{{--                var idx   = event.item.index;--}}
{{--                // modulo để ra index thật của slide gốc--}}
{{--                var realIndex = ((idx % count) + count) % count;--}}

{{--                // gỡ hết, rồi đánh dấu lại--}}
{{--                sync2--}}
{{--                    .find('.owl-item')--}}
{{--                    .removeClass('current')--}}
{{--                    .eq(realIndex)--}}
{{--                    .addClass('current');--}}

{{--                // nếu thumbnail hiện tại không visible, scroll nó vào view--}}
{{--                var visible = sync2.find('.owl-item.active').length - 1;--}}
{{--                var start   = sync2.find('.owl-item.active').first().index();--}}
{{--                var end     = sync2.find('.owl-item.active').last().index();--}}

{{--                if (realIndex > end) {--}}
{{--                    sync2.trigger('to.owl.carousel', [ realIndex - visible, 100, true ]);--}}
{{--                }--}}
{{--                if (realIndex < start) {--}}
{{--                    sync2.trigger('to.owl.carousel', [ realIndex, 100, true ]);--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}

{{--    </script>--}}

    <script>
        $(document).ready(function(){
            var sync1 = $('#sync1'),
                sync2 = $('#sync2'),
                slidesCount = {{ $product->galleries->count() }};

            // 1) Thumbnail: bind event trước khi init
            sync2
                .on('initialized.owl.carousel', function(){
                    // đánh dấu thumbnail đầu tiên
                    sync2.find('.owl-item').removeClass('current')
                        .eq(0).addClass('current');
                })
                .owlCarousel({
                    items: 4,
                    loop: false,
                    margin: 10,
                    dots: false,
                    nav: false,
                    responsive: {
                        0:   { items: 3 },
                        600: { items: 4 }
                    }
                })
                .on('click', '.owl-item', function(e){
                    e.preventDefault();
                    var index = $(this).index();
                    sync1.trigger('to.owl.carousel', [index, 300, true]);
                });

            // 2) Main carousel
            sync1
                .owlCarousel({
                    items: 1,
                    loop: true,
                    nav: true,
                    dots: false,
                    navText: [
                        '<i class="fa fa-chevron-left"></i>',
                        '<i class="fa fa-chevron-right"></i>'
                    ]
                })
                .on('changed.owl.carousel', syncPosition);

            // 3) Hàm đồng bộ vị trí
            function syncPosition(event) {
                var count     = slidesCount,
                    idx       = event.item.index,
                    realIndex = ((idx % count) + count) % count;

                sync2
                    .find('.owl-item')
                    .removeClass('current')
                    .eq(realIndex)
                    .addClass('current');

                // cuộn thumbnail vào view nếu cần
                var visible = sync2.find('.owl-item.active').length - 1,
                    start   = sync2.find('.owl-item.active').first().index(),
                    end     = sync2.find('.owl-item.active').last().index();

                if (realIndex > end)   sync2.trigger('to.owl.carousel', [ realIndex - visible, 100, true ]);
                if (realIndex < start) sync2.trigger('to.owl.carousel', [ realIndex,            100, true ]);
            }

            // 4) Kích hoạt slide đầu (để chạy syncPosition ngay)
            sync1.trigger('to.owl.carousel', [0, 0, true]);

        });

    </script>
@endpush
