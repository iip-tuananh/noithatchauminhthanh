<footer class="site-footer">
    <div class="site-footer-bg" style="background-image: url(/site/images/backgrounds/site-footer-bg.jpg);">
    </div>
    <div class="site-footer__top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo">
                            <a href="{{route('front.home-page')}}"><img src="{{$config->image->path ?? ''}}" alt="" style="max-width: 200px"></a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            <p class="footer-widget__about-text">{{ $config->web_title }}</p>
                        </div>
                        <div class="site-footer__social">
                            <a href="{{$config->twitter}}"><i class="fab fa-twitter"></i></a>
                            <a href="{{$config->facebook}}"><i class="fab fa-facebook"></i></a>
                            <a href="{{$config->youtube}}"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__contact clearfix">
                        <style>
                            /* 1) Mỗi <li> thành flex, icon và text đứng cạnh nhau */
                            .footer-widget__contact-list li {
                                display: flex;
                                align-items: flex-start;    /* hoặc center nếu muốn icon luôn nằm giữa dòng */
                                margin-bottom: 20px;        /* khoảng cách giữa các mục */
                            }

                            /* 2) Khung .icon cố định kích thước */
                            .footer-widget__contact-list .icon {
                                flex: 0 0 40px;             /* rộng cố định 40px */
                                height: 40px;               /* cao cố định 40px */
                                margin-right: 12px;         /* khoảng cách sang text */
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }

                            /* 3) Icon font bên trong */
                            .footer-widget__contact-list .icon span {
                                font-size: 24px;            /* điều chỉnh kích thước icon */
                                line-height: 1;
                            }

                            /* 4) Phần text giãn để chiếm không gian còn lại */
                            .footer-widget__contact-list .text {
                                flex: 1;
                            }

                            /* 5) Tinh chỉnh nếu cần */
                            .footer-widget__contact-list .text h5 {
                                margin: 0 0 4px;
                                font-size: 1rem;
                            }
                            .footer-widget__contact-list .text p {
                                margin: 0;
                                font-size: 0.9rem;
                            }

                        </style>
                        <h3 class="footer-widget__title">Liên hệ</h3>
                        <ul class="footer-widget__contact-list list-unstyled clearfix">
                            <li>
                                <div class="icon">
                                    <span class="icon-phone-call"></span>
                                </div>
                                <div class="text">
                                    <h5>Hỗ trợ 24/7</h5>
                                    <p><a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-message"></span>
                                </div>
                                <div class="text">
                                    <h5>Email</h5>
                                    <p><a href="mailto:{{ $config->email }}">{{ $config->email }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-location"></span>
                                </div>
                                <div class="text">
                                    <h5>Địa chỉ</h5>
                                    <p>{{ $config->address_company }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__explore clearfix">
                        <h3 class="footer-widget__title">Nội thất</h3>
                        <ul class="footer-widget__explore-list list-unstyled clearfix">
                            @foreach($categoriesProduct as $cateProduct)
                                <li><a href="{{route('front.products', $cateProduct->slug)}}">{{ $cateProduct->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <div class="footer-widget__column footer-widget__services clearfix">
                        <h3 class="footer-widget__title">Vị trí</h3>
                        {!! $config->location !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© Copyright 2025 by <a href="#">LTA Team</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
