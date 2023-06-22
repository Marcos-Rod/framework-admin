$().ready(function () {
    AOS.init({
        easing: 'ease-in-out-sine',
        mirror: true,
        offset: 120
    });

    $(document).on('scroll', function () {
        if ($(this).scrollTop() > 150) {
            $('.header').addClass('header-fixed');
        } else {
            $('.header').removeClass('header-fixed');
        }

    });



    const swiper = new Swiper('.swiper', {
        // Optional parameters
        loop: true,
        autoplay: {
            delay: 4000,
        },
        speed: 400,
        slidesPerView: 1,
        spaceBetween: 80,

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });


});