@extends('guest.layout')
@section('title', 'Trang chủ')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <!--start home area-->
    <section id="home-area" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <!--start caption-->
                <div class="col-lg-6 col-md-8">
                    <div class="caption">
                        <h4>JOYE AGENCY</h4>
                        <h2 class="mb-5">GIẢI PHÁP MARKETING TỔNG THỂ CHO DOANH NGHIỆP</h2>
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
                <!--end caption-->
                <!--start video button-->
                <div class="col-lg-6 col-md-4">
                    <div class="video-ply-btn">
                        <a class="popup-video mfp-iframe" href="https://www.youtube.com/watch?v=668nUCeBHyY"><i
                                class="icofont-ui-play"></i></a>
                    </div>
                </div>
                <!--end video button-->
            </div>
        </div>
        <div class="home-img">
            <img src="/style/images/home-img.png" class="img-fluid" alt="">
        </div>
    </section>
    @include('guest.home.khacbiet')
    @include('guest.home.service')
    @include('guest.home.project')
    @include('guest.home.price')
    @include('guest.home.ketqua')
    @include('guest.home.feedback')
@endsection
