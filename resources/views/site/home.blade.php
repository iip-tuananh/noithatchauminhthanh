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
    <section class="main-slider-three">
        <div class="main-slider-three__carousel thm-owl__carousel owl-carousel" data-owl-options='{
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
                    <img src="{{ @$banner->image->path ?? '' }}" alt="">
                </div>
            @endforeach

        </div>
    </section>

    <!--Main Slider End-->
    <section class="about-one">
        <div class="about-one-shape-2 float-bob-x"></div>
        <div class="about-one-wall">
            <img src="/site/images/about-one-wall.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-6" style="margin: auto">
                    <div class="about-one__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Về Chúng Tôi</span>
                            <h2 class="section-title__title">{{ $about->title }}</h2>
                            <div class="section-title__line"></div>
                        </div>
                        <div>
                            {!! $about->intro !!}
                        </div>
                        <div class="about-one__contact-us">
                            <div class="about-one__btn-box">
                                <a href="{{ route('front.abouts') }}" class="thm-btn about-one__btn">Xem Thêm</a>
                            </div>
                            <div class="about-one__call">
                                <div class="about-one__call-icon">
                                    <span class="icon-phone-call"></span>
                                </div>
                                <div class="about-one__call-text">
                                    <p>Hotline</p>
                                    <a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="about-one__right">
                        <div class="about-one__img-box wow slideInRight" data-wow-delay="100ms"
                             data-wow-duration="2500ms">
                            <div class="about-one__img">
                                <img src="{{ $about->image->path ?? '' }}" alt="">
                            </div>
                            <div class="about-one__small-img">
                                <img src="{{ $about->image_back->path ?? '' }}" alt="">
                            </div>
                            <div class="about-one__shape-1 float-bob-y"></div>
                            <div class="about-one__dot">
                                <img src="/site/images/about-one-dots.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($categoryServicesFetured->count())
        @foreach($categoryServicesFetured as $categorySerFeture)
            <section class="about-one">
                <div class="container">
                    <div class="section-title text-center">
                        <h2 class="section-title__title">{{ $categorySerFeture->name }}</h2>
                        <div class="section-title__line"></div>
                    </div>
                    <style>
                        /* 1) Đảm bảo mỗi item cùng chiều cao */
                        .testimonial-one__carousel .blog-one__single {
                            display: flex;
                            flex-direction: column;
                            height: 100%;
                        }

                        /* Phần ảnh không giãn */
                        .testimonial-one__carousel .blog-one__img {
                            flex: 0 0 auto;
                        }

                        /* Phần content giãn theo chiều dọc */
                        .testimonial-one__carousel .blog-one__content {
                            flex: 1 1 auto;
                            display: flex;
                            flex-direction: column;
                            /*justify-content: space-between;*/
                        }

                        /* 2) Giới hạn title và description */
                        /* (nếu bạn muốn title cũng clamp, copy tương tự p bên dưới) */
                        .testimonial-one__carousel .blog-one__content p {
                            margin: 0.5rem 0 0;
                            overflow: hidden;
                            display: -webkit-box;
                            -webkit-box-orient: vertical;
                            -webkit-line-clamp: 4; /* Giới hạn 3 dòng */
                        }

                        /* Tùy chọn: độ cao tối thiểu để canh đều */
                        .testimonial-one__carousel .blog-one__single {
                            min-height: 350px; /* hoặc giá trị phù hợp với bạn */
                        }
                        .testimonial-one__carousel .blog-one__content .blog-one__title a {
                            display: -webkit-box;
                            -webkit-box-orient: vertical;
                            -webkit-line-clamp: 3;
                            overflow: hidden;
                        }
                    </style>
                    <div class="team-one__bottom">
                        <div class="testimonial-one__right">
                            <div class="owl-carousel owl-theme thm-owl__carousel testimonial-one__carousel"
                                 data-owl-options='{
               "loop": false,
               "autoplay": true,
               "margin": 30,
               "nav": true,
               "dots": false,
               "smartSpeed": 500,
               "autoplayTimeout": 3000,
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
               "items": 4
               }
               }
               }'>
                                @foreach($categorySerFeture->services as $service)
                                    <div class="blog-one__single">
                                        <div class="blog-one__img">
                                            <img src="{{ @$service->image->path ?? '' }}" alt="">
                                            <a href="{{ route('front.getServiceDetail', $service->slug) }}">
                                                <span class="blog-one__plus"></span>
                                            </a>
                                        </div>
                                        <div class="blog-one__content ">
                                            <h3 class="blog-one__title "><a href="{{ route('front.getServiceDetail', $service->slug) }}" title="{{ $service->name}}">{{ $service->name}}</a></h3>
                                            <p title="{{ $service->description}}" class="">{{ $service->description}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @endif

    <!--Feature One End-->
    <!--Services One Start-->
    <section class="services-one">
        <div class="services-one-bg-box">
            <div class="services-one-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                 style="background-image: url(/site/images/services-one-bg.jpg);"></div>
        </div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Our Services</span>
                <h2 class="section-title__title">Nghành nghề</h2>
                <div class="section-title__line"></div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <!--Services One Single-->
                    <div class="services-one__single wow fadeInUp" data-wow-delay="100ms">
                        <div class="services-one__img">
                            <a href="{{ route('front.products') }}">
                                <img src="/site/images/2251.jpg" alt="">
                            </a>

                        </div>
                        <div class="services-one__content">
                            <h3 class="services-one__title"><a href="{{ route('front.products') }}">Nội Thất</a></h3>
                            <div class="services-one__text line_3" title="Chúng tôi cung cấp dịch vụ thi công và thiết kế nội thất trọn gói">
                                Chúng tôi cung cấp dịch vụ thi công và thiết kế nội thất trọn gói
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($categoryServices as $categoryService)
                    <div class="col-xl-3 col-lg-3">
                        <!--Services One Single-->
                        <div class="services-one__single wow fadeInUp" data-wow-delay="100ms">
                            <div class="services-one__img">
                                <a href="{{route('front.services', ['parentSlug' => $categoryService->slug])}}">
                                    <img src="{{ @$categoryService->image->path ?? '' }}" alt="">
                                </a>
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="{{route('front.services', ['parentSlug' => $categoryService->slug])}}" title="{{ $categoryService->name }}">{{ $categoryService->name }}</a></h3>
                                <div class="services-one__text line_3" title="{{ $categoryService->intro }}">{{ $categoryService->intro }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Services One End-->

    <!--Project One Start-->
    <section class="project-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Dự Án</span>
                <h2 class="section-title__title">Công Trình Triển Khai</h2>
                <div class="section-title__line"></div>
            </div>
            <div class="project-one__inner">
                <div class="project-one__main-content">
                    <div class="swiper-container" id="project-one__carousel">

                        <div class="swiper-wrapper">
                            @foreach($projects as $project)
                                <div class="swiper-slide">
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
                                                        <img src="/site/images/project-one-shape-1.png" alt="">
                                                    </div>
                                                    <div class="project-one__content">
                                                        <h4 class="project-one__title">{{ $project->name }}</h4>
                                                        <div class="project-one__text line_3" style="margin-bottom: 20px">
                                                            {{ $project->description }}
                                                        </div>
                                                        <a href="{{ route('front.getProjectDetail', $project->slug) }}"
                                                           class="thm-btn project-one__btn">Chi Tiết Dự Án</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

                <div class="project-one__thumb-box">
                    <div class="swiper-container" id="project-one__thumb">
                        <div class="swiper-wrapper">
                            @foreach($projects as $project)
                                <div class="swiper-slide">
                                    <div class="project-one__img-holder">
                                        <img src="{{ @$project->image->path ?? '' }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="project-one__nav">
                        <div class="swiper-button-prev" id="project-one__swiper-button-next">
                            <i class="fa fa-angle-right angle-left"></i>
                        </div>
                        <div class="swiper-button-next" id="project-one__swiper-button-prev">
                            <i class="fa fa-angle-right"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-one__more-project">
                        <div class="project-one__more-project-content">
                            <p class="mb-0">Chúng tôi có tới hơn 300 dự án đã hoàn thành <a href="{{ route('front.projects') }}">Xem Thêm Dự Án</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Project One End-->
    <section class="message-one" >
        <div class="message-one-bg" style="background-image: url(/site/images/message-one-bg.html);">
        </div>
        <div class="message-one-shape-1 float-bob-x"></div>
        <div class="message-one-shape-2 float-bob-y"></div>
        <div class="message-one-shape-3 float-bob-y"></div>
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">Contact us</span>
                <h2 class="section-title__title">Yêu Cầu Tư Vấn</h2>
                <div class="section-title__line"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="message-one__form">
                        <form action="{{ route('front.submitContact') }}" class="comment-one__form" id="form-contact">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="comment-form__input-box">
                                        <input type="hidden" name="type" value="send_info">
                                        <input type="text" placeholder="Họ Tên" name="name" required>

                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Số điện thoại" name="phone" required>

                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="comment-form__input-box">
                                        <input type="text" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="comment-form__btn-box">
                                        <button type="submit" class="thm-btn comment-form__btn">Gửi Thông Tin</button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                            <h2 class="section-title__title">Đối tác tiêu biểu</h2>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="brand-one__main-content">
                            <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                     "0": {
                     "spaceBetween": 30,
                     "slidesPerView": 2
                     },
                     "375": {
                     "spaceBetween": 30,
                     "slidesPerView": 2
                     },
                     "575": {
                     "spaceBetween": 30,
                     "slidesPerView": 3
                     },
                     "767": {
                     "spaceBetween": 50,
                     "slidesPerView": 4
                     },
                     "991": {
                     "spaceBetween": 50,
                     "slidesPerView": 5
                     },
                     "1199": {
                     "spaceBetween": 100,
                     "slidesPerView": 5
                     }
                     }}'>
                                <div class="swiper-wrapper">
                                    @foreach($partners as $partner)
                                        <div class="swiper-slide">
                                            <img src="{{ @$partner->image->path ?? '' }}" alt="{{ $partner->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Brand One End-->
    <!--Blog One Start-->
    <section class="blog-one">
        <div class="container">
            <div class="section-title text-center">
                <span class="section-title__tagline">News & Updates</span>
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



