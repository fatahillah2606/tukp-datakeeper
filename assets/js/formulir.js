// Define

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
// Generate single Element
let singleField = 1;
function tambahSingleField(nama, tipe, idBungkus) {
  let singleFieldCont = document.getElementById(idBungkus);
  // pisahkan isi parameter
  let x = nama.toLowerCase().split(" ");
  let namaField = x[0] + "-" + x[1];
  let labelFieldTxt = x[0] + " " + x[1];
  // form field
  const formField = document.createElement("div");
  formField.classList.add("form-field");
  // label
  const labelField = document.createElement("label");
  labelField.setAttribute("for", namaField + "-" + singleField);
  labelField.innerText = labelFieldTxt;
  // input
  const inputField = document.createElement("input");
  inputField.setAttribute("type", tipe);
  inputField.setAttribute("id", namaField + "-" + singleField);
  inputField.setAttribute("name", namaField + "-" + singleField);

  singleField++;
  // tombol hapus
  const hapusField = document.createElement("span");
  hapusField.classList.add("material-symbols-rounded", "delete-field");
  hapusField.setAttribute("onclick", "hapusField(this); return false;");
  hapusField.innerText = "delete";
  // Masukan kedalam visitor name container
  formField.appendChild(labelField);
  formField.appendChild(inputField);
  // masukan tombol hapus
  formField.appendChild(hapusField);
  singleFieldCont.appendChild(formField);
  focusAnimation();
}

// Generate multiple element
let multiField = 1;
function tambahMultiField(
  fieldSatu,
  fieldDua,
  tipeFieldSatu,
  tipeFieldDua,
  idBungkus
) {
  doubleFieldCont = document.getElementById(idBungkus);
  // Pisahkan isi parameter untuk Field 1
  let x = fieldSatu.toLowerCase().split(" ");
  let namaFieldSatu = x[0] + "-" + x[1];
  let labelFieldSatuTxt = x[0] + " " + x[1];
  // Pisahkan isi parameter untuk Field 2
  let y = fieldDua.toLowerCase().split(" ");
  let namaFieldDua = y[0] + "-" + y[1];
  let labelFieldDuaTxt = y[0] + " " + y[1];
  // multi field container
  const multiFieldCont = document.createElement("div");
  multiFieldCont.classList.add("multi-field");

  // form field 1
  const formFieldSatu = document.createElement("div");
  formFieldSatu.classList.add("form-field");
  // label
  const labelFieldSatu = document.createElement("label");
  labelFieldSatu.setAttribute("for", namaFieldSatu + "-" + multiField);
  labelFieldSatu.innerText = labelFieldSatuTxt;
  // Input
  const inputFieldSatu = document.createElement("input");
  inputFieldSatu.setAttribute("type", tipeFieldSatu);
  inputFieldSatu.setAttribute("id", namaFieldSatu + "-" + multiField);
  inputFieldSatu.setAttribute("name", namaFieldSatu + "-" + multiField);

  // form field 2
  const formFieldDua = document.createElement("div");
  formFieldDua.classList.add("form-field");
  // label
  const labelFieldDua = document.createElement("label");
  labelFieldDua.setAttribute("for", namaFieldDua + "-" + multiField);
  labelFieldDua.innerText = labelFieldDuaTxt;
  // Input
  const inputFieldDua = document.createElement("input");
  inputFieldDua.setAttribute("type", tipeFieldDua);
  inputFieldDua.setAttribute("id", namaFieldDua + "-" + multiField);
  inputFieldDua.setAttribute("name", namaFieldDua + "-" + multiField);

  multiField++;
  // tombol hapus
  const hapusField = document.createElement("span");
  hapusField.classList.add("material-symbols-rounded", "delete-field");
  hapusField.setAttribute("onclick", "hapusField(this); return false;");
  hapusField.innerText = "delete";
  // masukan field 1 ke konten double field
  formFieldSatu.appendChild(labelFieldSatu);
  formFieldSatu.appendChild(inputFieldSatu);
  multiFieldCont.appendChild(formFieldSatu);
  // masukan field 2 ke konten double field
  formFieldDua.appendChild(labelFieldDua);
  formFieldDua.appendChild(inputFieldDua);
  multiFieldCont.appendChild(formFieldDua);

  // masukan tombol hapus
  multiFieldCont.appendChild(hapusField);
  doubleFieldCont.appendChild(multiFieldCont);
  focusAnimation();
}

// remove element
function hapusField(elemen) {
  elemen.parentElement.remove();
  focusAnimation();
}
