let images = document.querySelectorAll(".salon-details .image img");
let left_arrow = document.querySelector(".salon-details .image .left");
let right_arrow = document.querySelector(".salon-details .image .right");
let bullets_parent = document.querySelector(".salon-details .image .bullets");
let bullets = [];

let counter = 0;

window.addEventListener("load", () => {
  bullets = document.querySelectorAll(".salon-details .image .bullets span");
  add_active_class();
});

// create bullets
for (let i = 0; i < images.length; i++) {
  let bullet = document.createElement("span");
  bullets_parent.appendChild(bullet);
}

window.addEventListener("load", () => {
  bullets.forEach((ele, index) => {
    ele.addEventListener("click", () => {
      remove_active_class();
      counter = index;
      add_active_class();
    });
  });
});

left_arrow.addEventListener("click", () => {
  remove_active_class();

  counter--;

  if (counter < 0) {
    counter = images.length - 1;
  }

  add_active_class();
});

right_arrow.addEventListener("click", () => {
  remove_active_class();

  counter++;

  if (counter > images.length - 1) {
    counter = 0;
  }

  add_active_class();
});

function remove_active_class() {
  images[counter].classList.remove("active");
  bullets[counter].classList.remove("active");
}

function add_active_class() {
  images[counter].classList.add("active");
  bullets[counter].classList.add("active");
}
