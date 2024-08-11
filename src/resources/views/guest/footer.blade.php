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
                            <h4>Don't Hesitate to Contact us</h4>
                            <h5>We will respond within 24 hours</h5>
                        </div>
                        <form id="ajax-contact" action="contact.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name*" required="required" data-error="This field is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address*" required="required" data-error="This field is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message" name="message" rows="10" placeholder="Your Message*" required="required" data-error="Please, leave us a message."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <button type="submit">Send Message</button>
                            <div class="messages"></div>
                        </form>
                    </div>
                </div>
                <!--end contact form-->
                <div class="col-md-5 offset-lg-1">
                    <div class="contact-cont">
                        <h4>Contact Us</h4>
                        <h2>Get in touch</h2>
                        <p>You are important to us and we are continuously improving our services to serve you better.</p>
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
                        <p class="m-0">&copy; <span class="currentYear"></span> Reloj | All right reserved.</p>
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