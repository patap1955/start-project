import Swiper, { Autoplay, Navigation, Pagination } from "swiper";
import "swiper/css";
import "swiper/css/pagination";

// bath swiper
if (document.querySelector(".bathSwiper")) {
    const bathSwiper = new Swiper(".bathSwiper", {
        modules: [Pagination],
        slidesPerView: "auto",
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
}

// docs swiper
if (document.querySelector(".docsSwiper")) {
    const swiper = new Swiper(".docsSwiper", {
        // Optional parameters
        // direction: "vertical",
        // loop: true,
        slidesPerView: 4,
        // modules: [Navigation],
        spaceBetween: 30,

        // If we need pagination
        // pagination: {
        //   el: ".swiper-pagination",
        // },

        // Navigation arrows
        // navigation: {
        //     nextEl: ".swiper-button-next",
        //     prevEl: ".swiper-button-prev",
        // },

        // And if we need scrollbar
        // scrollbar: {
        //     el: ".swiper-scrollbar",
        // },
        breakpoints: {
            1290: {
                slidesPerView: 4,
            },
            780: {
                slidesPerView: 3,
            },
            600: {
                slidesPerView: 2.4,
            },
            450: {
                slidesPerView: 1.5,
            },
            359: {
                slidesPerView: 1.2,
            },
            1: {
                slidesPerView: 1,
            },
        },
    });
}

//certificates SWIPER
// if (document.querySelector(".mySwiper")) {
//     const swiper = new Swiper(".mySwiper", {
//         // Optional parameters
//         // direction: "vertical",
//         // loop: true,
//         slidesPerView: 4,
//         // modules: [Navigation],
//         spaceBetween: 30,

//         // If we need pagination
//         // pagination: {
//         //   el: ".swiper-pagination",
//         // },

//         // Navigation arrows
//         // navigation: {
//         //     nextEl: ".swiper-button-next",
//         //     prevEl: ".swiper-button-prev",
//         // },

//         // And if we need scrollbar
//         // scrollbar: {
//         //     el: ".swiper-scrollbar",
//         // },
//         breakpoints: {
//             1290: {
//                 slidesPerView: 4,
//             },
//             780: {
//                 slidesPerView: 3,
//             },
//             600: {
//                 slidesPerView: 2.4,
//             },
//             450: {
//                 slidesPerView: 1.5,
//             },
//             359: {
//                 slidesPerView: 1.2,
//             },
//             1: {
//                 slidesPerView: 1,
//             },
//         },
//     });
// }

// Слайдер на первом экране
if (document.querySelector(".firstScreenSwiper")) {
    const swiper = new Swiper(".firstScreenSwiper", {
        modules: [Navigation],
        allowTouchMove: true,
        spaceBetween: 10,
        slidesPerView: 1.1,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            541: {
                slidesPerView: 1,
                loop: false,
            },
        },
    });
}

if (document.querySelector(".aboutSwiper")) {
    const swiperAbout = new Swiper(".aboutSwiper", {
        modules: [Navigation],
        allowTouchMove: true,
        slidesPerView: 1.1,
        spaceBetween: 10,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            541: {
                slidesPerView: 1,
                loop: false,
            },
        },
    });
}

if (document.querySelector(".projectSwiper")) {
    const swiperProject = new Swiper(".projectSwiper", {
        modules: [],
        spaceBetween: 30,
        // autoHeight: true,
        allowTouchMove: true,
        slidesPerView: 3,
        loop: true,
        breakpoints: {
            320: {
                slidesPerView: 1.1,
            },
            481: {
                slidesPerView: 2.1,
            },
            1024: {
                slidesPerView: 3,
                loop: false,
            },
        },
    });
}

if (document.querySelector(".newsSwiper")) {
    const swiperProject = new Swiper(".newsSwiper", {
        modules: [],
        spaceBetween: 30,
        // autoHeight: true,
        allowTouchMove: true,
        slidesPerView: 3,
        loop: true,
        breakpoints: {
            320: {
                slidesPerView: 1.1,
            },
            705: {
                slidesPerView: 2.1,
            },
            1200: {
                slidesPerView: 3,
                loop: false,
            },
        },
    });
}
