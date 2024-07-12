// Define
let barCariField = document.querySelector("#cari");
let barCari = document.querySelector(".bar-cari");
let modalContainer = document.querySelector(".modal-container");
let tombolEdit = document.querySelectorAll(".edit");
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
function editModal() {
  modalContainer.classList.toggle("show");
}
tombolEdit.forEach((e) => {
  e.addEventListener("click", editModal);
});

// popup alert
function peringatan() {
  popup.classList.toggle("show");
}
hapusData.forEach((e) => {
  e.addEventListener("click", peringatan);
});

window.addEventListener("click", (e) => {
  if (e.target == modalContainer) {
    editModal();
  }
  if (e.target == popup) {
    peringatan();
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
