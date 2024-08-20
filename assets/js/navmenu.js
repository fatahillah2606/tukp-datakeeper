// Define
let dropdown = document.querySelectorAll(".dropdown");
let menuBtn = document.querySelectorAll(".menu-btn");
let navMenu = document.querySelector(".navmenu");
let notifikasi = document.querySelector(".navbar .right-cont .notif");
let jumlahNotif = document.querySelector(".notif-count");
let banyakNotif = document.querySelectorAll(".notif-menu");
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
      openSideMenu();
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
menuBtn.forEach((e) => {
  e.addEventListener("click", openSideMenu);
});
function openSideMenu() {
  if (navMenu.classList.contains("active")) {
    navMenu.classList.remove("active");
    menuBtn.forEach((e) => {
      e.innerHTML = "menu";
    });
    dropdown.forEach((element) => {
      element.classList.remove("show");
    });
  } else {
    navMenu.classList.add("active");
    menuBtn.forEach((e) => {
      e.innerHTML = "arrow_back";
    });
  }
}

// Notifikasi
if (notifikasi && menuNotifikasi) {
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

  // Jumlah notif
  if (banyakNotif.length !== 0) {
    jumlahNotif.innerHTML = banyakNotif.length;
    notifikasi.classList.remove("none");
    menuNotifikasi.classList.remove("none");
  } else {
    notifikasi.classList.add("none");
    menuNotifikasi.classList.add("none");
  }
}

// Profile Menu
function bukaMenuProfil() {
  if (notifikasi && menuNotifikasi) {
    if (menuNotifikasi.classList.contains("show")) {
      menuNotifikasi.classList.remove("show");
    }
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
  if (notifikasi && menuNotifikasi) {
    if (
      menuNotifikasi.classList.contains("show") &&
      !menuNotifikasi.contains(e.target) &&
      e.target.id !== "bukaNotifikasi"
    ) {
      menuNotifikasi.classList.remove("show");
    }
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

// Simpan pengaturan mode gelap
function setDarkMode(cname, cvalue, exdays) {
  // atur batas waktu penyimpanan pengaturan
  const d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  let expires = "expires=" + d.toUTCString();
  // buat cookie untuk menyimpan pengaturan dark mode
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  cekDarkMode();
}

// Cek pengaturan mode gelap
function getDarkMode(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

// Cek pengaturan mode gelap
function cekDarkMode() {
  let modeGelap = getDarkMode("modeGelap");
  if (modeGelap != "") {
    // Atur mode gelap sesuai pengaturan sebelumnya
    if (modeGelap === "true") {
      darkMode();
    } else if (modeGelap === "false") {
      lightMode();
    } else {
      // jika value tidak jelas, ikuti skema sistem
      cekSkemaSistem();
    }
  } else {
    // jika tidak diatur, ikuti skema sistem
    cekSkemaSistem();
  }
}
cekDarkMode();

// Cek skema warna sistem
function cekSkemaSistem() {
  if (
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches
  ) {
    darkMode();
  }
}

// saklar dark mode
saklar.addEventListener("click", () => {
  if (saklar.classList.contains("aktif")) {
    setDarkMode("modeGelap", "false", 30);
    // cekDarkMode();
  } else {
    setDarkMode("modeGelap", "true", 30);
    // cekDarkMode();
  }
});

// Ganti mode jika skema warna sistem berubah
window
  .matchMedia("(prefers-color-scheme: dark)")
  .addEventListener("change", (event) => {
    event.matches
      ? setDarkMode("modeGelap", "true", 30)
      : setDarkMode("modeGelap", "false", 30);
  });
