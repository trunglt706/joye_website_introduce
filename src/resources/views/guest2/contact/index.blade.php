@extends('guest2.layout')
@section('title', 'Liên hệ')
@section('keywords', '')
@section('description', '')
@section('image', '')
@section('content')
    <main class="bg-grey">
        <div class="bl-contact-title">
            <div class="container">
                <h2 class="bl-title center">Thông tin liên hệ</h2>
                <div class="bl-description center">
                    Muốn biết được thêm thông tin về dịch? Đội ngũ của chúng tôi luôn sẵn sàng hỗ trợ bạn
                </div>
            </div>
        </div>
        <section class="bl-contact">
            <div class="container">
                <div class="bg-inner">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="title-head">
                                <h3>Đã có 200+ doanh nghiệp đối tác lựa chọn đồng hành cùng JoyE</h3>
                            </div>
                            <div class="description">Liên hệ ngay với JoyE, để được ngay những thông tin về dịch vụ mà
                                bạn quan tâm nhé!</div>
                            <div class="social">
                                <a href="#"><img src="/style2/images/zalo.png" alt=""></a>
                                <a href="#"><img src="/style2/images/messenger.png" alt=""></a>
                                <a href="#"><img src="/style2/images/facebook.png" alt=""></a>
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
                                <form action="">
                                    <div class="form-detail">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Họ và tên của bạn">
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                placeholder="Email hoặc số điện thoại">
                                        </div>
                                        <div class="input-group">
                                            <select name="" id="" class="form-control">
                                                <option value="" class="first">Chọn dịch vụ mà bạn quan tâm</option>
                                                <option value="">Dịch vụ 1</option>
                                                <option value="">Dịch vụ 2</option>
                                                <option value="">Dịch vụ 3</option>
                                                <option value="">Dịch vụ 4</option>
                                                <option value="">Dịch vụ 5</option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <textarea name="" id="" class="form-control" rows="4"
                                                placeholder="Yêu cầu cụ thể (nếu có)"></textarea>
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
            </div>
        </section>
        <section class="bl-faq">
            <div class="container">
                <h2 class="bl-title center">Câu hỏi thường gặp</h2>
                <!-- Avtive -->
                <div class="card">
                    <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#collapse-1" aria-expanded="true">
                            Tại sao chọn JoyE làm đối tác chiến lược?
                        </a>
                    </div>
                    <div id="collapse-1" class="collapse show" data-bs-parent="#accordion">
                        <div class="card-body">
                            JoyE mang đến giải pháp toàn diện và sáng tạo, kết hợp với đội ngũ chuyên gia giàu kinh
                            nghiệm.
                            Chúng tôi không chỉ cung cấp dịch vụ chất lượng mà còn đồng hành với
                            doanh nghiệp trong hành trình phát triển dài hạn,
                            đảm bảo tối ưu hiệu quả và tăng trưởng bền vững.
                        </div>
                    </div>
                </div>
                <!-- Not Active -->
                <div class="card">
                    <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#collapse-2" aria-expanded="false">
                            Tại sao chọn JoyE làm đối tác chiến lược?
                        </a>
                    </div>
                    <div id="collapse-2" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            JoyE mang đến giải pháp toàn diện và sáng tạo, kết hợp với đội ngũ chuyên gia giàu kinh
                            nghiệm.
                            Chúng tôi không chỉ cung cấp dịch vụ chất lượng mà còn đồng hành với
                            doanh nghiệp trong hành trình phát triển dài hạn,
                            đảm bảo tối ưu hiệu quả và tăng trưởng bền vững.
                        </div>
                    </div>
                </div>
                <!-- Not Active -->
                <div class="card">
                    <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#collapse-3" aria-expanded="false">
                            Tại sao chọn JoyE làm đối tác chiến lược?
                        </a>
                    </div>
                    <div id="collapse-3" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            JoyE mang đến giải pháp toàn diện và sáng tạo, kết hợp với đội ngũ chuyên gia giàu kinh
                            nghiệm.
                            Chúng tôi không chỉ cung cấp dịch vụ chất lượng mà còn đồng hành với
                            doanh nghiệp trong hành trình phát triển dài hạn,
                            đảm bảo tối ưu hiệu quả và tăng trưởng bền vững.
                        </div>
                    </div>
                </div>
                <!-- Not Active -->
                <div class="card">
                    <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#collapse-4" aria-expanded="false">
                            Tại sao chọn JoyE làm đối tác chiến lược?
                        </a>
                    </div>
                    <div id="collapse-4" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            JoyE mang đến giải pháp toàn diện và sáng tạo, kết hợp với đội ngũ chuyên gia giàu kinh
                            nghiệm.
                            Chúng tôi không chỉ cung cấp dịch vụ chất lượng mà còn đồng hành với
                            doanh nghiệp trong hành trình phát triển dài hạn,
                            đảm bảo tối ưu hiệu quả và tăng trưởng bền vững.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
