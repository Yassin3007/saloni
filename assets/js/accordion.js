let accordion_headings = document.querySelectorAll(".accordion .item .head");
let accordion_conts = document.querySelectorAll(".accordion .item .cont");
let accordion_icons = document.querySelectorAll(".accordion .item .icon");

accordion_headings.forEach((element, index) => {
  element.addEventListener("click", () => {
    accordion_conts[index].classList.toggle("show");
    accordion_icons[index].classList.toggle("rotate");
  });
});
