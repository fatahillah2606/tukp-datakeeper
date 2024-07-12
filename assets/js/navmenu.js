// Define
let dropdown = document.querySelectorAll(".dropdown");
let menuBtn = document.querySelector(".menu-btn");
let navMenu = document.querySelector(".navmenu");
let notifikasi = document.querySelector(".navbar .right-cont .notif");
let menuNotifikasi = document.querySelector(".notifikasi");
let tutupNotifikasi = document.querySelector(
  ".navbar .notifikasi .head span.material-symbols-rounded"
);
let profile = document.querySelector(".profile");
let profileMenu = document.querySelector(".profile-menu");
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
    if (element.classList.contains("show")) {
      element.classList.remove("show");
    } else {
      element.classList.add("show");
    }
  });
});

// Menu Button
menuBtn.addEventListener("click", () => {
  if (navMenu.classList.contains("active")) {
    navMenu.classList.remove("active");
    menuBtn.innerHTML = "menu";
    dropdown.forEach((element) => {
      element.classList.remove("show");
    });
  } else {
    navMenu.classList.add("active");
    menuBtn.innerHTML = "arrow_back";
  }
});

// Notifikasi
function bukaNotifikasi() {
  if (profileMenu.classList.contains("show")) {
    profileMenu.classList.remove("show");
  }
  menuNotifikasi.classList.toggle("show");
}
notifikasi.addEventListener("click", (e) => {
  e.stopPropagation();
  bukaNotifikasi();
});
tutupNotifikasi.addEventListener("click", (e) => {
  e.stopPropagation();
  bukaNotifikasi();
});
menuNotifikasi.addEventListener("click", (e) => {
  e.stopPropagation();
});

// Profile Menu
function bukaMenuProfil() {
  if (menuNotifikasi.classList.contains("show")) {
    menuNotifikasi.classList.remove("show");
  }
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
profileMenu.addEventListener("click", (e) => {
  e.stopPropagation();
});

document.addEventListener("click", (e) => {
  if (
    profileMenu.classList.contains("show") &&
    !profileMenu.contains(e.target) &&
    e.target.id !== "bukaMenuProfil"
  ) {
    profileMenu.classList.remove("show");
  }
  if (
    menuNotifikasi.classList.contains("show") &&
    !menuNotifikasi.contains(e.target) &&
    e.target.id !== "bukaNotifikasi"
  ) {
    menuNotifikasi.classList.remove("show");
  }
});

// Hak cipta
const hakCipta = document.createElement("p");
hakCipta.innerHTML =
  "&copy;" + new Date().getFullYear() + " - Andika Kurniawan";
hakCipta.classList.add("hak-cipta");
profileMenu.appendChild(hakCipta);

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

// Dark mode
function darkMode() {
  document.documentElement.setAttribute("data-theme", "dark");
  saklar.classList.add("aktif");
}
function lightMode() {
  document.documentElement.removeAttribute("data-theme");
  saklar.classList.remove("aktif");
}

// saklar dark mode
saklar.addEventListener("click", () => {
  if (saklar.classList.contains("aktif")) {
    lightMode();
  } else {
    darkMode();
  }
});

// Cek sekema warna sistem
// if (
//   window.matchMedia &&
//   window.matchMedia("(prefers-color-scheme: dark)").matches
// ) {
//   darkMode();
// }

// Ganti mode jika skema warna sistem berubah
window
  .matchMedia("(prefers-color-scheme: dark)")
  .addEventListener("change", (event) => {
    event.matches ? darkMode() : lightMode();
  });
