@php
    $currentRoute = Route::currentRouteName();
@endphp
<!--start footer-->
<footer id="footer" data-scroll-index="6" class="overflow-hidden">
    <div class="footer-area">
        @if ($currentRoute == 'contact')
            {{-- <div class="contact-element">
                <img src="/style/images/sms.png" alt="image">
            </div> --}}
            <div class="contact-element-two">
                <img src="/style/images/map.png" alt="image">
            </div>
        @endif
        <div class="container">
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
