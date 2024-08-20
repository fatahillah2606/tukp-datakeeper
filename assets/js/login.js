// User Options
let userOptions = document.querySelector(".user-options");
let opsiPengguna = document.querySelector(".opsi");

function selectUserType() {
  opsiPengguna.classList.toggle("show");
}
if (userOptions) {
  userOptions.addEventListener("click", (e) => {
    e.stopPropagation();
    selectUserType();
  });
}
if (opsiPengguna) {
  document.addEventListener("click", (e) => {
    if (
      opsiPengguna.classList.contains("show") &&
      !opsiPengguna.contains(e.target) &&
      e.target.id !== "selectUserType"
    ) {
      opsiPengguna.classList.remove("show");
    }
  });
}

// focus animation
function focusAnimation() {
  let inputField = document.querySelectorAll(
    ".konten .right-cont .input-field input"
  );

  inputField.forEach((e) => {
    // Jika field tidak kosong
    if (e.value !== "") {
      e.parentElement.classList.add("fokus");
    }
    e.addEventListener("focus", () => {
      e.parentElement.classList.add("fokus");
    });
    e.addEventListener("blur", () => {
      if (e.value === "") {
        e.parentElement.classList.remove("fokus");
      }
    });
  });
}
focusAnimation();

// Show Password
let showPwBtn = document.querySelector(".show-passwd input");
if (showPwBtn) {
  let passwdField = document.querySelector("#passwd");
  showPwBtn.addEventListener("change", () => {
    if (showPwBtn.checked) {
      passwdField.setAttribute("type", "text");
    } else {
      passwdField.setAttribute("type", "password");
    }
  });
}

// Dark mode
function darkMode() {
  document.documentElement.setAttribute("data-theme", "dark");
}
function lightMode() {
  document.documentElement.removeAttribute("data-theme");
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

// Ganti mode jika skema warna sistem berubah
window
  .matchMedia("(prefers-color-scheme: dark)")
  .addEventListener("change", (event) => {
    event.matches
      ? setDarkMode("modeGelap", "true", 30)
      : setDarkMode("modeGelap", "false", 30);
  });
//

// Forget password
let ingatIdEmail = document.getElementsByName("ingat-id-email");
if (ingatIdEmail) {
  ingatIdEmail.forEach((pilihan) => {
    pilihan.addEventListener("click", () => {
      let formulir = document.querySelector("form");
      formulir.querySelectorAll(".input-field").forEach((element) => {
        element.classList.add("hide");
      });

      formulir.querySelectorAll(".input-field input").forEach((element) => {
        element.value = "";
        element.setAttribute("disabled", "");
        element.parentElement.classList.remove("fokus");
      });

      // Cek pilihan pengguna
      if (pilihan.value === "Ya") {
        let userAccount = document.getElementById("user-account");
        userAccount.classList.remove("hide");
        userAccount.querySelector("input").removeAttribute("disabled");
      } else {
        let userName = document.getElementById("user-name");
        userName.classList.remove("hide");
        userName.querySelector("input").removeAttribute("disabled");
      }
      document
        .querySelector(".konten .buttons button")
        .removeAttribute("disabled");
    });
  });
}
