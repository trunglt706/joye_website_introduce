<!--jQuery js-->
<script src="/style/js/jquery-3.7.0.min.js"></script>
<!--proper js-->
<script src="/style/js/popper.min.js"></script>
<!--nice selcet js-->
<script src="/style/js/jquery.nice-select.min.js"></script>
<!--bootstrap js-->
<script src="/style/js/bootstrap.min.js"></script>
<!--bootstrap bundle js-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@if (in_array(Route::currentRouteName(), ['home']))
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
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
<!-- swipper js -->
<script src="/style/js/swiper.min.js"></script>
<!--custom js-->
<script src="/style/js/custom.js"></script>
<script>
    $(document).ready(function() {
        checkShowSocial();
        $('.service-icon').mouseenter(function() {
            $(this).find('.service-name').addClass('active');
        });
        $('.service-icon').mouseleave(function() {
            $(this).find('.service-name').removeClass('active');
        });
    });

    $(window).on('scroll', function() {
        checkShowSocial();
    });

    function checkShowSocial() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 50) {
            $('#button-contact-vr').addClass('d-none');
        } else {
            $('#button-contact-vr').removeClass('d-none');
        }
        if ($(window).scrollTop() + $(window).height() > $(window).height() + 30) {
            $('.scroll-to-top').removeClass('d-none');
        } else {
            $('.scroll-to-top').addClass('d-none');
        }
    }
</script>
