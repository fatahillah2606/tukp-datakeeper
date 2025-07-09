// toggle menu
let menuBtn = document.getElementById("menu-btn");
let layout = document.querySelector(".layout");
menuBtn.addEventListener("click", () => {
    layout.classList.toggle("menu-active");
});
