// Define
let barCariField = document.querySelector("#cari");
let barCari = document.querySelector(".bar-cari");
let modalContainer = document.querySelector(".modal-container");
let tombolEdit = document.querySelectorAll("button.edit");
let hapusData = document.querySelectorAll(".hapus");
let popup = document.querySelector(".popup");
// Search bar
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

// modal box
tombolEdit.forEach((e) => {
  // e.onclick = openEdit();
  e.addEventListener("click", openEdit);
});
function openEdit() {
  modalContainer.classList.add("show");
}
function closeEdit() {
  modalContainer.classList.remove("show");
}

// popup alert
function peringatan() {
  popup.classList.toggle("show");
}
hapusData.forEach((e) => {
  e.addEventListener("click", peringatan);
});
