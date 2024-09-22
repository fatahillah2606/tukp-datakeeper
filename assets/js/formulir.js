// focus animation
function focusAnimation() {
  let inputField = document.querySelectorAll(
    ".formulir .form-field input:not([type='date']), .formulir .form-field select"
  );
  let allInputField = document.querySelectorAll(
    ".formulir .form-field input:not(#no-tlp), .formulir .form-field select"
  );

  inputField.forEach((e) => {
    // Jika field tidak kosong
    if (e.value.trim() !== "") {
      e.parentElement.classList.add("fokus");
    }
    e.addEventListener("focus", () => {
      e.parentElement.classList.add("fokus");
    });
    e.addEventListener("blur", () => {
      if (e.value.trim() === "") {
        e.parentElement.classList.remove("fokus");
      }
    });
  });
  allInputField.forEach((e) => {
    e.addEventListener("keyup", () => {
      if (e.parentElement.classList.contains("error") && e.value.trim()) {
        hapusError(e.parentElement);
      }
    });
    // untuk pilihan select
    e.addEventListener("change", () => {
      if (e.parentElement.classList.contains("error")) {
        hapusError(e.parentElement);
      }
    });
  });
}
focusAnimation();

// Generate single Element
let singleField = 1;
function tambahSingleField(judulField, nama, tipe, idBungkus, labelIcon) {
  let singleFieldCont = document.getElementById(idBungkus);
  // Buat judul field menggunakan h2
  // const judul = document.createElement("h2");
  // judul.innerText = judulField;
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

  // Field error
  const logoError = document.createElement("span");
  logoError.classList.add("material-symbols-rounded", "field-error");
  logoError.innerText = "error";

  const textSupport = document.createElement("span");
  textSupport.classList.add("supporting-text");

  singleField++;

  // Field Icon
  const fieldIcon = document.createElement("span");
  fieldIcon.classList.add("material-symbols-rounded", "field-icon");
  fieldIcon.innerText = labelIcon;
  // tombol hapus
  const hapusField = document.createElement("span");
  hapusField.classList.add("material-symbols-rounded", "delete-field");
  hapusField.setAttribute("onclick", "hapusField(this); return false;");
  hapusField.innerText = "delete";

  // Masukan kedalam single field container
  formField.appendChild(labelField);
  formField.appendChild(inputField);

  // Masukan error field
  formField.appendChild(logoError);
  formField.appendChild(textSupport);

  // masukan tombol hapus dan icon field
  formField.appendChild(hapusField);
  formField.appendChild(fieldIcon);

  // Masukan judul
  // singleFieldCont.appendChild(judul);

  singleFieldCont.appendChild(formField);
  focusAnimation();
}

// Generate multiple element
let multiField = 1;
function tambahMultiField(
  judulField,
  fieldSatu,
  fieldDua,
  tipeFieldSatu,
  tipeFieldDua,
  idBungkus,
  labelIcon
) {
  doubleFieldCont = document.getElementById(idBungkus);

  // Buat judul field menggunakan h2
  const judul = document.createElement("h2");
  judul.innerText = judulField;

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

  // Field error
  const logoErrorSatu = document.createElement("span");
  logoErrorSatu.classList.add("material-symbols-rounded", "field-error");
  logoErrorSatu.innerText = "error";

  const textSupportSatu = document.createElement("span");
  textSupportSatu.classList.add("supporting-text");

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

  // Field error
  const logoErrorDua = document.createElement("span");
  logoErrorDua.classList.add("material-symbols-rounded", "field-error");
  logoErrorDua.innerText = "error";

  const textSupportDua = document.createElement("span");
  textSupportDua.classList.add("supporting-text");

  multiField++;

  // Field icon
  const fieldIcon = document.createElement("span");
  fieldIcon.classList.add("material-symbols-rounded", "field-icon");
  fieldIcon.innerText = labelIcon;

  // tombol hapus
  const hapusField = document.createElement("span");
  hapusField.classList.add("material-symbols-rounded", "delete-field");
  hapusField.setAttribute("onclick", "hapusField(this); return false;");
  hapusField.innerText = "delete";

  // masukan field 1 ke konten double field
  formFieldSatu.appendChild(labelFieldSatu);
  formFieldSatu.appendChild(inputFieldSatu);
  formFieldSatu.appendChild(logoErrorSatu);
  formFieldSatu.appendChild(textSupportSatu);
  multiFieldCont.appendChild(formFieldSatu);

  // masukan field 2 ke konten double field
  formFieldDua.appendChild(labelFieldDua);
  formFieldDua.appendChild(inputFieldDua);
  formFieldDua.appendChild(logoErrorDua);
  formFieldDua.appendChild(textSupportDua);
  multiFieldCont.appendChild(formFieldDua);

  // masukan tombol hapus dan icon field
  multiFieldCont.appendChild(hapusField);
  multiFieldCont.appendChild(fieldIcon);

  // Masukan judul
  doubleFieldCont.appendChild(judul);

  doubleFieldCont.appendChild(multiFieldCont);
  focusAnimation();
}

// remove element
function hapusField(elemen) {
  let x = elemen.parentElement;
  if (x.getAttribute("class") == "multi-field") {
    x.previousSibling.remove();
    multiField--;
  } else {
    singleField--;
  }
  elemen.parentElement.remove();
  focusAnimation();
}

// Untuk opsi pilih kendaraan
let pilihMerek = document.getElementById("merek-kendaraan");
if (pilihMerek !== null) {
  merekKendaraan();
  pilihMerek.addEventListener("change", merekKendaraan);
}
function merekKendaraan() {
  let merekLain = document.getElementById("merek-lain");
  if (pilihMerek.value === "Lainnya") {
    merekLain.removeAttribute("disabled");
    merekLain.parentElement.classList.remove("none");
  } else {
    merekLain.setAttribute("disabled", "");
    merekLain.parentElement.classList.add("none");
  }
}

// Reset button
let tombolReset = document.getElementById("reset");
if (tombolReset) {
  tombolReset.addEventListener("click", () => {
    let inputField = document.querySelectorAll(
      ".formulir .form-field input:not([type='date']), .formulir .form-field select"
    );
    inputField.forEach((element) => {
      element.parentElement.classList.remove("fokus");
    });
  });
}
