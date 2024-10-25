@extends('guest.layout')
@section('title', 'Trang chủ')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <style>
        .my-service-item ul {
            text-align: left;
        }

        .my-service-item ul li {
            padding-left: 6px;
        }

        @media(max-width: 736px) {

            #intro-section {
                margin-top: 32px;
                margin-bottom: 135px;
            }

            #intro-section iframe {
                height: 240px !important;
            }

            .home-img>img {
                max-height: 185px;
            }

            .home-img {
                display: block !important;
            }

            #staff-section {
                margin-top: 30px;
                padding: 0px 12px;
                margin-bottom: 125px;
            }

            #register-section .col-md-8 {
                display: none;
            }

            #home-area .caption-btn a {
                width: 46% !important;
                text-align: center !important;
            }

            .sec-heading {
                padding-bottom: 0px !important;
            }

            #register-section button[type="submit"] {
                width: 100%;
            }

            .platform-section {
                margin-top: 0px !important;
            }

            #staff-section h5 {
                line-height: 30px !important;
            }

            .platform-slider-area .platform-item img {
                height: 200px !important;
            }

            .testimonial-section .client-item p {
                font-size: 16px !important;
                font-weight: 400;
            }

            .my-service .platform-slider-area .platform-item img {
                height: 75px !important;
            }

            .my-service .platform-item {
                height: auto !important;
            }
        }
    </style>
    <!--start home area-->
    <section id="home-area" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <!--start caption-->
                <div class="col-lg-6 col-md-8">
                    <div class="caption">
                        <h4>JOYE AGENCY</h4>
                        <h3 class="mb-5">GIẢI PHÁP MARKETING TỔNG THỂ CHO DOANH NGHIỆP</h3>
                        <h5>
                            JoyE phát triển mạnh mẽ nhờ vào tư duy cởi mở, luôn thử nghiệm và điều chỉnh ý tưởng mới một
                            cách nhanh chóng và tích cực. Chúng tôi mang đến các cơ hội đặc biệt để phát triển nhanh hơn và
                            dẫn đầu xu hướng kinh doanh.
                        </h5>
                        <div class="caption-btn">
                            <a class="bg" href="{{ route('about') }}">
                                Về chúng tôi
                            </a>
                            <a href="{{ route('contact') }}">
                                Liên hệ ngay
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-img">
            <img src="/style/images/home-img.png" class="img-fluid" alt="">
        </div>
    </section>
    @include('guest.home.intro')
    @include('guest.home.project')
    @include('guest.home.feedback')
    @include('guest.home.customer')
    @include('guest.home.service')
    @include('guest.home.staff')
    @include('guest.home.register')
@endsection
