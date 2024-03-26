window.onscroll = function() {
    scrollFunction();
    // changeColorScrollButton();
};

/*=============== Shrink Sticky Navigation Bar ===============*/ 
function scrollFunction() {
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
        document.querySelector(".header-sticky").style.height = "60px";
        document.querySelector(".header").style.boxShadow = "0 4px 5px -5px rgba(0, 0, 0, 1)";
        document.querySelector(".header__navbar-logo-img").style.width = "70%";
    } else {
        document.querySelector(".header-sticky").style.height = "120px";
        document.querySelector(".header").style.boxShadow = "none";
        document.querySelector(".header__navbar-logo-img").style.width = "100%";
    }
}

/*=============== Open Navbar ===============*/ 
const hamburger = document.querySelector('.hamburger');
const mobileNavCloseBtn = document.querySelector('.navbar__mobile');
const closeBtn = document.querySelector('.navbar__mobile-close-btn');

hamburger.addEventListener('click', () => {
    mobileNavCloseBtn.classList.add('active');
    document.body.classList.add('ov-hidden');
});

closeBtn.addEventListener('click', () => {
    mobileNavCloseBtn.classList.remove('active');
    document.body.classList.remove('ov-hidden');
});

/*=============== Open Cart ===============*/ 
const cartIcons = document.querySelectorAll('.cart-icon');
const cartOverlay = document.querySelector('.cart-overlay');
const cartClose = document.querySelector('.cart-close');

cartIcons.forEach(cartIcon => {
    cartIcon.addEventListener('click', () => {
        cartOverlay.classList.add('active');
        document.body.classList.add('ov-hidden');
    });
});

cartClose.addEventListener('click', () => {
    cartOverlay.classList.remove('active');
    document.body.classList.remove('ov-hidden');
});

/*=============== SLIDER ===============*/ 
const slider = document.getElementById('slider');
const prevButton = document.querySelector('.button-prev');
const nextButton = document.querySelector('.button-next');

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

/*=============== SHOW SCROLL UP ===============*/ 
const scrollTop = () => {
    const scrollTop = document.getElementById('scroll-top')
    this.scrollY >= 350 ? scrollTop.classList.add('show-angles-up') : scrollTop.classList.remove('show-angles-up')
}
window.addEventListener('scroll', scrollTop)