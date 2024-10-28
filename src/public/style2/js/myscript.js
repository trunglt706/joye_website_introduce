/**Slick */
$(document).ready(function(){
    $('.slide.slide-2 .list').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        swipeToSlide:true,
        variableWidth: true,
        loop:true,
        autoplay:false,
        draggable:true,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                variableWidth: false
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: false
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    // Trigger cho nút Next
    $('.slide.slide-2 .click-next').on('click', function() {
        console.log(111)
        $('.slide.slide-2 .list').slick('slickNext');
    });

    // Trigger cho nút Prev
    $('.slide.slide-2 .click-prev').on('click', function() {
        $('.slide.slide-2 .list').slick('slickPrev');
    });
});
window.addEventListener('scroll', function() {
    var header = document.querySelector('header'); // Phần tử cần thêm class sticky
    if (window.scrollY > 100) { // Tùy chỉnh khoảng cách từ đỉnh trang
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
});