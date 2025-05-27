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
                            <form action="{{ route('front.submitContact') }}" id="form-contact" class="comment-one__form" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Họ tên" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Số điện thoại" name="phone" required>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="message" placeholder="Để lại nội dung liên hệ" required></textarea>
                                        </div>

                                        <div class="comment-form__btn-box" style="margin-top: 50px">
                                            <button type="submit" class="thm-btn comment-form__btn" ng-click="submitContact()">Gửi liên hệ</button>
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
