<header class="main-header clearfix">
    <div class="main-header__top">
        <div class="container">
            <div class="main-header__top-inner clearfix">
                <div class="main-header__logo">
                    <a href="{{ route('front.home-page') }} ">
                        <img src="{{@$config->image->path ?? ''}}" alt="" class="dark-logo">
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
                                        <p>Hotline</p>
                                        <h5><a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a></h5>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-pin"></span>
                                    </div>
                                    <div class="content">
                                        <p>Địa chỉ</p>
                                        <h5><a href=" ">{{ $config->address_company }}</a></h5>
                                    </div>
                                </li>

                            </ul>
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
                                    <a href="{{ route('front.home-page') }}">Trang chủ </a>
                                </li>
                                <li>
                                    <a href="{{ route('front.abouts') }}">Giới thiệu </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Nội thất</a>
                                    <ul>
                                        @foreach($categoriesProduct as $cateProduct)
                                            <li><a href="{{route('front.products', $cateProduct->slug)}}">{{ $cateProduct->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                @foreach($serviceCategories as $cateService)
                                    <li class="{{ $cateService->childs()->count() ? 'dropdown' : ''}}">
                                        <a href="{{route('front.services', ['parentSlug' => $cateService->slug])}}">{{ $cateService->name }} </a>
                                        @if($cateService->childs()->count())
                                            <ul>
                                                @foreach($cateService->childs as $serv)
                                                    <li><a href="{{route('front.services', ['parentSlug' => $cateService->slug, 'slug' => $serv->slug])}}">{{ $serv->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach


                                <li class="dropdown">
                                    <a href="javascipt:;">Blog</a>
                                    @php
                                        $allCate = \App\Model\Admin\PostCategory::query()->where('type', \App\Model\Admin\PostCategory::TYPE_POST)->get();
                                    @endphp

                                    <ul>
                                        @foreach($allCate as $alCate)
                                            <li><a href="{{ route('front.blogs', $alCate->slug) }}">{{ $alCate->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('front.contact') }}">Liên hệ </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="main-menu__right">
                        <div class="main-menu__search-btn-box">
                            <div class="lang-wrap">
                                <a href="javascript:;" onclick="translateheader('vi')"><img width="30" src="/site/images/vie.png" alt=""></a>

                                <a href="javascript:;" onclick="translateheader('en')"><img width="30" src="/site/images/eng.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
