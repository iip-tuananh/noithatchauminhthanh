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
<style>
    .invalid-feedback {
        display: none;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }
</style>
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
                    <li>Liên hệ</li>
                </ul>
                <h2>Liên hệ</h2>
            </div>
        </div>
    </section>

    <section class="contact-page" ng-controller="AboutPage">
        <div class="contact-page-shape-1 float-bob-x">
            <img src="/site/images/shapes/contact-page-shape-1.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-page__left">
                        <div class="section-title text-left">
                            <span class="section-title__tagline">Liên hệ với chúng tôi</span>
                            <h2 class="section-title__title">Gửi Thông Tin Cho Chúng Tôi</h2>
                            <div class="section-title__line"></div>
                        </div>
                        <div class="contact-page__form">
                            <form id="form-contact" class="comment-one__form contact-form-validated" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Họ tên" name="name">
                                            <div class="invalid-feedback d-block" ng-if="errors['name']"><% errors['name'][0] %></div>

                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Số điện thoại" name="phone">
                                            <div class="invalid-feedback d-block" ng-if="errors['phone']"><% errors['phone'][0] %></div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="message" placeholder="Để lại nội dung liên hệ"></textarea>
                                            <div class="invalid-feedback d-block" ng-if="errors['message']"><% errors['message'][0] %></div>
                                        </div>

                                        <div class="comment-form__btn-box" style="margin-top: 50px">
                                            <button type="button" class="thm-btn comment-form__btn" ng-click="submitContact()">Gửi liên hệ</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="contact-page__right">
                        <div class="contact-page__details">
                            <ul class="list-unstyled contact-page__details-list">
                                <li>
                                    <span>Hỗ trợ 24/7</span>
                                    <p><a href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a></p>
                                </li>
                                <li>
                                    <span>Email</span>
                                    <p><a href="mailto:{{ $config->email }}">{{ $config->email }}</a></p>
                                </li>
                                <li>
                                    <span>Địa chỉ</span>
                                    <p>{{ $config->address_company }}</p>
                                </li>
                            </ul>
                            <div class="contact-page__social">
                                <a href="{{ $config->twitter }}"><i class="fab fa-twitter"></i></a>
                                <a href="{{ $config->facebook }}"><i class="fab fa-facebook"></i></a>
                                <a href="{{ $config->youtube }}"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="google-map-two">
        {!! $config->location !!}

    </section>
@endsection

@push('scripts')
    <script>
        app.controller('AboutPage', function ($rootScope, $scope, $sce, $interval) {
            $scope.errors = [];
            $scope.submitContact = function () {
                var url = "{{route('front.submitContact')}}";
                var data = jQuery('#form-contact').serialize();
                $scope.loading = true;
                jQuery.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    success: function (response) {
                        if (response.success) {
                            toastr.success(response.message);
                            jQuery('#form-contact')[0].reset();
                            $scope.errors = [];
                            $scope.$apply();
                        } else {
                            $scope.errors = response.errors;
                            toastr.warning(response.message);
                        }
                    },
                    error: function () {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$apply();
                    }
                });
            }
        })

    </script>
@endpush
