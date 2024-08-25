<div class="platform-area">
    <div class="container">
        <div class="row">
            <!--start section heading-->
            <div class="col-md-8 offset-md-2 wow fadeInUp" data-wow-delay="0.6s">
                <div class="sec-heading text-center">
                    <h2 class="counter-title">Các dự án nổi bật</h2>
                    <h5>
                        Các nhân sự của JoyE đã triển khai rất nhiều dự án lớn.
                        Chúng tôi đã quản lý và làm việc cùng với hơn 200 KOLs,
                        KOC trong các dự án lớn nhỏ với các thương hiệu trong và
                        ngoài nước, đặc biệt là với các nền tảng như Tiktok Việt
                        Nam và Facebook Gaming và các tổ chức trong và ngoài
                        nước
                    </h5>
                </div>
            </div>
            <!--end section heading-->
        </div>
    </div>
</div>
<div class="platform-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="platform-slider-area">
                    <div class="platform-slider">
                        <div class="swiper-wrapper">
                            @foreach ($data['projects'] as $item)
                                <div class="swiper-slide">
                                    <div class="platform-item">
                                        <img src="{{ $item->image }}" alt="image">
                                        <h5 class="title">{{ $item->name }}</h5>
                                        <p>
                                            {{ $item->description }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
