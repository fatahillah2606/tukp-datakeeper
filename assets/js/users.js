// whoiam?
let userRole = document.querySelectorAll(".role");
userRole.forEach((e) => {
  if (e.innerHTML === "Admin") {
    e.classList.add("admin");
  }
});

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
barCariField.addEventListener("blur", () => {
  if (barCariField.value !== "") {
    barCari.classList.add("aktif");
  } else {
    barCari.classList.remove("aktif");
  }
});
// search engine
barCariField.addEventListener("keyup", () => {
  const searchValue = barCariField.value.toLowerCase();
  const baris = document.querySelectorAll(".user");
  console.log(baris);

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
});

// modal box
let tombolEdit = document.querySelectorAll(".edit");
let hapusData = document.querySelectorAll(".hapus");
let editModalContainer = document.querySelector(".modal-container.edit-user");

function editModal() {
  editModalContainer.classList.add("show");
}
tombolEdit.forEach((e) => {
  e.addEventListener("click", editModal);
});

// popup alert
let popup = document.querySelector(".popup");
let alertDesk = popup.querySelector(".popup-content p");
let alertConfirmBtn = popup.querySelector(".popup-content .controls a");

// Hapus user
function hapusUser(userId, userName) {
  alertDesk.innerHTML = "Anda yakin ingin menghapus pengguna " + userName;
  popup.classList.add("show");
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
  if (e.target == editModalContainer) {
    closeModal(editModalContainer);
  }
  if (e.target == popup) {
    closeModal(popup);
  }
  if (e.target == resetPasswdModal) {
    closeModal(resetPasswdModal);
  }
});
