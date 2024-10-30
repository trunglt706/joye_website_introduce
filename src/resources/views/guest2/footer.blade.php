<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="logo-footer">
                    <img src="{{ asset('style2/images/logo.png') }}" alt="Image">
                </div>
                <div class="description">
                    Giải pháp Marketing toàn diện cho các thương hiệu và doanh nghiệp
                </div>
                <div class="info">
                    <div class="item"><i class="fa-solid fa-phone"></i>0903 414 993</div>
                    <div class="item"><i class="fas fa-envelope"></i>info@joye.vn</div>
                    <div class="item"><i class="fas fa-map-marker-alt"></i>Tầng 26, Sunshine Palace, Lĩnh Nam, Hoàng
                        Mai, Hà Nội </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-4 f-50">
                        <div class="menu-footer">
                            <h3>Giới thiệu</h3>
                            <ul>
                                @foreach (get_menu() as $item)
                                    <li>
                                        <a href="{{ $item['code'] }}">
                                            {{ $item['name'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 f-50">
                        <div class="menu-footer">
                            <h3>Dịch vụ</h3>
                            <ul>
                                @foreach (get_service_groups() as $item)
                                    <li>
                                        <a href="{{ route('v2.service') }}?g={{ $item->slug }}">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="menu-footer">
                            <h3>Đào tạo</h3>
                            <ul>
                                <li><a href="#">Đào tạo Livestream</a></li>
                                <li><a href="#">Đào tạo Ecommerce</a></li>
                                <li><a href="#">Đạo tạo vận hành thương hiệu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
