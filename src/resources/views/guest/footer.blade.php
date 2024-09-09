@php
    $currentRoute = Route::currentRouteName();
@endphp
<!--start footer-->
<footer id="footer">
    <div class="footer-area">
        <div class="container">
            <!--start footer bottom-->
            <div class="footer-btm row justify-content-between justify-content-md-start text-white">
                <div class="col-md-5">
                    <h5 class="text-white" style="width: 80%">JOYE - CUNG CẤP GIẢI PHÁP MARKETING TOÀN DIỆN CHO CÁC THƯƠNG
                        HIỆU VÀ DOANH
                        NGHIỆP</h5>
                    <div class="copyright-text">
                        <p class="m-0">
                            <i class="fa fa-phone me-2" aria-hidden="true"></i> 0903.414.993
                        </p>
                        <p class="m-0">
                            <i class="fa fa-envelope me-2" aria-hidden="true"></i> info@joye.vn
                        </p>
                        <p class="m-0">
                            <i class="fa fa-map-marker me-2" aria-hidden="true"></i> Tầng 26, Sunshine Palace, Lĩnh Nam,
                            Hoàng Mai, Hà Nội
                        </p>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="text-uppercase">Giới thiêu</h5>
                            <ul>
                                <li>
                                    <a class="text-white" href="{{ route('about') }}">Về chúng tôi</a>
                                </li>
                                <li>
                                    <a class="text-white" href="{{ route('service') }}">Dịch vụ</a>
                                </li>
                                <li>
                                    <a class="text-white" href="{{ route('blog') }}">Blog</a>
                                </li>
                                <li>
                                    <a class="text-white" href="{{ route('faq') }}">FAQs</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-uppercase">Dịch vụ</h5>
                            <ul>
                                <li>Livestream trọn gói</li>
                                <li>Mega livestream</li>
                                <li>Ecommerce</li>
                                <li>Xây dựng nội dung sáng tạo</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-uppercase">Đào tạo</h5>
                            <ul>
                                <li>Đào tạo livestream</li>
                                <li>Đào tạo Ecommerce</li>
                                <li>Đạo tạo vận hành thương hiệu</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end footer bottom-->
        </div>
    </div>
</footer>
<!--end footer-->
