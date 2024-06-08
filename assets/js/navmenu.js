// Define
let dropdown = document.querySelectorAll(".dropdown");
let menuBtn = document.querySelector(".menu-btn");
let navMenu = document.querySelector(".navmenu");

// Dropdown
dropdown.forEach((element) => {
  element.addEventListener("click", () => {
    // cek jika side bar dibuka
    if (!navMenu.classList.contains("active")) {
      menuBtn.click();
    }
    // buka dropdown
    if (element.classList.contains("active")) {
      element.classList.remove("active");
    } else {
      element.classList.add("active");
    }
  });
});

// Menu Button
menuBtn.addEventListener("click", () => {
  if (navMenu.classList.contains("active")) {
    navMenu.classList.remove("active");
    menuBtn.innerHTML = "menu";
    dropdown.forEach((element) => {
      element.classList.remove("active");
    });
  } else {
    navMenu.classList.add("active");
    menuBtn.innerHTML = "arrow_back";
  }
});
