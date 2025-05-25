<header class="main-header clearfix">
    <div class="main-header__top">
        <div class="container">
            <div class="main-header__top-inner clearfix">
                <div class="main-header__logo">
                    <a href="{{ route('front.home-page') }}">
                        <img src="{{@$config->image->path ?? ''}}" alt="" class="dark-logo">
                        <img src="{{@$config->image->path ?? ''}}" alt="" class="light-logo">
                    </a>
                </div>
                <div class="main-header__top-right">
                    <div class="main-header__top-right-content">
                        <div class="main-header__top-address-box">
                            <ul class="list-unstyled main-header__top-address">
                                <li>
                                    <div class="icon">
                                        <span class="icon-phone-call"></span>
                                    </div>
                                    <div class="content">
                                        <p>Hỗ trợ 24/7</p>
                                        <h5><a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-message"></span>
                                    </div>
                                    <div class="content">
                                        <p>Email</p>
                                        <h5><a href="mailto:{{ $config->email }}">{{ $config->email }}</a></h5>
                                    </div>
                                </li>
{{--                                <li>--}}
{{--                                    <div class="icon icon--location">--}}
{{--                                        <span class="icon-location"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <p>Địa chỉ</p>--}}
{{--                                        <h5>{{ $config->address_company }}</h5>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                        <div class="main-header__top-right-social">
                            <a href="{{$config->twitter}}"><i class="fab fa-twitter"></i></a>
                            <a href="{{$config->facebook}}"><i class="fab fa-facebook"></i></a>
                            <a href="{{$config->youtube}}"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu clearfix">
        <div class="main-menu__wrapper clearfix">
            <div class="container">
                <div class="main-menu__wrapper-inner clearfix">
                    <div class="main-menu__left">
                        <div class="main-menu__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li>
                                    <a href="{{ route('front.home-page') }}">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.abouts') }}">Giới thiệu</a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Dịch vụ </a>
                                        <ul class="sub-menu">
                                            @foreach($serviceCategories as $cateService)
                                            <li class="{{ $cateService->childs()->count() ? 'dropdown' : ''}}">
                                                <a href="{{route('front.services', ['parentSlug' => $cateService->slug])}}">{{ $cateService->name }}</a>
                                                @if($cateService->childs()->count())
                                                    <ul class="sub-menu">
                                                        @foreach($cateService->childs as $serv)
                                                            <li><a href="{{route('front.services', ['parentSlug' => $cateService->slug, 'slug' => $serv->slug])}}">{{ $serv->name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Nội thất</a>
                                    <ul>
                                        @foreach($categoriesProduct as $cateProduct)
                                            <li><a href="{{route('front.products', $cateProduct->slug)}}">{{ $cateProduct->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('front.projects') }}">Dự án</a>
                                </li>
                                <li>
                                    <a href="{{ route('front.blogs') }}">Tin tức</a>
                                </li>

                                <li><a href="{{ route('front.contact') }}">Liên hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-menu__right">
                        <div class="main-menu__search-btn-box">
                            <div class="main-menu__search-box">
                                <a href="#" class="main-menu__search search-toggler icon-magnifying-glass"></a>
                            </div>
                            <div class="main-menu__btn-box">
                                <a href="{{ route('front.contact') }}" class="thm-btn main-menu__btn">Tư vấn ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
