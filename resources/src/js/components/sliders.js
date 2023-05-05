// Слайдер на первом экране
const prev    = document.querySelector('.sliders__nav-prev'),
      next    = document.querySelector('.sliders__nav-next'),
      slides = document.querySelectorAll('.sliders__item');

let index = 0;

const activeSlide = n => {
    console.log(n)
    slides.forEach(el => {
        el.classList.remove('active');
        el.classList.remove('sliders__item-next');
        el.classList.remove('sliders__item-prev');
    });
    let indexPrev = 0;
    let indexNext = 0;
    if (n == 2) {
        indexNext = 0;
        indexPrev = n - 1;
    }
    if (n == 1) {
        indexNext = n + 1;
        indexPrev = n - 1;
    }
    if (n == 0) {
        indexNext = n + 1;
        indexPrev = 2;
    }

    slides[indexPrev].classList.add('sliders__item-prev')
    slides[indexNext].classList.add('sliders__item-next')
    slides[n].classList.add('active');
}

const nextSlide = () => {
    if (index == slides.length - 1) {
        index = 0;
        activeSlide(index);
    } else {
        index++;
        activeSlide(index);
    }
}

const prevSlide = () => {
    if (index == 0) {
        index = slides.length - 1;
        activeSlide(index);
    } else {
        index--;
        activeSlide(index);
    }
}

next.addEventListener('click', nextSlide);
prev.addEventListener('click', prevSlide);

// Слайдер в блоке О комрпнии
const prevAbout    = document.querySelector('.sliders__nav-prev-about'),
    nextAbout    = document.querySelector('.sliders__nav-next-about'),
    slidesAbout = document.querySelectorAll('.sliders__item-about');

let indexAbout = 0;

const activeSlideAbout = n => {
    console.log(n)
    slidesAbout.forEach(el => {
        el.classList.remove('active');
        el.classList.remove('sliders__item-next-about');
        el.classList.remove('sliders__item-prev-about');
    });
    let indexPrevAbout = 0;
    let indexNextAbout = 0;
    if (n == 2) {
        indexNextAbout = 0;
        indexPrevAbout = n - 1;
    }
    if (n == 1) {
        indexNextAbout = n + 1;
        indexPrevAbout = n - 1;
    }
    if (n == 0) {
        indexNextAbout = n + 1;
        indexPrevAbout = 2;
    }

    slidesAbout[indexPrevAbout].classList.add('sliders__item-prev-about')
    slidesAbout[indexNextAbout].classList.add('sliders__item-next-about')
    slidesAbout[n].classList.add('active');
}

const nextSlideAbout = () => {
    if (indexAbout == slidesAbout.length - 1) {
        indexAbout = 0;
        activeSlideAbout(indexAbout);
    } else {
        indexAbout++;
        activeSlideAbout(indexAbout);
    }
}

const prevSlideAbout = () => {
    if (indexAbout == 0) {
        indexAbout = slides.length - 1;
        activeSlideAbout(indexAbout);
    } else {
        indexAbout--;
        activeSlideAbout(indexAbout);
    }
}

nextAbout.addEventListener('click', nextSlideAbout);
prevAbout.addEventListener('click', prevSlideAbout);
