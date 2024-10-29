<div class="modal fade" id="myModalContact">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <section class="bl-contact">
                <div class="bg-inner">
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="title-head">
                                <h3>Đã có 200+ doanh nghiệp đối tác lựa chọn đồng hành cùng JoyE</h3>
                            </div>
                            <div class="description">Liên hệ ngay với JoyE, để được ngay những thông tin về dịch vụ mà
                                bạn quan tâm nhé!</div>
                            <div class="social">
                                <a href="#"><img src="/style2/images/zalo.png" alt="Image"></a>
                                <a href="#"><img src="/style2/images/messenger.png" alt="Image"></a>
                                <a href="#"><img src="/style2/images/facebook.png" alt="Image"></a>
                            </div>
                            <div class="info">
                                <div class="item"><i class="fa-solid fa-phone"></i>0903 414 993</div>
                                <div class="item"><i class="fas fa-envelope"></i>info@joye.vn</div>
                                <div class="item"><i class="fas fa-map-marker-alt"></i>Tầng 26, Sunshine Palace, Lĩnh
                                    Nam, Hoàng Mai, Hà Nội </div>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-5">
                            <div class="bl-form-contact">
                                <div class="title-head">
                                    <h3>Đăng ký tư vấn miễn phí!</h3>
                                </div>
                                <form action="{{ route('contact.create') }}" method="post">
                                    @csrf
                                    <div class="form-detail">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Họ và tên của bạn"
                                                name="name" required>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="email" required
                                                placeholder="Email hoặc số điện thoại">
                                        </div>
                                        <div class="input-group">
                                            <select name="group_id" required class="form-control form-select">
                                                <option value="" class="first">
                                                    Chọn dịch vụ mà bạn quan tâm
                                                </option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <textarea name="description" required class="form-control" rows="4" placeholder="Yêu cầu cụ thể (nếu có)"></textarea>
                                        </div>
                                        <br><br>
                                    </div>
                                    <div class="btn-submit">
                                        <button type="submit" class="btn">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
