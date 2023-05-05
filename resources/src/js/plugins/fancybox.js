import { Fancybox } from "@fancyapps/ui";
import "@fancyapps/ui/dist/fancybox.css";
(() => {
    Fancybox.bind('[data-fancybox="gallery"]', {
        // caption: function (fancybox, carousel, slide) {
        //     return (
        //         `${slide.index + 1} / ${carousel.slides.length} <br />` + slide.caption
        //     );
        // },
        animationEffect: "zoom",
        touch: {
            vertical: true,
            momentum: true
        },
        slideShow: {
            autoStart: false,
            speed: 3000
        },
        trapFocus: false,
        dragToClose: false,
    });
})()
