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
                    <li>Tin tức và hoạt động</li>
                </ul>

                <h2>{{ $category ? $category->name : 'Tin tức' }}</h2>


            </div>
        </div>
    </section>

    <section class="blog-sibebar">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-sideabr__left">
                        <style>
                            /* 1) Flex container để các cột cùng chiều cao */
                            .blog-list {
                                display: flex;
                                flex-wrap: wrap;
                                margin: -15px; /* bù padding từng cột */
                            }
                            .blog-list > .col-md-6 {
                                display: flex;
                                padding: 15px;
                                box-sizing: border-box;
                            }

                            /* 2) Card chính flex column, giãn đều */
                            .blog-one__single {
                                display: flex;
                                flex-direction: column;
                                flex: 1;
                                background: #fff;          /* tuỳ chọn nền */
                                border: 1px solid #eee;    /* tuỳ chọn viền */
                                border-radius: 6px;        /* tuỳ chọn bo góc */
                                overflow: hidden;
                            }

                            /* 3) Khung ảnh 16:9 */
                            .blog-one__img {
                                position: relative;
                                width: 100%;
                                padding-top: 56.25%;       /* 9/16 = 0.5625 */
                                overflow: hidden;
                            }
                            .blog-one__img img {
                                position: absolute;
                                top: 0; left: 0;
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                            }

                            /* 4) Nội dung dưới ảnh flex column */
                            .blog-one__content {
                                flex: 1;
                                display: flex;
                                flex-direction: column;
                                padding: 15px;
                            }

                            /* 5) Ngày và meta không giãn */
                            .blog-one__date,
                            .blog-one__meta {
                                flex-shrink: 0;
                                margin-bottom: 10px;
                            }

                            /* 6) Giới hạn tiêu đề 3 dòng với dấu ba chấm */
                            .blog-one__title {
                                margin: 0;
                                font-size: 1.25rem;
                                line-height: 1.4em;

                                display: -webkit-box;
                                -webkit-line-clamp: 3;        /* tối đa 3 dòng */
                                -webkit-box-orient: vertical;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            }

                        </style>
                        <div class="row blog-list">
                            @foreach($blogs as $blog)
                                <div class="col-md-6 wow fadeInUp animated animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                    <!--Blog One Start-->
                                    <div class="blog-one__single">
                                        <div class="blog-one__img">
                                            <img src="{{ $blog->image->path ?? '' }}" alt="">
                                            <a href="{{route('front.blogDetail', $blog->slug)}}">
                                                <span class="blog-one__plus"></span>
                                            </a>
                                        </div>
                                        <div class="blog-one__content">
                                            <div class="blog-one__date">
                                                <p>{{ \Illuminate\Support\Carbon::parse($blog->created_at)->format('d/m/Y') }}</p>
                                            </div>
                                            <ul class="list-unstyled blog-one__meta">
                                                <li><a href="{{route('front.blogDetail', $blog->slug)}}"><i class="far fa-user-circle"></i> by
                                                        {{ $blog->user_create->name ?? '' }} </a>
                                                </li>
                                            </ul>
                                            <h3 class="blog-one__title"><a href="{{route('front.blogDetail', $blog->slug)}}">{{ $blog->name }}</a></h3>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                                <div class="col-12 mt-4">
                                    {{ $blogs->links('site.pagination.paginate2') }}
                                </div>
                        </div>
                        <div class="blog-sidebar__load-more text-center">

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">Tin mới nhất</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach($otherBlog as $blogOther)
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ $blogOther->image->path ?? '' }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <span class="sidebar__post-content-meta"><i class="far fa-user-circle"></i> by {{ $blogOther->user_create->name ?? '' }}</span>
                                                <a href="{{route('front.blogDetail', $blogOther->slug)}}">{{ $blogOther->name }}</a>
                                            </h3>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title">Danh mục</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                @foreach($allCate as $alCate)
                                    <li><a href="{{ route('front.blogs', $alCate->slug) }}">{{ $alCate->name }} <span class="fa fa-angle-right"></span></a></li>
                                @endforeach

                            </ul>
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
