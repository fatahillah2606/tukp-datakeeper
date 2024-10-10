// Dropdown
let dropdown = document.querySelectorAll(".dropdown");
if (dropdown) {
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
}

// Menu Button
let menuBtn = document.querySelectorAll(".menu-btn");
let navMenu = document.querySelector(".navmenu");
menuBtn.forEach((e) => {
  e.addEventListener("click", openSideMenu);
});
function openSideMenu() {
  if (navMenu.classList.contains("active")) {
    navMenu.classList.remove("active");
    history.back();
    menuBtn.forEach((e) => {
      e.innerHTML = "menu";
    });
    if (dropdown) {
      dropdown.forEach((element) => {
        element.classList.remove("show");
      });
    }
  } else {
    navMenu.classList.add("active");
    history.pushState({ openMenu: true }, "");
    menuBtn.forEach((e) => {
      e.innerHTML = "arrow_back";
    });
  }
}

// Notifikasi
let notifikasi = document.querySelector(".navbar .right-cont .notif");
let jumlahNotif = document.querySelector(".notif-count");
let menuNotifikasi = document.querySelector(".notifikasi");
let tutupNotifikasi = document.querySelector(
  ".navbar .notifikasi .head span.material-symbols-rounded"
);

if (notifikasi && menuNotifikasi) {
  function bukaNotifikasi() {
    if (profileMenu.classList.contains("show")) {
      profileMenu.classList.remove("show");
    }

    if (notifikasi.classList.contains("aktif")) {
      notifikasi.classList.remove("aktif");
      menuNotifikasi.classList.remove("show");
      history.back();
    } else {
      notifikasi.classList.add("aktif");
      menuNotifikasi.classList.add("show");
      history.pushState({ openNotif: true }, "");
    }
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
  function cekJumlahNotif() {
    let banyakNotif = document.querySelectorAll(".notif-menu");
    if (banyakNotif.length !== 0) {
      jumlahNotif.innerHTML = banyakNotif.length;
      notifikasi.classList.remove("none");
      menuNotifikasi.classList.remove("none");
    } else {
      notifikasi.classList.add("none");
      menuNotifikasi.classList.add("none");
    }
  }
  cekJumlahNotif();
}

// Hapus notif
function hapusNotif(id, event) {
  event.preventDefault();
  let HapusNotif = new XMLHttpRequest();
  HapusNotif.open("POST", "/functions/users-manager.php", true);
  HapusNotif.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );

  HapusNotif.onload = function () {
    if (HapusNotif.status === 200) {
      cekNotif();
    }
  };

  HapusNotif.send("HapusNotif=true&NotifId=" + id);
}

// Cek notif
function cekNotif() {
  let CekNotif = new XMLHttpRequest();
  CekNotif.open("POST", "/functions/users-manager.php", true);
  CekNotif.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );

  CekNotif.onload = function () {
    if (CekNotif.status === 200) {
      let kontenNotif = document.querySelector(".navbar .notifikasi .content");
      if (kontenNotif) {
        kontenNotif.innerHTML = CekNotif.responseText;
        cekJumlahNotif();
      }
    }
  };

  CekNotif.send("CekNotif=true");
}

cekNotif();
setInterval(() => {
  cekNotif();
}, 1000 * 60 * 5);

// Profile Menu
let profile = document.querySelector(".profile");
let profileMenu = document.querySelector(".profile-menu");
let tutupMenuProfil = document.querySelector(".close-pf-menu");

