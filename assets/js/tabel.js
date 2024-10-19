// Search bar
let barCariField = document.querySelector("#cari");
let barCari = document.querySelector(".bar-cari");

if (barCariField) {
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
}
