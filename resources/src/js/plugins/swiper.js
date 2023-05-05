import Swiper, {Autoplay, Navigation, Pagination} from 'swiper';

if (document.querySelector(".portfolioSwiper")) {
    const swiper = new Swiper(".portfolioSwiper", {
        modules: [Autoplay, Pagination, Navigation],
        spaceBetween: 15,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoHeight: true,
        allowTouchMove: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: true,
        },
        breakpoints: {
            300: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 1.3,
            },
            768: {
                slidesPerView: 1.5,
            },
            1000: {
                slidesPerView: 2,
            },
        },
    });
}