function bukaMenuProfil() {
  if (notifikasi && menuNotifikasi) {
    if (menuNotifikasi.classList.contains("show")) {
      menuNotifikasi.classList.remove("show");
      notifikasi.classList.remove("aktif");
    }
  }
  if (profileMenu.classList.contains("show")) {
    profileMenu.classList.remove("show");
    history.back();
  } else {
    profileMenu.classList.add("show");
    history.pushState({ openProfile: true }, "");
  }
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
    history.back();
  }
  if (notifikasi && menuNotifikasi) {
    if (
      menuNotifikasi.classList.contains("show") &&
      !menuNotifikasi.contains(e.target) &&
      e.target.id !== "bukaNotifikasi"
    ) {
      menuNotifikasi.classList.remove("show");
      notifikasi.classList.remove("aktif");
      history.back();
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
let saklar = document.querySelector(".saklar");

function darkMode() {
  document.documentElement.setAttribute("data-theme", "dark");
  saklar.classList.add("aktif");
}

function lightMode() {
  document.documentElement.removeAttribute("data-theme");
  saklar.classList.remove("aktif");
}

// Simpan pengaturan mode gelap di cookie
function aturCookie(cname, cvalue, exdays) {
  // atur batas waktu penyimpanan pengaturan
  const d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  let expires = "expires=" + d.toUTCString();

  // buat cookie untuk menyimpan pengaturan dark mode
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  cekDarkMode();
}

// Cek pengaturan mode gelap di cookie
function ambilCookie(cname) {
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
  let modeGelap = ambilCookie("modeGelap");
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
    aturCookie("modeGelap", "false", 30);
    // cekDarkMode();
  } else {
    aturCookie("modeGelap", "true", 30);
    // cekDarkMode();
  }
});

// Ganti mode jika skema warna sistem berubah
window
  .matchMedia("(prefers-color-scheme: dark)")
  .addEventListener("change", (event) => {
    event.matches
      ? aturCookie("modeGelap", "true", 30)
      : aturCookie("modeGelap", "false", 30);
  });

// Snackbar
let snackbar = document.querySelector(".snackbar");
let snackMsg = document.getElementById("snack-msg");
let snackAction = document.getElementById("snack-action");
let snackTime;
let snackAnimate;

function showUpdate(message, actionTxt, actionLnk) {
  // hapus timeout
  clearTimeout(snackAnimate);
  clearTimeout(snackTime);

  // pesan snackbar
  snackMsg.innerHTML = message;
  if (snackAction) {
    snackAction.innerHTML = actionTxt;
    snackAction.setAttribute("href", actionLnk);
  }

  // tampilkan snackbar
  snackbar.classList.add("show");
  setTimeout(() => {
    snackbar.classList.add("animate");
  }, 10);

  // hilangkan snackbar
  snackAnimate = setTimeout(() => {
    snackbar.classList.remove("animate");
    snackTime = setTimeout(() => {
      snackbar.classList.remove("show");
    }, 300);
  }, 5000);
}

// User manager
let KelolaPengguna = document.querySelector(".user-manager-dialog");

if (KelolaPengguna) {
  // Reset pass btn
  let resetPasswd = KelolaPengguna.querySelector(".reset-passwd-btn");
  resetPasswd.addEventListener("click", () => {
    KelolaPengguna.classList.remove("hidePass");
  });

  // Password
  let FirstPass = KelolaPengguna.querySelector("#first-pass");
  let FinalPass = KelolaPengguna.querySelector("#final-pass");
  if (FirstPass && FinalPass) {
    // Pass pertama
    FirstPass.addEventListener("keyup", () => {
      if (FirstPass.value.trim().length < 8) {
        tampilkanError(
          FirstPass.parentElement,
          "Sandi harus minimal 8 karakter"
        );
      } else if (/\s/.test(FirstPass.value)) {
        tampilkanError(
          FirstPass.parentElement,
          "Sandi tidak boleh mengandung spasi"
        );
      } else {
        hapusError(FirstPass.parentElement);
      }
    });

    // Tampilkan sandi
    let ShowPasswdBtn = KelolaPengguna.querySelector(".show-passwd input");
    ShowPasswdBtn.addEventListener("change", () => {
      if (ShowPasswdBtn.checked) {
        FirstPass.setAttribute("type", "text");
        FinalPass.setAttribute("type", "text");
      } else {
        FirstPass.setAttribute("type", "password");
        FinalPass.setAttribute("type", "password");
      }
    });

    // Pass kedua
    FinalPass.addEventListener("keyup", () => {
      if (FinalPass.value === FirstPass.value) {
        hapusError(FinalPass.parentElement);
      } else {
        tampilkanError(FinalPass.parentElement, "Sandi tidak sama");
      }
    });
  }
}

