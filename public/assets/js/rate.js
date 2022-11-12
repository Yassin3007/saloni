let stars = document.querySelectorAll(".add-comment .rate .star");
let stars_count = document.querySelector(".add-comment .stars-count");

stars.forEach((star, index) => {
  star.addEventListener("click", () => {
    for (let i = 0; i <= index; i++) {
      stars[i].classList.add("active");
    }

    for (let i = index + 1; i < stars.length; i++) {
      stars[i].classList.remove("active");
    }

    stars_count.value = [...stars].filter((star) => {
      return star.classList.contains("active");
    }).length;
  });
});
