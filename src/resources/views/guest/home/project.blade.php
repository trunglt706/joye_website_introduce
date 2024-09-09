<div class="platform-area">
    <div class="container">
        <div class="row">
            <!--start section heading-->
            <div class="col-md-10 offset-md-1 wow fadeInUp" data-wow-delay="0.6s">
                <div class="sec-heading text-center">
                    <h3 class="counter-title text-uppercase">Dự án nổi bật</h3>
                    <h5>
                        Đội ngũ JoyE có kinh nghiệm triển khai nhiều dự án lớn và chuyên sâu trong các lĩnh vực Đào tạo,
                        Livestream, Thương mại điện tử, và Xây dựng kênh. Chúng tôi đã hợp tác với hơn 200 KOLs, KOCs và
                        xây dựng mối quan hệ vững chắc với các nền tảng hàng đầu như TikTok Việt Nam và Facebook Gaming.
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
