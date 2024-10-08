<!--jQuery js-->
<script src="/style/js/jquery-3.7.0.min.js"></script>
<!--bootstrap js-->
<script src="/style/js/bootstrap.min.js"></script>
<!--bootstrap bundle js-->
<script src="/style/js/bootstrap.bundle.min.js"></script>
@if (in_array(Route::currentRouteName(), ['home']))
    <!--proper js-->
    <script src="/style/js/popper.min.js"></script>
    <!--nice selcet js-->
    <script src="/style/js/jquery.nice-select.min.js"></script>
    <!--counter js-->
    <script src="/style/js/waypoints.js"></script>
    <script src="/style/js/counterup.min.js"></script>
    <!--ripples js-->
    <script src="/style/js/ripples-min.js"></script>
    <!--typed js-->
    <script src="/style/js/typed.js"></script>
    <!--magnic popup js-->
    <script src="/style/js/magnific-popup.min.js"></script>
    <!--owl carousel js-->
    <script src="/style/js/owl.carousel.min.js"></script>
    <!--scrollIt js-->
    <script src="/style/js/scrollIt.min.js"></script>
    <!--contact js-->
    <script src="/style/js/contact.js"></script>
    <!--validator js-->
    <script src="/style/js/validator.min.js"></script>
    <!-- wow js link -->
    <script src="/style/js/wow.min.js"></script>
    <!-- swipper js -->
    <script src="/style/js/swiper.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.service-icon').mouseenter(function() {
                $(this).find('.service-name').addClass('active');
            });
            $('.service-icon').mouseleave(function() {
                $(this).find('.service-name').removeClass('active');
            });
        });
    </script>
@endif
<script src="/style/js/tilt.jquery.min.js"></script>
<!--custom js-->
<script src="/style/js/custom.js"></script>
@stack('js')
