const items = document.querySelectorAll(".menu__item");

items.forEach((item) => {
  item.addEventListener("click", () => {
    document.querySelector(".menu__item.active").classList.remove("active");
    item.classList.add("active");
  });
});
