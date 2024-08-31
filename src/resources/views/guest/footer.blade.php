@php
    $currentRoute = Route::currentRouteName();
@endphp
<!--start footer-->
<footer id="footer">
    <div class="footer-area">
        <div class="container">
            <!--start footer bottom-->
            <div class="footer-btm row justify-content-between justify-content-md-start ">
                <div class="col-lg-8">
                    <h5 class="text-white">JOYE - CUNG CẤP GIẢI PHÁP MARKETING TOÀN DIỆN CHO CÁC THƯƠNG HIỆU VÀ DOANH
                        NGHIỆP</h5>
                    <div class="copyright-text">
                        <p class="m-0">
                            Liên hệ ngay tới JOYE và chúng tôi sẽ hỗ trợ quý khách kết nối tới các CHUYÊN GIA am hiểu
                            lĩnh
                            vực của bạn sớm nhất nhé!
                        </p>
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
                <div class="col-lg-4 text-white">
                    <h5 class="text-uppercase">Đăng ký nhận tư vấn</h5>
                    <form action="{{ route('contact.create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4 mb-2 pe-0">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nhập họ tên *" required="">
                            </div>
                            <div class="form-group col-md-4 mb-2 pe-0">
                                <input class="form-control" id="email" name="email" placeholder="Nhập Email *"
                                    required="">
                            </div>
                            <div class="form-group col-md-4 mb-2">
                                <input class="form-control" id="phone" name="phone" placeholder="Nhập số ĐT *"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <textarea class="form-control" id="comment" name="comment" rows="2" placeholder="Gửi nội dung" required=""></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">Đăng ký</button>
                    </form>
                </div>
            </div>
            <!--end footer bottom-->
        </div>
    </div>
</footer>
<!--end footer-->
