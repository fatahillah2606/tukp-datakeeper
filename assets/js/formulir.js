// Define
let visitorNameCont = document.querySelector("#visitor-name-cont");

// focus animation
function focusAnimation() {
  let inputField = document.querySelectorAll(
    ".formulir .form-field input:not([type='date'])"
  );
  inputField.forEach((e) => {
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
// Generate Element
let pengunjung = 1;
function tambahPengunjung() {
  // form field
  const formField = document.createElement("div");
  formField.classList.add("form-field");
  // label pengunjung
  const labelNama = document.createElement("label");
  labelNama.setAttribute("for", "nama-pengunjung-" + pengunjung);
  labelNama.innerText = "Nama Pengunjung";
  // inpun nama
  const inputNama = document.createElement("input");
  inputNama.setAttribute("type", "text");
  inputNama.setAttribute("id", "nama-pengunjung-" + pengunjung);
  inputNama.setAttribute("name", "nama-pengunjung-" + pengunjung);
  pengunjung++;
  // tombol hapus
  const hapusNama = document.createElement("span");
  hapusNama.classList.add("material-symbols-rounded", "delete-field");
  hapusNama.setAttribute("onclick", "hapusPengunjung(this); return false;");
  hapusNama.innerText = "delete";
  // Masukan kedalam visitor name container
  formField.appendChild(labelNama);
  formField.appendChild(inputNama);
  formField.appendChild(hapusNama);
  visitorNameCont.appendChild(formField);
  focusAnimation();
}

// remove element
function hapusPengunjung(elemen) {
  elemen.parentElement.remove();
  focusAnimation();
}
