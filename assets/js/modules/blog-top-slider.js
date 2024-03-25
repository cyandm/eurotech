import Swiper from "swiper";

var swiper = new Swiper(".blogslider", {
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop: true,
  slidesPerView: 1,
  spaceBetween: 20,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  speed: 1000,
  parallax: true,
});
