<!--start footer-->
<footer id="footer" data-scroll-index="6" class="overflow-hidden">
    <div class="footer-area">
        <div class="contact-element">
            <img src="/style/images/sms.png" alt="image">
        </div>
        <div class="contact-element-two">
            <img src="/style/images/map.png" alt="image">
        </div>
        <div class="container">
            <div class="row position-relative">
                <!--start contact form-->
                <div class="col-lg-6 col-md-7">
                    <div class="contact-form">
                        <div class="contact-title">
                            <h4>Đừng ngần ngại liên hệ với chúng tôi</h4>
                            <h5>Chúng tôi sẽ phản hồi trong vòng 24 giờ</h5>
                        </div>
                        @include('guest.general.error')
                        <form action="{{ route('contact.create') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nhập họ tên *" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="phone" name="phone" placeholder="Nhập số ĐT *"
                                    required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="comment" name="comment" rows="10" placeholder="Gửi nội dung" required></textarea>
                            </div>
                            <button type="submit">Gửi liên hệ</button>
                        </form>
                    </div>
                </div>
                <!--end contact form-->
                <div class="col-md-5 offset-lg-1">
                    <div class="contact-cont">
                        <h2>Liên hệ với chúng tôi</h2>
                        <p>
                            Bạn rất quan trọng đối với chúng tôi và chúng tôi luôn nỗ lực cải thiện dịch vụ để phục vụ
                            bạn tốt hơn
                        </p>
                        <div class="contact-thumb">
                            <img src="/style/images/contact.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <!--start footer bottom-->
            <div class="footer-btm row justify-content-between justify-content-md-start ">
                <div class="col-lg-6">
                    <div class="copyright-text">
                        <p class="m-0">&copy; 2024 Joye | All right reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-social d-flex position-relative justify-content-center justify-content-md-end">
                        <ul>
                            <li><a href="javascript:void(0)"><i class="icofont-facebook"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="icofont-linkedin"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="icofont-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--end footer bottom-->
        </div>
    </div>
</footer>
<!--end footer-->
