var swiperimage = new Swiper('.swiper-container', {
    slidesPerView: 2,
    spaceBetween: 0,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        disabledClass: 'disabled_swiper_button'
    },
    breakpoints: {
        769: {
            slidesPerView: 3,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        },
    }
});

$('[data-fancybox]').fancybox({
    buttons: [
        // "zoom",
        //"share",
        // "slideShow",
        //"fullScreen",
        //"download",
        // "thumbs",
        "close"
    ],
    clickSlide: 'toggleControls'
});

