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
// search engine
barCariField.addEventListener("keyup", () => {
  const searchValue = barCariField.value.toLowerCase();
  const baris = document.querySelectorAll(".table-container table tbody tr");

  baris.forEach((row) => {
    let cocok = false;

    // Cek kata untuk class .text-wrap
    row.querySelectorAll(".text-wrap").forEach((element) => {
      if (element.textContent.toLowerCase().includes(searchValue)) {
        cocok = true;
      }
    });

    // cek kata untuk elemen list
    row.querySelectorAll(".list ul li").forEach((item) => {
      if (item.textContent.toLowerCase().includes(searchValue)) {
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
    // weekday: "long",
    month: "long",
    year: "numeric",
    day: "numeric",
  };
  const formatter = new Intl.DateTimeFormat("id", options);
  return formatter.format(tanggal);
}
let tanggal = document.querySelectorAll(".tanggal .text-wrap");
if (tanggal !== null) {
  tanggal.forEach((element) => {
    element.innerHTML = konversiKeTanggalId(element.innerHTML);
  });
}
