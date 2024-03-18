import Swiper from 'swiper/bundle';

const autoplay = {
  delay: 3250,
  disableOnInteraction: false,
  pauseOnMouseEnter: true
};

export const homeHeadSlider = new Swiper('#home-head-slider', {
  slidesPerView: 1,
  loop: true,
  spaceBetween: 16,
  centeredSlides: true,
  autoHeight: true,
  // autoplay,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  }
});