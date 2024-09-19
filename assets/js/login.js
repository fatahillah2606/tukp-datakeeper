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
    e.addEventListener("keyup", () => {
      if (e.parentElement.classList.contains("error")) {
        hapusError(e.parentElement);
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

// Field Error
function tampilkanError(elemen, pesan) {
  elemen.classList.add("error");
  elemen.querySelector(".supporting-text").innerText = pesan;
}

function hapusError(elemen) {
  elemen.classList.remove("error");
  elemen.querySelector(".supporting-text").innerText = "";
}

// Redirect
function pindahHalaman(alamat) {
  window.location.href = alamat;
}

// Proses login
function masuk(formulir, jenisPengguna, event) {
  event.preventDefault();

  let adaYangKosong = false;
  let adaError = false;

  let kolomIsian = formulir.querySelectorAll("input[required]:not([disabled])");
  let textField = formulir.querySelectorAll(".input-field");

  // Cek jika ada kolom yg kosong
  kolomIsian.forEach((element) => {
    if (element.value.trim() === "") {
      adaYangKosong = true;
      let elemenKosong = element.parentElement;
      tampilkanError(elemenKosong, "Wajib diisi");
    }
  });

  // cek jika ketentuan belum terpenuhi
  textField.forEach((element) => {
    if (element.classList.contains("error")) {
      adaError = true;
    }
  });

  // Proses login
  if (!adaYangKosong && !adaError) {
    // Ambil data
    let userId = formulir.querySelector("#no-id");
    let userEmail = formulir.querySelector("#email");
    let username;
    let password = formulir.querySelector("#passwd").value;

    if (userId) {
      username = userId.value;
    } else if (userEmail) {
      username = userEmail.value;
    }

    let xhrLogin = new XMLHttpRequest();
    xhrLogin.open("POST", "/functions/login-process.php", true);
    xhrLogin.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );

    xhrLogin.onload = function () {
      if (xhrLogin.status === 200) {
        let respon = JSON.parse(xhrLogin.responseText);
        if (respon.status === "berhasil") {
          pindahHalaman(respon.halaman);
        } else {
          tampilkanError(
            formulir.querySelector(respon.elemen).parentElement,
            respon.pesan
          );
        }
      } else {
        console.log("Kesalahan: " + xhrLogin.status);
      }
    };

    xhrLogin.send(
      jenisPengguna +
        "=true&akun=" +
        encodeURIComponent(username) +
        "&SandiUser=" +
        encodeURIComponent(password)
    );
  }
}
