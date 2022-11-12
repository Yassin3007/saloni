let drop_zone = document.querySelector(".salon-form .drop-zone");
let file_input = document.querySelector(".salon-form input[type=file]");

file_input.onchange = function () {
  let images_container = document.createElement("div");
  images_container.classList.add("images");

  [...file_input.files].forEach((ele) => {
    let image = document.createElement("img");
    image.src = URL.createObjectURL(ele);
    image.alt = ele.name;
    images_container.appendChild(image);
  });

  drop_zone.appendChild(images_container);
};
