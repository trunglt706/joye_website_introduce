<div class="platform-area">
    <div class="container">
        <div class="row">
            <!--start section heading-->
            <div class="col-md-10 offset-md-1 wow fadeInUp" data-wow-delay="0.6s">
                <div class="sec-heading text-center">
                    <h2 class="counter-title text-uppercase">Các dự án nổi bật</h2>
                    <h5>
                        Đội ngũ nhân sự của JoyE không chỉ có kinh nghiệm triển khai nhiều dự án lớn mà còn chuyên sâu
                        trong từng mảng dịch vụ như Đào tạo, Livestream, Ecommerce và Xây kênh. Chúng tôi đã quản lý và
                        hợp tác với hơn 200 KOLs, KOCs trong các dự án đa dạng, từ quy mô nhỏ đến quy mô lớn. Đặc biệt,
                        đội ngũ của chúng tôi đã xây dựng mối quan hệ bền chặt với các nền tảng hàng đầu như TikTok Việt
                        Nam và Facebook Gaming
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
