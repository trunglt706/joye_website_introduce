<section class="testimonial-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                <div class="sec-heading text-center">
                    <h2 class="text-uppercase">Khách hàng nói gì về Joye</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="client-item-area">
                    <div class="client-element-one">
                        <img src="/style/images/Asset 1.png" alt="image">
                    </div>
                    <div class="client-element-two">
                        <img src="/style/images/Asset 4.png" alt="image">
                    </div>
                    <div class="client-element-three">
                        <img src="/style/images/Asset 5.png" alt="image">
                    </div>
                    <div class="client-slider">
                        <div class="swiper-wrapper">
                            @foreach ($data['customers'] as $item)
                                <div class="swiper-slide">
                                    <div class="client-item">
                                        <div class="client-thumb">
                                            <img src="{{ $item->image ?? '/img/user.png' }}" alt="image">
                                        </div>
                                        <h5 class="title">{{ $item->name }}</h5>
                                        <span class="sub-title">{{ $item->description }}</span>
                                        <div class="client-icon">
                                            @for ($i = 0; $i < $item->start; $i++)
                                                <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                        <p>“Kết quả thay đổi rõ rệt sau khi hợp tác với agency. Đội ngũ hỗ trợ tận tình
                                            và
                                            giúp tối ưu hóa chiến lược. Kết quả tuyệt vời!”</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
