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
                        <h2>JOYE CORPORATION</h2>
                        <h5>
                            Joye phát triển mạnh mẽ nhờ vào tư duy cởi mở, luôn thử nghiệm và điều chỉnh ý tưởng
                            một cách nhanh chóng và tích cực. Chúng tôi mang đến các cơ hội đặc biệt để phát triển nhanh hơn
                            và dẫn đầu xu hướng kinh doanh.
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
            <div class="core-features row">
                <!--start core feature single-->
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.9s">
                    <div class="core-feat-single text-center">
                        <div class="icon">
                            <img src="/style/images/icon-token.png" class="img-fluid" alt="">
                        </div>
                        <h6>Thương mại điện tử</h6>
                        <p>Hình thức kinh doanh mang tính xu hướng</p>
                    </div>
                </div>
                <!--end core feature single-->
                <!--start core feature single-->
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="core-feat-single text-center">
                        <div class="icon">
                            <img src="/style/images/icon-responsive.png" class="img-fluid" alt="">
                        </div>
                        <h6>Livestreaming</h6>
                        <p>
                            Đang dần trở thành cách thức bán hàng có
                            doanh số tăng trưởng đột biến nhất trong
                            thời đại kinh tế số.
                        </p>
                    </div>
                </div>
                <!--end core feature single-->
            </div>
        </div>
        <div class="home-img">
            <img src="/style/images/home-img.png" class="img-fluid" alt="">
        </div>
    </section>
    <!--end home area-->
    <!--start service-->
    @include('guest.home.service')
    <!--end service-->
    {{-- start sự khác biet --}}
    @include('guest.home.khacbiet')
    {{-- end sự khác biệt --}}
    <!--start dự án-->
    @include('guest.home.project')
    <!--end dự án-->
    <!--start feature area-->
    {{-- <section id="feat-area">
        <div class="container">
            <div class="row">
                <!--start section heading-->
                <div class="col-md-8 offset-md-2">
                    <div class="sec-heading feat text-center">
                        <h3>Amazing Features</h3>
                        <h5>Watch the game live at home or on the go. Stream live games from major college and pro leagues,
                            including the NCAA, NBA, NHL, NFL, the English Premier League, and more.</h5>
                    </div>
                </div>
                <!--end section heading-->
            </div>
        </div>
        <!--start feature single-->
        <div class="feat-single">
            <div class="container-fluid">
                <div class="row mb-30-none flex-row-reverse">
                    <div class="col-lg-5 offset-lg-1 col-md-6 mb-30">
                        <div class="feat-img feat-img--style right fadeInLeft wow" data-wow-duration="0.8s">
                            <img src="/style/images/feature-1.png.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="feat-cont left">
                            <h5 class="wow fadeInUp" data-wow-delay="0.5s">OUR BEST STREAMING EXPERIENCE</h5>
                            <h3 class="wow fadeInUp" data-wow-delay="0.7s">Get a fan experience like no others</h3>
                            <p class="wow fadeInUp" data-wow-delay="0.9s">Pick your favorite teams, sports, or leagues and
                                we'll recommend games for you based on your selections.</p>
                            <a href="#" class="cmn-btn wow fadeInUp" data-wow-delay="1s">WATCH NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end feature single-->
        <!--start feature single-->
        <div class="feat-single">
            <div class="container-fluid">
                <div class="row mb-30-none">
                    <div class="col-lg-5 col-md-6 mb-30">
                        <div class="feat-img left fadeInRight wow">
                            <div class="feat-element-one">
                                <img src="/style/images/Play.png" alt="image">
                            </div>
                            <div class="feat-element-two">
                                <img src="/style/images/Phone-2.png" alt="image">
                            </div>
                            <div class="feat-element-three">
                                <img src="/style/images/Star.png" alt="image">
                            </div>
                            <img src="/style/images/feature-2.png.jpg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 offset-lg-1 mb-30">
                        <div class="feat-cont right">
                            <h5 class="wow fadeInUp" data-wow-delay="0.5s">LIVE SPORTS ON ANY SCREEN</h5>
                            <h3 class="wow fadeInUp" data-wow-delay="0.7s">
                                Worldwide channels in
                                your hand</h3>
                            <p class="wow fadeInUp" data-wow-delay="0.9s">Keep up with live sports when and where you want
                                on all your supported devices - including NFL games live on your mobile phone.Live TV
                                subscription allows you to watch live video on up to two screens simultaneously.</p>
                            <a href="#" class="cmn-btn">TRY IT NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end feature single-->
        <!--start feature single-->
        <div class="feat-single">
            <div class="container-fluid">
                <div class="row mb-30-none flex-row-reverse">
                    <div class="col-lg-5 offset-lg-1 col-md-6 mb-30">
                        <div class="feat-img right">
                            <div class="feat-element-five">
                                <img src="/style/images/bell.png" alt="image">
                            </div>
                            <img src="/style/images/feature-3.png.jpg.png" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 mb-30">
                        <div class="feat-cont left">
                            <h5>PUSH NOTIFICATIONS</h5>
                            <h3>Find out when it's game time</h3>
                            <p>Get mobile push notifications that let you know when your games are about to start.</p>
                            <a href="#" class="cmn-btn">TRY IT NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end feature single-->
        <!--start feature single-->
        <div class="feat-single">
            <div class="container-fluid">
                <div class="row mb-30-none">
                    <div class="col-md-5 mb-30">
                        <div class="feat-img left record">
                            <div class="feat-element-six">
                                <img src="/style/images/record.png" alt="image">
                            </div>
                            <div class="feat-element-seven">
                                <img src="/style/images/Man_.png" alt="image">
                            </div>
                            <img src="/style/images/feature-4.png.jpg.png" class="img-fluid" alt="">
                            <!-- <div class="rec-icon">
                                                                                                                                                                                                                                                                            <i class="icofont-disc"></i><span>RECORD</span>
                                                                                                                                                                                                                                                                        </div> -->
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-1 mb-30">
                        <div class="feat-cont right">
                            <h5>RECORD & WATCH</h5>
                            <h3>Watch everything on your own time</h3>
                            <p>Record the sports you want to watch with 50 hours of included Cloud DVR storage - and the
                                option to upgrade to 200 hours. Never miss a moment of the action.</p>
                            <a href="#" class="cmn-btn">TRY IT NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end feature single-->
    </section> --}}
    <!--end feature area-->
    <!--start pricing area-->
    {{-- <section id="pricing-area" data-scroll-index="3">
        <div class="pricing-top">
            <div class="container">
                <div class="row">
                    <!--start section heading-->
                    <div class="col-lg-7 col-md-8">
                        <div class="sec-heading">
                            <h4>Meet Your New TV Experience</h4>
                            <h2 class="text-white">ALL YOUR TV IN ONE PLACE</h2>
                            <h5 class="text-light">Get full access to the entire livesports TV streaming library along with
                                your favorite live sports.</h5>
                        </div>
                    </div>
                    <!--end section heading-->
                </div>
            </div>
        </div>
        <div class="pricing-btm">
            <div class="container">
                <div class="row gy-md-5 position-relative">
                    <!--start pricing table single-->
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-tbl-single text-center">
                            <h4>STANDARD</h4>
                            <div class="price-amount">
                                <h2><sup>$ </sup>16 <sub>/ m</sub></h2>
                            </div>
                            <div class="price-details">
                                <ul>
                                    <li>Top 70+ Live US Channels</li>
                                    <li>1 Simultaneous Stream</li>
                                    <li>7 Day Replay</li>
                                    <li>50 Hours DVR</li>
                                    <li>8 Premium Channels</li>
                                    <li>Showtime & Showtime Extreme</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a href="">Start Your Free Trial</a>
                            </div>
                        </div>
                    </div>
                    <!--end pricing table single-->
                    <!--start pricing table single-->
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-tbl-single recom text-center">
                            <div class="ribbon">Most Popular</div>
                            <h4>BEST VALUE</h4>
                            <div class="price-amount">
                                <h2><sup>$ </sup>32 <sub>/ m</sub></h2>
                            </div>
                            <div class="price-details">
                                <ul>
                                    <li>Top 70+ Live US Channels</li>
                                    <li>1 Simultaneous Stream</li>
                                    <li>7 Day Replay</li>
                                    <li>50 Hours DVR</li>
                                    <li>8 Premium Channels</li>
                                    <li>Showtime & Showtime Extreme</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a href="">Start Your Free Trial</a>
                            </div>
                        </div>
                    </div>
                    <!--end pricing table single-->
                    <!--start pricing table single-->
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-tbl-single text-center">
                            <h4>PREMIUM</h4>
                            <div class="price-amount">
                                <h2><sup>$ </sup>64 <sub>/ m</sub></h2>
                            </div>
                            <div class="price-details">
                                <ul>
                                    <li>Top 70+ Live US Channels</li>
                                    <li>1 Simultaneous Stream</li>
                                    <li>7 Day Replay</li>
                                    <li>50 Hours DVR</li>
                                    <li>8 Premium Channels</li>
                                    <li>Showtime & Showtime Extreme</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a href="">Start Your Free Trial</a>
                            </div>
                        </div>
                    </div>
                    <!--end pricing table single-->
                </div>
            </div>
        </div>
        <!--start addon-->
        <!-- <div class="addons text-center">
                                                                                                                                        <h4>AVAILABLE ADD-ONS</h4>
                                                                                                                                        <ul>
                                                                                                                                            <li>Enhanced Cloud DVR</li>
                                                                                                                                            <li>Unlimited Screens</li>
                                                                                                                                            <li>Entertainment Add-on</li>
                                                                                                                                            <li>HBO<sup>R</sup></li>
                                                                                                                                            <li>CINEMAX<sup>R</sup></li>
                                                                                                                                            <li>SHOWTIME<sup>R</sup></li>
                                                                                                                                        </ul>
                                                                                                                                    </div> -->
        <!--end addon-->
        <div class="add-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="add-section-header">
                            <h3>Đối tác liên kết</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="add-slider-area">
                            <div class="add-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="add-item">
                                            <h5 class="title">Enhanced Cloud DVR</h5>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="add-item">
                                            <h5 class="title">Unlimited Screens</h5>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="add-item">
                                            <h5 class="title">Entertainment Add</h5>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="add-item">
                                            <h5 class="title">HBO<sup>R</sup></h5>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="add-item">
                                            <h5 class="title">CINEMAX<sup>R</sup></h5>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="add-item">
                                            <h5 class="title">SHOWTIME<sup>R</sup></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--end pricing area-->
    <!--start download area-->
    {{-- <section id="download-area">
        <div class="container">
            <div class="download-cont-area">
                <div class="row">
                    <div class="col-md-6">
                        <div class="download-thumb">
                            <div class="download-element">
                                <img src="/style/images/phone.png" alt="image">
                            </div>
                            <img src="/style/images/download.png" alt="image" class="imw">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="down-cont mr-custom20">
                            <h5>ANYTIME, ANYWHERE</h5>
                            <h3>Stream your heart out</h3>
                            <p>Get the entertainment you love anywhere, on any device with Reloj Stream app. Included at no
                                additional cost, exclusively for Reloj customers.</p>
                            <div class="down-btn">
                                <a href=""><span class="icon"><i class="fab fa-google-play"></i></span> <span
                                        class="cont"><small>GET IT ON</small><br>Appstore</span></a>
                                <a class="apple" href=""><span class="icon"><i
                                            class="fab fa-apple"></i></span> <span class="cont"><small>GET IT
                                            ON</small><br>Appstore</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--end download area-->
    <!--start ket qua-->
    @include('guest.home.ketqua')
    <!--end ket qua-->
    {{-- <!--start faq area-->
    <section id="faq-area" data-scroll-index="5">
        <div class="container">
            <div class="row">
                <!--start section heading-->
                <div class="col-md-8 offset-md-2">
                    <div class="sec-heading text-center">
                        <h4>Got any Questions?</h4>
                        <h2>We’ve got answers!</h2>
                        <h5>We're Here to Help. We value our relationship with you and strive to provide you with assistance
                            and answers when you need it.</h5>
                    </div>
                </div>
                <!--end section heading-->
            </div>
            <div class="row">
                <!--start faq accordian-->
                <div class="col-lg-10 offset-lg-1">
                    <div id="accordion" role="tablist">
                        <!--start faq single-->
                        <div class="card">
                            <div class="card-header active" role="tab" id="faq1">
                                <a data-toggle="collapse" href="#collapse1" aria-expanded="true"
                                    aria-controls="collapse1">Can I watch local sports in my area?</a>
                            </div>
                            <div id="collapse1" class="collapse show" role="tabpanel" aria-labelledby="faq1"
                                data-parent="#accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
                                    hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id,
                                    mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero
                                    sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse
                                    potenti.</div>
                            </div>
                        </div>
                        <!--end faq single-->
                        <!--start faq single-->
                        <div class="card">
                            <div class="card-header" role="tab" id="faq2">
                                <a class="collapsed" data-toggle="collapse" href="#collapse2" aria-expanded="false"
                                    aria-controls="collapse2">Can I sign in to WatchESPN, Fox Sports Go or NBC Sports?</a>
                            </div>
                            <div id="collapse2" class="collapse" role="tabpanel" aria-labelledby="faq2"
                                data-parent="#accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
                                    hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id,
                                    mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero
                                    sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse
                                    potenti.</div>
                            </div>
                        </div>
                        <!--end faq single-->
                        <!--start faq single-->
                        <div class="card">
                            <div class="card-header" role="tab" id="faq3">
                                <a class="collapsed" data-toggle="collapse" href="#collapse3" aria-expanded="false"
                                    aria-controls="collapse3">What is the video quality and how much bandwidth do I
                                    need?</a>
                            </div>
                            <div id="collapse3" class="collapse" role="tabpanel" aria-labelledby="faq3"
                                data-parent="#accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
                                    hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id,
                                    mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero
                                    sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse
                                    potenti.</div>
                            </div>
                        </div>
                        <!--end faq single-->
                        <!--start faq single-->
                        <div class="card">
                            <div class="card-header" role="tab" id="faq4">
                                <a class="collapsed" data-toggle="collapse" href="#collapse4" aria-expanded="false"
                                    aria-controls="collapse4">How can I stream sports on multiple devices at the same
                                    time?</a>
                            </div>
                            <div id="collapse4" class="collapse" role="tabpanel" aria-labelledby="faq4"
                                data-parent="#accordion">
                                <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus
                                    hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id,
                                    mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero
                                    sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse
                                    potenti.</div>
                            </div>
                        </div>
                        <!--end faq single-->
                    </div>
                </div>
                <!--end faq accordian-->
            </div>
        </div>
    </section>
    <!--end faq area--> --}}
    @include('guest.home.feedback')
@endsection