@endsection
@push('scripts')
    <script>
        // // Hàm cân bằng chiều cao
        // function equalizeFeatureHeights() {
        //     const items = document.querySelectorAll('.feature-one__content');
        //     let maxH = 0;
        //
        //     // 1) Reset trước để đo lại chính xác
        //     items.forEach(el => el.style.height = 'auto');
        //
        //     // 2) Tìm chiều cao lớn nhất
        //     items.forEach(el => {
        //         const h = el.offsetHeight;
        //         if (h > maxH) maxH = h;
        //     });
        //
        //     // 3) Gán chiều cao max cho tất cả
        //     items.forEach(el => el.style.height = maxH + 'px');
        // }
        //
        // // Chạy khi trang load xong và mỗi khi resize
        // window.addEventListener('load', equalizeFeatureHeights);
        // window.addEventListener('resize', equalizeFeatureHeights);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('form-contact');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // helper: xoá hết lỗi cũ
            function clearErrors() {
                form.querySelectorAll('[data-error-for]').forEach(div => {
                    div.textContent = '';
                    div.style.display = 'none';
                });
            }

            // helper: show lỗi theo từng field
            function showErrors(errors) {
                Object.keys(errors).forEach(field => {
                    const errDiv = form.querySelector(`[data-error-for="${field}"]`);
                    if (errDiv) {
                        errDiv.textContent = errors[field][0];
                        errDiv.style.display = 'block';
                    }
                });
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                clearErrors();

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: formData
                })
                    .then(res => res.json())
                    .then(response => {
                        if (response.success) {
                            toastr.success('Gửi thông tin thành công');
                            form.reset();
                        } else {
                            // hiển thị lỗi từng field
                            showErrors(response.errors || {});
                            toastr.warning(response.message || 'Vui lòng kiểm tra lại thông tin.');
                        }
                    })
                    .catch(() => {
                        toastr.error('Đã có lỗi xảy ra, vui lòng thử lại.');
                    });
            });
        });
    </script>

@endpush
