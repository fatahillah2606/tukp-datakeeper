// Define
let barCariField = document.querySelector("#cari");
let barCari = document.querySelector(".bar-cari");
let modalContainer = document.querySelector(".modal-container");
let tombolEdit = document.querySelectorAll("button.edit");

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
  e.addEventListener("click", openEdit);
});
function openEdit() {
  modalContainer.classList.add("show");
}
function closeEdit() {
  modalContainer.classList.remove("show");
}
window.addEventListener("click", (e) => {
  if (e.target == modalContainer) {
    closeEdit();
  }
});

// Konversi tanggal
function konversiKeTanggalId(tanggalAwal) {
  const tanggal = new Date(tanggalAwal);
  const options = {
    weekday: "long",
    month: "long",
    year: "numeric",
    day: "numeric",
  };
  const formatter = new Intl.DateTimeFormat("id", options);
  return formatter.format(tanggal);
}
let tanggal = document.querySelectorAll(".tanggal");
if (tanggal !== null) {
  tanggal.forEach((element) => {
    element.innerHTML = konversiKeTanggalId(element.innerHTML);
  });
}
