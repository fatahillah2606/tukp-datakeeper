// declare
let kataSambutan = document.querySelector(".kata-sambutan");
let sambutan = document.getElementById("sambutan");
let pilihan = document.querySelectorAll(".pilihan");
let pesan = {
  catat: "Mau catat apa?",
  lihat: "Mau lihat apa?",
};
let kembali = document.querySelectorAll(".kembali");

// Buka menu bagian dashboard
function bukaMenu(menu) {
  pilihan.forEach((element) => {
    element.classList.remove("show");
  });
  let jenisPilihan = document.querySelector(".pilihan." + menu);
  jenisPilihan.classList.add("show");
  kataSambutan.classList.add("change");
  sambutan.innerText = pesan[menu];
}

// Tutup menu bagian dashboard
kembali.forEach((element) => {
  element.addEventListener("click", () => {
    pilihan.forEach((e) => {
      e.classList.remove("show");
      if (e.classList.contains("awal")) {
        e.classList.add("show");
        kataSambutan.classList.remove("change");
      }
    });
  });
});
