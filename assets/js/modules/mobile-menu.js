function overflowHidden() {
  const htmlTag = document.querySelector("html");
  htmlTag.classList.toggle("overflow-hidden");
}
const menuMobileHandler = document.querySelector(".open-pop");
const mobileMenu = document.querySelector(".menu-popup");
const btnClose = document.querySelector(".close-pop");
const header = document.querySelector("header");
if (header) {
  console.log("header exist");

  menuMobileHandler.addEventListener("click", () => {
    console.log("cliked");
    mobileMenu.classList.toggle("show");
    overflowHandler();
  });
  btnClose.addEventListener("click", () => {
    console.log("cliked on close");
    mobileMenu.classList.toggle("show");
    overflowHandler();
  });
}
