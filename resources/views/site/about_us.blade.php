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
                    <li>Về chúng tôi</li>
                </ul>

                <h2>Về chúng tôi</h2>


            </div>
        </div>
    </section>

    <section class="about-two">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Về chúng tôi</span>
                <h2 class="section-title__title">{{ $config->web_title }}</h2>
                <div class="section-title__line"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="about-two__left">
                        {!! $config->web_des !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-two">
        <div class="testimonial-two-bg"
             style="background-image: url(assets/images/backgrounds/testimonial-two-bg.jpg);"></div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Đánh giá từ khách hàng</span>
                <h2 class="section-title__title">Khách hàng nói gì về {{ $config->short_name_company }}?</h2>
                <div class="section-title__line"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="testimonial-two__inner">
                        <div class="owl-carousel owl-theme thm-owl__carousel testimonial-one__carousel"
                             data-owl-options='{
                                "loop": true,
                                "autoplay": false,
                                "margin": 30,
                                "nav": false,
                                "dots": true,
                                "smartSpeed": 500,
                                "autoplayTimeout": 10000,
                                "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                                "responsive": {
                                    "0": {
                                        "items": 1
                                    },
                                    "768": {
                                        "items": 2
                                    },
                                    "992": {
                                        "items": 2
                                    },
                                    "1200": {
                                        "items": 3
                                    }
                                }
                            }'>

                            @foreach($reviews as $review)
                                <div class="testimonial-one__single">
                                    <div class="testimonial-one__quote">
                                        <span class="icon-quotation"></span>
                                    </div>
                                    <p class="testimonial-one__text-2">{{ $review->message }}</p>
                                    <div class="testimonial-one__client-info">
                                        <div class="testimonial-one__img" >
                                            <img src="{{ $review->image->path ?? '' }}" alt="" width="79" height="79">
                                        </div>
                                        <div class="testimonial-one__client-content">
                                            <h4 class="testimonial-one__client-name">{{ $review->name }}</h4>
                                            <p class="testimonial-one__client-title">{{ $review->position }}</p>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
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

@endsection

@push('scripts')
    <script>
    </script>

    <script>
        $(function(){
            var $carousel = $('.testimonial-one__carousel');

            function equalizeHeights() {
                var maxH = 0;
                // reset
                $carousel.find('.testimonial-one__single').css('height','auto');
                // tính max
                $carousel.find('.testimonial-one__single').each(function(){
                    maxH = Math.max( maxH, $(this).outerHeight() );
                });
                // gán cho tất cả
                $carousel.find('.testimonial-one__single').css('height', maxH + 'px');
            }

            // Khi Owl khởi tạo xong hoặc refresh (thêm/resize)
            $carousel.on('initialized.owl.carousel refreshed.owl.carousel', function(){
                equalizeHeights();
            });

            // Force refresh 1 lần để khơi event trên (nếu bạn chỉ dùng data-owl-options)
            $carousel.trigger('refresh.owl.carousel');

            // Re-equalize mỗi khi window resize
            $(window).on('resize', equalizeHeights);
        });
    </script>




@endpush
