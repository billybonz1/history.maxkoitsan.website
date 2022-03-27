
var mySwiper = undefined;
function initSwiper() {
    var screenWidth = $(window).outerWidth();
    if ((screenWidth < (586)) && (mySwiper == undefined)) {
        mySwiper = new Swiper('.swiper-container', {
            speed: 400,
            spaceBetween: 30,
            a11y: true,
            keyboardControl: true,
            grabCursor: true,
            slidesPerView: 1,
            centeredSlides: true,
            breakpoints: {
                576: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    a11y: true,
                    keyboardControl: true,
                    grabCursor: true,

                },
            }
        });
    } else if ((screenWidth > 587) && (mySwiper != undefined)) {
        mySwiper.destroy();
        mySwiper = undefined;
        $('.swiper-wrapper').removeAttr('style');
        $('.swiper-slide').removeAttr('style');
    }
}
initSwiper();

$(window).resize(function () {
    initSwiper();
});
