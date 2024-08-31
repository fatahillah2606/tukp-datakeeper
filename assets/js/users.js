// whoiam?
function whoAiAm() {
  let userRole = document.querySelectorAll(".role");
  userRole.forEach((e) => {
    if (e.innerHTML === "Admin") {
      e.classList.add("admin");
    }
  });
}

// focus animation
function focusAnimation() {
  let inputField = document.querySelectorAll(
    ".formulir .form-field input:not([type='date']), .formulir .form-field select"
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

// Search bar
let barCariField = document.querySelector("#cari");
let barCari = document.querySelector(".bar-cari");

barCariField.addEventListener("focus", () => {
  barCari.classList.add("aktif");
});
function extendSearchBar() {
  if (barCariField.value !== "") {
    barCari.classList.add("aktif");
  } else {
    barCari.classList.remove("aktif");
  }
}
extendSearchBar();
barCariField.addEventListener("blur", extendSearchBar);
// search engine
function searchData() {
  const searchValue = barCariField.value.toLowerCase();
  const baris = document.querySelectorAll(".user");

  baris.forEach((row) => {
    let cocok = false;

    // Cek kata untuk class .nama
    row.querySelectorAll(".user-name .nama").forEach((nama) => {
      if (nama.textContent.toLowerCase().includes(searchValue)) {
        cocok = true;
      }
    });

    // Cek kata untuk class .id-email
    row.querySelectorAll(".user-name .id-email").forEach((idEmail) => {
      if (idEmail.textContent.toLowerCase().includes(searchValue)) {
        cocok = true;
      }
    });

    // cek kata untuk elemen list
    row.querySelectorAll(".right .role").forEach((jabatan) => {
      if (jabatan.textContent.toLowerCase().includes(searchValue)) {
        cocok = true;
      }
    });

    // cek jika ada kata yang cocok/ketemu
    if (cocok) {
      row.classList.remove("hidden");
    } else {
      row.classList.add("hidden");
    }
  });
}
searchData();
barCariField.addEventListener("keyup", searchData);

// Buat user
function newUser() {
  let userManager = document.querySelector(".user-manager-dialog");
  let confirmBtn = userManager.querySelector(
    ".formulir .tombol-aksi button[type='submit']"
  );

  confirmBtn.setAttribute(
    "onclick",
    "createNewUser(this.parentElement.parentElement, event)"
  );
  userManager.querySelector(".formulir > h1").innerText = "Tambah Pengguna";
  confirmBtn.innerText = "Buat";
  userManager.classList.add("show");
}

function createNewUser(dialog, event) {
  event.preventDefault();

  let adaYangKosong = false;
  let adaError = false;

  let kolomIsian = dialog.querySelectorAll("input:not([disabled]), select");
  let textField = dialog.querySelectorAll(".form-field");

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

  // Proses
  if (!adaYangKosong && !adaError) {
    // Ambil data
    let namaUser = dialog.querySelector("#username").value;
    let sandiUser = dialog.querySelector("#final-pass").value;
    let tipeUser = dialog.querySelector("#tipe-pengguna").value;
    let idUser = dialog.querySelector("#userid").value;
    let emailUser = dialog.querySelector("#useremail").value;

    let xhrUser = new XMLHttpRequest();
    xhrUser.open("POST", "/functions/users-manager.php", true);
    xhrUser.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );

    xhrUser.onload = function () {
      if (xhrUser.status === 200) {
        console.log(xhrUser.responseText);
        let respon = JSON.parse(xhrUser.responseText);
        showUpdate(respon.pesan, respon.atxt, respon.alnk);
        if (respon.status === "berhasil") {
          muatData();
          closeUserManager(dialog);
        } else {
          console.log("Kesalahan: " + respon.pesan);
        }
      } else {
        console.log("Kesalahan: " + xhrUser.status);
      }
    };
    xhrUser.send(
      "TambahUser=true&NamaUser=" +
        encodeURIComponent(namaUser) +
        "&SandiUser=" +
        encodeURIComponent(sandiUser) +
        "&TipeUser=" +
        encodeURIComponent(tipeUser) +
        "&IdUser=" +
        encodeURIComponent(idUser) +
        "&EmailUser=" +
        encodeURIComponent(emailUser)
    );
  }
}

// popup alert
let popup = document.querySelector(".popup");
let alertDesk = popup.querySelector(".popup-content p");
let alertConfirmBtn = popup.querySelector(".popup-content .controls a");

// Hapus user
function hapusUser(userId, userName) {
  alertDesk.innerHTML = "Anda yakin ingin menghapus pengguna " + userName;
  popup.classList.add("show");
  alertConfirmBtn.setAttribute("onclick", "deleteUser(" + userId + ")");
}

function deleteUser(userKey) {
  let xhrHapusUser = new XMLHttpRequest();
  xhrHapusUser.open("POST", "/functions/users-manager.php", true);
  xhrHapusUser.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );

  xhrHapusUser.onload = function () {
    if (xhrHapusUser.status === 200) {
      console.log(xhrHapusUser.responseText);
      respon = JSON.parse(xhrHapusUser.responseText);
      showUpdate(respon.pesan, respon.atxt, respon.alnk);
      if (respon.status === "berhasil") {
        muatData();
        closeModal(popup);
      }
    } else {
      console.log("Kesalahan" + xhrHapusUser.status);
    }
  };

  xhrHapusUser.send("hapusUser=true&idUser=" + userKey);
}

// Reset sandi user
let resetPasswdModal = document.querySelector(
  ".modal-container.reset-passwd-modal-container"
);
function resetPasswd(userId, userName) {
  let namaUser = resetPasswdModal.querySelectorAll(".nama-pengguna");
  namaUser.forEach((element) => {
    element.innerHTML = userName;
  });
  resetPasswdModal.classList.add("show");
}

// tutup modal
function closeModal(elementName) {
  elementName.classList.remove("show");
}
window.addEventListener("click", (e) => {
  if (e.target == resetPasswdModal) {
    closeModal(resetPasswdModal);
  }
  if (e.target == popup) {
    closeModal(popup);
  }
});
