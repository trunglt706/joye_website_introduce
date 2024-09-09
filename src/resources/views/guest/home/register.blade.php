<section id="register-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="strm-cont wow fadeInUp" data-wow-delay="0.5s">
                    <h3 class="text-uppercase">Để Joye hiểu hơn về bạn</h3>
                    <h5>JOYE - CUNG CẤP GIẢI PHÁP MARKETING TOÀN DIỆN CHO CÁC THƯƠNG HIỆU VÀ DOANH NGHIỆP</h5>
                    <h5 class="text-justify" style="line-height: 40px;">
                        Liên hệ ngay tới JOYE và chúng tôi sẽ hỗ trợ quý khách kết nối tới các CHUYÊN GIA am hiểu lĩnh
                        vực của bạn sớm nhất nhé!<br />
                        <i class="fa fa-phone me-2" aria-hidden="true"></i> 0948.410.214<br />
                        <i class="fa fa-envelope me-2" aria-hidden="true"></i> info@joye.vn<br />
                        <i class="fa fa-map-marker me-2" aria-hidden="true"></i> Tầng 26, Sunshine Palace, Lĩnh Nam,
                        Hoàng Mai, Hà Nội
                    </h5>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card card-body">
                    <h5 class="text-uppercase">Đăng ký nhận tư vấn</h5>
                    <form action="{{ route('contact.create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nhập họ tên *" required="">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input class="form-control" id="email" name="email" placeholder="Nhập Email *"
                                    required="">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input class="form-control" id="phone" name="phone" placeholder="Nhập số ĐT *"
                                    required="">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input class="form-control" id="service" name="service"
                                    placeholder="Dịch vụ cần tư vấn *" required="">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Yêu cầu thêm (nếu có)"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
