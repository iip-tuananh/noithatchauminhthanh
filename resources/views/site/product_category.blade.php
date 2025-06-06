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
                    @if(! $getAll)
                        <li>{{ $parentCate->name }}</li>
                        @if($category)
                            <li><span>/</span></li>
                            <li>{{ $category->name }}</li>
                        @endif
                    @else
                        <li>Nội thất</li>
                    @endif
                </ul>

                @if(! $getAll)
                    @if($category)
                      <h2>{{ $category->name }}</h2>
                    @else
                      <h2>{{ $parentCate->name }}</h2>
                    @endif
                @else
                    <h2>Nội thất</h2>
                @endif
            </div>
        </div>
    </section>

    <style>
        /* 1. Ẩn menu con (.sub-menu) theo mặc định */
        .shop-category .sub-menu {
            display: none;
            padding-left: 15px;    /* lùi vào cho dễ nhìn */
            margin: 5px 0;         /* khoảng cách trên dưới nếu cần */
        }

        /* 2. Khi di chuột vào <li> chứa sub-menu thì show menu con */
        .shop-category ul > li:hover > .sub-menu {
            display: block;
        }

        /* 3. Nếu <li> có class active (ví dụ đang ở trang con), thì luôn mở menu con */
        .shop-category ul > li.active > .sub-menu {
            display: block;
        }

        /* 4. Tạo dấu mũi tên để chỉ menu con (tuỳ chọn, có thể bỏ phần này nếu không cần) */
        /*.shop-category ul > li > a {*/
        /*    position: relative;*/
        /*    display: inline-block;*/
        /*    padding-right: 20px; !* chừa chỗ cho mũi tên *!*/
        /*}*/

        /* Dấu mũi tên xuống nằm bên phải */
        .shop-category ul > li > a::after {
            /* tam giác hướng sang phải */
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%) rotate(0deg);
            transition: transform 0.2s ease;
            font-size: 0.7em;
            color: #555; /* màu tuỳ chỉnh */
        }

        /* Khi hover <li> hoặc nếu <li> đã active, xoay mũi tên quay xuống */
        .shop-category ul > li:hover > a::after,
        .shop-category ul > li.active > a::after {
            transform: translateY(-50%) rotate(90deg);
        }

        /* 5. Tuỳ chỉnh khoảng cách và font cho menu con */
        .shop-category .sub-menu li {
            margin: 4px 0;
        }

        .shop-category .sub-menu li a {
            font-size: 0.95em;
            padding-left: 10px; /* lùi thêm để phân biệt rõ */
            color: #333;        /* màu chữ con */
        }

        /* 6. Thêm style khi hover vào link menu con để dễ tương tác */
        .shop-category .sub-menu li a:hover {
            color: #000;
            text-decoration: underline;
        }

        .shop-category .sub-menu {
            list-style-type: none;
        }

        /* Đảm bảo mỗi li trong sub-menu không có bullet */
        .shop-category .sub-menu li {
            list-style-type: none;
        }
    </style>

    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3">
                    <div class="product__sidebar">
                        <div class="shop-category product__sidebar-single">
                            <h3 class="product__sidebar-title">Danh mục</h3>
                            <ul class="list-unstyled">
                                @foreach($allCategories as $cate)
                                    <li class="">
                                        <a href="{{route('front.products', ['parentSlug' => $cate->slug])}}">{{ $cate->name }}</a>
                                        @if($cate->childs()->count())
                                            <ul class="sub-menu">
                                                @foreach($cate->childs as $child)
                                                    <li><a href="{{route('front.products', ['parentSlug' => $cate->slug, 'slug' => $child->slug])}}">{{ $child->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <style>
                    /* 1) Biến toàn bộ row thành flex container */
                    .product-list {
                        display: flex;
                        flex-wrap: wrap;
                        margin: -15px;  /* bù padding từng cột */
                    }
                    .product-list > .col-xl-4,
                    .product-list > .col-lg-4,
                    .product-list > .col-md-6 {
                        display: flex;  /* để .product__all-single flex được */
                        padding: 15px;
                    }

                    /* 2) Card chính flex column để đồng đều chiều cao */
                    .product__all-single {
                        display: flex;
                        flex-direction: column;
                        flex: 1;        /* kéo dài hết chiều cao của column */
                        background: #fff;
                        border: 1px solid #eee;
                        border-radius: 6px;
                        overflow: hidden;
                    }

                    /* 3) Khung ảnh cố định tỉ lệ (4:3) */
                    .product__all-img {
                        position: relative;
                        width: 100%;
                        padding-top: 75%;    /* 3/4 = 75% */
                        overflow: hidden;
                    }
                    /* Ảnh phủ kín khung */
                    .product__all-img img {
                        position: absolute;
                        top: 0; left: 0;
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }

                    /* 4) Nội dung luôn nằm sát đáy card nếu cần đẩy lên */
                    .product__all-content {
                        flex-shrink: 0;
                        padding: 15px;
                        text-align: center;  /* tuỳ chỉnh */
                    }

                    /* 5) Tiêu đề có margin cân đối */
                    .product__all-title {
                        margin: 0;
                        font-size: 1.1rem;
                    }

                </style>
                <div class="col-xl-9 col-lg-9">
                    <div class="product__items">
                        <div class="product__all">
                            <div class="row product-list">
                                @foreach($products as $product)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="product__all-single">
                                            <div class="product__all-img">
                                                <img src="{{ @$product->image->path ?? '' }}" alt="">
                                                <div class="product__all-btn-box">
                                                    <a href="{{ route('front.get-product-detail', $product->slug) }}" class="thm-btn product__all-btn">Chi tiết</a>
                                                </div>
                                            </div>
                                            <div class="product__all-content">
                                                <h4 class="product__all-title"><a href="{{ route('front.get-product-detail', $product->slug) }}">{{ $product->name }}</a></h4>
                                            </div>
                                        </div>
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
@endpush
