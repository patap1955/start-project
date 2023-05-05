import "animate.css";

document.addEventListener("DOMContentLoaded", () => {
    // Логическая функция вывода анимация
    // elem - массив блоков или отдельный блок для анимации
    // className - класс отвечающий за анимацию

    function animate(elem, className = "animate") {
        // console.log("elem", elem);
        let windowCenter = window.innerHeight / 1 + window.scrollY; // ширина экрана * 1.1 + высота на сколько просролили экран
        elem.forEach((el) => {
            // console.log("el", el);
            let observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    // console.log(entry);
                    if (entry.isIntersecting) {
                        return entry.target.classList.add(className);
                    }
                });
            });

            let scrollOffset = el.offsetParent.offsetTop + el.offsetHeight / 2;
            if (windowCenter >= scrollOffset) {
                observer.observe(el);
            }
        });
    }

    //myp comfort animations
    // animation types
    const zoomIn = "animate__zoomIn";
    const backInRight = "animate__backInRight";
    const backInLeft = "animate__backInLeft";
    const bounceInDown = "animate__bounceInDown";
    const bounceInUp = "animate__bounceInUp";
    const fadeIn = "animate__fadeIn";
    const flip = "animate__flip";
    const lightSpeedInRight = "animate__lightSpeedInRight";
    const zoomInRight = "animate__zoomInRight";
    const zoomInLeft = "animate__zoomInLeft";

    // #hero
    const heroText = document.querySelectorAll(".hero__text");
    if (heroText) animate(heroText, backInLeft);

    // #about
    const aboutText = document.querySelectorAll(".about__text");
    const aboutImage = document.querySelectorAll(".about__image");
    if (aboutText) {
        animate(aboutText, backInLeft);
    }
    if (aboutImage) {
        animate(aboutImage, backInRight);
    }

    // #rooms
    const roomsCard1 = document.querySelectorAll("#room1");
    const roomsCard2 = document.querySelectorAll("#room2");
    if (roomsCard1) animate(roomsCard1, zoomInLeft);
    if (roomsCard2) animate(roomsCard2, zoomInRight);

    // #laundry
    const laundryText = document.querySelectorAll(".laundry__text");
    const laundryImage = document.querySelectorAll(".laundry__image");
    if (laundryText) {
        animate(laundryText, backInLeft);
    }
    if (laundryImage) {
        animate(laundryImage, backInRight);
    }

    // #contacts
    const contactsText = document.querySelectorAll(".contacts__text");
    const contactsMap = document.querySelectorAll(".contacts__map");
    if (contactsText) {
        animate(contactsText, backInLeft);
    }
    if (contactsMap) {
        animate(contactsMap, backInRight);
    }

    window.addEventListener("scroll", () => {
        if (heroText) animate(heroText, backInLeft);

        if (aboutText) {
            animate(aboutText, backInLeft);
        }
        if (aboutImage) {
            animate(aboutImage, backInRight);
        }
        if (contactsText) {
            animate(contactsText, backInLeft);
        }
        if (contactsMap) {
            animate(contactsMap, backInRight);
        }
        if (laundryText) {
            animate(laundryText, backInLeft);
        }
        if (laundryImage) {
            animate(laundryImage, backInRight);
        }
        if (roomsCard1) animate(roomsCard1, zoomInLeft);
        if (roomsCard2) animate(roomsCard2, zoomInRight);
    });
});
