/* start add copon */
let add_copon_form = document.querySelector(".add-copon form");
let add_copon = document.querySelector(".add-copon .add-btn");
let close_btn = document.querySelector(".add-copon form div .close");

add_copon.addEventListener("click", () => {
  add_copon_form.classList.add("active");
});

close_btn.addEventListener("click", (e) => {
  e.preventDefault();
  add_copon_form.classList.remove("active");
});
/* end add copon */