// Tipe pengguna
let userLoginMethod = document.querySelector(".user-login-method");
let tipePengguna = document.getElementById("tipe-pengguna");

if (userLoginMethod && tipePengguna) {
  tipePengguna.addEventListener("change", () => {
    aksesPengguna();
  });
}
function aksesPengguna() {
  userLoginMethod.querySelectorAll(".form-field").forEach((element) => {
    element.classList.add("none");
    element.querySelector("input").setAttribute("disabled", "");
  });
  if (tipePengguna.value === "Admin") {
    userLoginMethod.querySelector("#email").classList.remove("none");
    userLoginMethod
      .querySelector("#email #useremail")
      .removeAttribute("disabled");
  } else if (tipePengguna.value === "User") {
    userLoginMethod.querySelector("#user-id").classList.remove("none");
    userLoginMethod
      .querySelector("#user-id #userid")
      .removeAttribute("disabled");
  }
}

// Tutup dialog
function closeUserManager(dialog) {
  // profile description
  KelolaPengguna.querySelector(".profile-desc .username").innerText =
    "Nama Pengguna";

  KelolaPengguna.querySelector(".profile-desc .userid").innerText =
    "email/user_id";

  KelolaPengguna.querySelector(".profile-desc .userrole").innerText = "Tipe";

  let textField = dialog.querySelectorAll(
    ".formulir .form-field input, .formulir .form-field select"
  );
  textField.forEach((element) => {
    element.parentElement.classList.remove("fokus");
  });
  let fieldPass = dialog.querySelectorAll(
    ".formulir .kolom-sandi .form-field input"
  );
  fieldPass.forEach((sandi) => {
    sandi.setAttribute("type", "password");
  });
  let dialogParent =
    dialog.parentElement.parentElement.parentElement.parentElement;

  dialogParent.classList.remove("animate");
  setTimeout(() => {
    dialogParent.classList.remove("show");
  }, 300);
}

// Field Error
function tampilkanError(elemen, pesan) {
  elemen.classList.add("error");
  elemen.querySelector(".supporting-text").innerText = pesan;
}

function hapusError(elemen) {
  elemen.classList.remove("error");
  elemen.querySelector(".supporting-text").innerText = "";
}

// Cek user menekan tombol kembali
window.addEventListener("popstate", (e) => {
  if (navMenu.classList.contains("active")) {
    navMenu.classList.remove("active");
    menuBtn.forEach((e) => {
      e.innerHTML = "menu";
    });
  }

  if (notifikasi && notifikasi.classList.contains("aktif")) {
    notifikasi.classList.remove("aktif");
    menuNotifikasi.classList.remove("show");
  }

  if (profileMenu.classList.contains("show")) {
    profileMenu.classList.remove("show");
  }
});

