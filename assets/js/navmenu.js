// Define
let dropdown = document.querySelectorAll(".dropdown");
let menuBtn = document.querySelector(".menu-btn");
let navMenu = document.querySelector(".navmenu");
let profileMenu = document.querySelector(".profile-menu");
let profile = document.querySelector(".profile");
let tutupMenuProfil = document.querySelector(".close-pf-menu");
let saklar = document.querySelector(".saklar");

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

// Profile Menu
function bukaMenuProfil() {
  profileMenu.classList.toggle("show");
}
profile.addEventListener("click", (e) => {
  e.stopPropagation();
  bukaMenuProfil();
});
tutupMenuProfil.addEventListener("click", (e) => {
  e.stopPropagation();
  bukaMenuProfil();
});

document.addEventListener("click", (e) => {
  if (
    profileMenu.classList.contains("show") &&
    !profileMenu.contains(e.target)
  ) {
    profileMenu.classList.remove("show");
  }
});

profileMenu.addEventListener("click", (e) => {
  e.stopPropagation();
});

// Toggle dark mode
saklar.addEventListener("click", () => {
  saklar.classList.toggle("aktif");
});
