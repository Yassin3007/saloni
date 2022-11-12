let file_input = document.querySelector(".setting .personal-image input");
let image = document.querySelector(".personal-image img");

file_input.addEventListener("change", function () {
  image.src = URL.createObjectURL(this.files[0]);
});
