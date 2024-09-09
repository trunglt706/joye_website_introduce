<div id="customer-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="sec-heading">
                    <h3 class="text-uppercase">Khách hàng nổi bật</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="add-slider-area">
                    <div class="add-slider">
                        <div class="swiper-wrapper">
                            @foreach ($data['projects'] as $item)
                                <div class="swiper-slide">
                                    <div class="add-item customer-item">
                                        <img src="{{ $item->image }}" alt="image">
                                        <h5 class="title">{{ $item->name }}</h5>
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
</section>
