let alerts = document.querySelectorAll(".alert");

function hide_alert(element) {
  element.style.display = "none";
}

alerts.forEach((element) => {
  element.onclick = function () {
    hide_alert(element);
  };
});

setTimeout(() => {
  alerts.forEach((element) => {
    hide_alert(element);
  });
}, 5000);