// Edit pengguna
function editUser(useracc, usertype) {
  // Request pengguna menggunakan ajax
  let reqUser = new XMLHttpRequest();
  reqUser.open("POST", "/functions/users-manager.php", true);
  reqUser.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  reqUser.onload = function () {
    if (reqUser.status === 200) {
      let respon = JSON.parse(reqUser.responseText);

      // profile description
      KelolaPengguna.querySelector(".profile-desc .username").innerText =
        respon.nama_user;

      if (respon.role === "Admin") {
        KelolaPengguna.querySelector(".profile-desc .userid").innerText =
          respon.email_user;
        KelolaPengguna.querySelector("form #useremail").value =
          respon.email_user;
      } else {
        KelolaPengguna.querySelector(".profile-desc .userid").innerText =
          respon.id_user;
        KelolaPengguna.querySelector("form #userid").value = respon.id_user;
      }

      KelolaPengguna.querySelector(".profile-desc .userrole").innerText =
        respon.role;

      // Text-field
      KelolaPengguna.querySelector("form #tipe-pengguna").value = respon.role;
      KelolaPengguna.querySelector("form #username").value = respon.nama_user;

      let passField = KelolaPengguna.querySelectorAll(
        "form .kolom-sandi .multi-field .form-field input"
      );
      passField.forEach((element) => {
        element.removeAttribute("required");
      });

      // submit button
      let confirmBtn = KelolaPengguna.querySelector(
        ".formulir .tombol-aksi button[type='submit']"
      );

      confirmBtn.setAttribute(
        "onclick",
        "confirmEdit(this.parentElement.parentElement, " +
          respon.id +
          ", event)"
      );
      KelolaPengguna.querySelector(".formulir > h1").innerText =
        "Edit Pengguna";
      confirmBtn.innerText = "Ubah";

      aksesPengguna();
      focusAnimation();
    }
  };

  reqUser.send(
    "GetUserData=true&UserType=" +
      encodeURIComponent(usertype) +
      "&UserAcc=" +
      encodeURIComponent(useracc)
  );

  KelolaPengguna.classList.add("show", "hidePass");
  setTimeout(() => {
    KelolaPengguna.classList.add("animate");
  }, 10);
}

function confirmEdit(editModal, Id, event) {
  event.preventDefault();

  let adaYangKosong = false;
  let adaError = false;

  let kolomIsian = editModal.querySelectorAll(
    "input[required]:not([disabled]), select[required]"
  );
  let textField = editModal.querySelectorAll(".form-field");

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

  if (!adaYangKosong && !adaError) {
    // get data
    let RoleUser = editModal.querySelector("#tipe-pengguna").value;
    let UserId = editModal.querySelector("#userid").value;
    let UserEmail = editModal.querySelector("#useremail").value;
    let NamaUser = editModal.querySelector("#username").value;

    // Password
    let passwd;
    if (
      editModal.querySelector(".kolom-sandi #first-pass").value &&
      editModal.querySelector(".kolom-sandi #final-pass").value
    ) {
      passwd =
        "&password=" +
        encodeURIComponent(
          editModal.querySelector(".kolom-sandi #final-pass").value
        );
    }

    // XHttpRequest
    let reqEdit = new XMLHttpRequest();
    reqEdit.open("POST", "/functions/users-manager.php", true);
    reqEdit.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );

    reqEdit.onload = function () {
      if (reqEdit.status === 200) {
        let respon = JSON.parse(reqEdit.responseText);
        showUpdate(respon.pesan, respon.atxt, respon.alnk);
        if (respon.status === "success") {
          editModal.querySelector(".tombol-aksi .batal").click();
        }
      }
    };

    if (RoleUser === "Admin") {
      let msgSend =
        "EditUser=true&Id=" +
        encodeURIComponent(Id) +
        "&EmailUser=" +
        encodeURIComponent(UserEmail) +
        "&UserRole=" +
        encodeURIComponent(RoleUser) +
        "&NamaUser=" +
        encodeURIComponent(NamaUser);

      if (passwd) {
        msgSend += passwd;
      }

      reqEdit.send(msgSend);
    } else {
      let msgSend =
        "EditUser=true&Id=" +
        encodeURIComponent(Id) +
        "&IdUser=" +
        encodeURIComponent(UserId) +
        "&UserRole=" +
        encodeURIComponent(RoleUser) +
        "&NamaUser=" +
        encodeURIComponent(NamaUser);

      if (passwd) {
        msgSend += passwd;
      }

      reqEdit.send(msgSend);
    }
  }
}

window.addEventListener("click", (e) => {
  let userManager = document.querySelector(".user-manager-dialog");

  if (userManager && e.target == userManager) {
    userManager.querySelector(".tombol-aksi .batal").click();
  }
});
