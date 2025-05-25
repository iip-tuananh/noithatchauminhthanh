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
                    <li>{{ $blog->name }}</li>
                </ul>
                <h2>{{ $blog->name }}</h2>
            </div>
        </div>
    </section>

    <section class="blog-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="blog-details__left">
                        <div class="blog-details__img">
                            <img src="{{ $blog->image->path ?? '' }}" alt="">
                        </div>
                        <div class="blog-details__content">
                            <ul class="list-unstyled blog-details__meta">
                                <li><a href="#"><i class="far fa-user-circle"></i> by {{ $blog->user_create->name ?? '' }} </a>
                                </li>
                            </ul>
                            <h3 class="blog-details__title">{{ $blog->name }}</h3>
                            <p class="blog-details__text-1">
                                {!! $blog->body !!}
                            </p>
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
