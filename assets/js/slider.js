/*=============== SLIDER ===============*/ 
const slider = document.getElementById('slider');
const prevButton = document.querySelector('.carousel-btn-prev');
const nextButton = document.querySelector('.carousel-btn-next');

let scrollPosition = 0;

function scrollNext() {
    const itemWidth = slider.offsetWidth;
    scrollPosition += itemWidth;
    if (scrollPosition > slider.scrollWidth - slider.clientWidth) {
        scrollPosition = slider.scrollWidth - slider.clientWidth;
    }
    slider.scroll({
        left: scrollPosition,
        behavior: 'smooth'
    });
}

function scrollPrev() {
    const itemWidth = slider.offsetWidth;
    scrollPosition -= itemWidth;
    if (scrollPosition < 0) {
        scrollPosition = 0;
    }
    slider.scroll({
        left: scrollPosition,
        behavior: 'smooth'
    });
}

nextButton.addEventListener('click', scrollNext);
prevButton.addEventListener('click', scrollPrev);