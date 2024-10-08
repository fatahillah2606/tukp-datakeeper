// Fungsi update data
// Update pengunjung
function ubahPengunjung(formulir, event, idData) {
  event.preventDefault();

  let adaYangKosong = false;
  let adaError = false;

  let kolomIsian = formulir.querySelectorAll(
    "input[required]:not([disabled]), select[required]"
  );
  let textField = formulir.querySelectorAll(".form-field");

  // Cek jika ada kolom yg kosong
  kolomIsian.forEach((element) => {
    if (element.value.trim() === "") {
      adaYangKosong = true;
      let elemenKosong = element.parentElement;
      tampilkanError(elemenKosong, "Wajib diisi");
    }
  });

  // cek jika ketentuan belum terpenuhi
  textField.forEach((element) => {
    if (element.classList.contains("error")) {
      adaError = true;
    }
  });

  // Proses
  if (!adaYangKosong && !adaError) {
    // ambil data dari form
    let namaPengunjung;
    let namaPerusahaan = formulir.querySelector("#nama-perusahaan").value;
    let noKendaraan = formulir.querySelector("#no-kendaraan-pengunjung").value;
    let tanggal = formulir.querySelector("#tanggal-kunjung").value;
    let nomorTlp = formulir.querySelector("#no-tlp").value;

    // Jika pengunjung lebih dari satu
    let pengunjung = formulir.querySelectorAll("#field-nama .form-field input");

    namaPengunjung = `NamaPengunjung0=${encodeURIComponent(
      pengunjung[0].value
    )}&`;

    for (let i = 1; i < pengunjung.length; i++) {
      namaPengunjung += `NamaPengunjung${i}=${encodeURIComponent(
        pengunjung[i].value
      )}&`;
    }

    // Buat objek XMLHttpRequest
    let xhr = new XMLHttpRequest();

    // menentukan method dan url
    xhr.open("POST", "/functions/data-manager.php", true);

    // Set header
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // tanggapan ketika request selesai
    xhr.onload = function () {
      if (xhr.status === 200) {
        // JSON parsing response
        let respon = JSON.parse(xhr.responseText);
        showUpdate(respon.pesan, respon.atxt, respon.alnk);

        if (respon.status === "success") {
          formulir.querySelector(".batal").click();
          muatData();
        } else {
          console.log(respon.errorMsg);
        }
      } else {
        console.log(xhr.status);
      }
    };

    // Kirim data ke server
    xhr.send(
      "DataPengunjung=true&ubah=true&IdData=" +
        idData +
        "&" +
        namaPengunjung +
        "NamaPerusahaan=" +
        encodeURIComponent(namaPerusahaan) +
        "&NoKendaraan=" +
        encodeURIComponent(noKendaraan) +
        "&tanggal=" +
        encodeURIComponent(tanggal) +
        "&NomorTlp=" +
        encodeURIComponent(nomorTlp)
    );
  }
}

// Update barang eksternal
function ubahBarangExt(formulir, event, idData) {
  event.preventDefault();

  let adaYangKosong = false;
  let adaError = false;

  let kolomIsian = formulir.querySelectorAll(
    "input[required]:not([disabled]), select[required]"
  );
  let textField = formulir.querySelectorAll(".form-field");

  // Cek jika ada kolom yg kosong
  kolomIsian.forEach((element) => {
    if (element.value.trim() === "") {
      adaYangKosong = true;
      let elemenKosong = element.parentElement;
      tampilkanError(elemenKosong, "Wajib diisi");
    }
  });

  // cek jika ketentuan belum terpenuhi
  textField.forEach((element) => {
    if (element.classList.contains("error")) {
      adaError = true;
    }
  });

  // Proses
  if (!adaYangKosong && !adaError) {
    // ambil data dari form
    let tanggal = formulir.querySelector("#tanggal-ext").value;
    let namaDriver = formulir.querySelector("#nama-driver-ext").value;
    let namaSuplier = formulir.querySelector("#nama-suplier").value;
    let keperluan = formulir.querySelector("#keperluan-ext").value;
    let namaJumlahBarang;
    let jamKedatangan = formulir.querySelector("#time-pp").value;
    let noKendaraan = formulir.querySelector("#no-kendaraan").value;
    let keterangan = formulir.querySelector("#keterangan-ext").value;

    // Jika field barang dan jumlah lebih dari satu
    let namaBarang = formulir.querySelectorAll(
      "#field-barang-ext .multi-field .form-field:nth-child(1) input"
    );
    let jumlahBarang = formulir.querySelectorAll(
      "#field-barang-ext .multi-field .form-field:nth-child(2) input"
    );

    namaJumlahBarang = `NamaBarang0=${encodeURIComponent(
      namaBarang[0].value
    )}&JumlahBarang0=${encodeURIComponent(jumlahBarang[0].value)}&`;

    for (let i = 1; i < namaBarang.length; i++) {
      namaJumlahBarang += `NamaBarang${i}=${encodeURIComponent(
        namaBarang[i].value
      )}&JumlahBarang${i}=${encodeURIComponent(jumlahBarang[i].value)}&`;
    }

    // Buat objek XMLHttpRequest
    let xhr = new XMLHttpRequest();

    // menentukan method dan url
    xhr.open("POST", "/functions/data-manager.php", true);

    // Set header
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // tanggapan ketika request selesai
    xhr.onload = function () {
      if (xhr.status === 200) {
        // JSON parsing response
        let respon = JSON.parse(xhr.responseText);
        showUpdate(respon.pesan, respon.atxt, respon.alnk);

        if (respon.status === "success") {
          formulir.querySelector(".batal").click();
          muatData();
        } else {
          console.log(respon.errorMsg);
        }
      } else {
        console.log(xhr.status);
      }
    };

    // Kirim data ke server
    xhr.send(
      "DataBarangExt=true&ubah=true&IdData=" +
        idData +
        "&tanggal=" +
        encodeURIComponent(tanggal) +
        "&NamaDriver=" +
        encodeURIComponent(namaDriver) +
        "&NamaSuplier=" +
        encodeURIComponent(namaSuplier) +
        "&keperluan=" +
        encodeURIComponent(keperluan) +
        "&" +
        namaJumlahBarang +
        "JamKedatangan=" +
        encodeURIComponent(jamKedatangan) +
        "&NoKendaraan=" +
        encodeURIComponent(noKendaraan) +
        "&keterangan=" +
        encodeURIComponent(keterangan)
    );
  }
}

// Update barang internal
function ubahBarangInt(formulir, event, idData) {
  event.preventDefault();

  let adaYangKosong = false;
  let adaError = false;

  let kolomIsian = formulir.querySelectorAll(
    "input[required]:not([disabled]), select[required]"
  );
  let textField = formulir.querySelectorAll(".form-field");

  // Cek jika ada kolom yg kosong
  kolomIsian.forEach((element) => {
    if (element.value.trim() === "") {
      adaYangKosong = true;
      let elemenKosong = element.parentElement;
      tampilkanError(elemenKosong, "Wajib diisi");
    }
  });

  // cek jika ketentuan belum terpenuhi
  textField.forEach((element) => {
    if (element.classList.contains("error")) {
      adaError = true;
    }
  });

  // Proses
  if (!adaYangKosong && !adaError) {
    // ambil data dari form
    let namaPembawa = formulir.querySelector("#nama-pembawa").value;
    let namaJumlahBarang;
    let tanggal = formulir.querySelector("#tanggal-int").value;
    let keterangan = formulir.querySelector("#keterangan-int").value;

    // Jika field barang dan jumlah lebih dari satu
    let namaBarang = formulir.querySelectorAll(
      "#field-barang-int .multi-field .form-field:nth-child(1) input"
    );
    let jumlahBarang = formulir.querySelectorAll(
      "#field-barang-int .multi-field .form-field:nth-child(2) input"
    );

    namaJumlahBarang = `NamaBarang0=${encodeURIComponent(
      namaBarang[0].value
    )}&JumlahBarang0=${encodeURIComponent(jumlahBarang[0].value)}&`;

    for (let i = 1; i < namaBarang.length; i++) {
      namaJumlahBarang += `NamaBarang${i}=${encodeURIComponent(
        namaBarang[i].value
      )}&JumlahBarang${i}=${encodeURIComponent(jumlahBarang[i].value)}&`;
    }

    // Buat objek XMLHttpRequest
    let xhr = new XMLHttpRequest();

    // menentukan method dan url
    xhr.open("POST", "/functions/data-manager.php", true);

    // Set header
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // tanggapan ketika request selesai
    xhr.onload = function () {
      if (xhr.status === 200) {
        // JSON parsing response
        let respon = JSON.parse(xhr.responseText);
        showUpdate(respon.pesan, respon.atxt, respon.alnk);

        if (respon.status === "success") {
          formulir.querySelector(".batal").click();
          muatData();
        } else {
          console.log(respon.errorMsg);
        }
      } else {
        console.log(xhr.status);
      }
    };

    // Kirim data ke server
    xhr.send(
      "DataBarangInt=true&ubah=true&IdData=" +
        idData +
        "&NamaPembawa=" +
        encodeURIComponent(namaPembawa) +
        "&" +
        namaJumlahBarang +
        "tanggal=" +
        encodeURIComponent(tanggal) +
        "&keterangan=" +
        encodeURIComponent(keterangan)
    );
  }
}

// Update kilometer mobil
function ubahMobil(formulir, event, idData) {
  event.preventDefault();

  let adaYangKosong = false;
  let adaError = false;

  let kolomIsian = formulir.querySelectorAll(
    "input[required]:not([disabled]), select[required]"
  );
  let textField = formulir.querySelectorAll(".form-field");

  // Cek jika ada kolom yg kosong
  kolomIsian.forEach((element) => {
    if (element.value.trim() === "") {
      adaYangKosong = true;
      let elemenKosong = element.parentElement;
      tampilkanError(elemenKosong, "Wajib diisi");
    }
  });

  // cek jika ketentuan belum terpenuhi
  textField.forEach((element) => {
    if (element.classList.contains("error")) {
      adaError = true;
    }
  });

  // Proses
  if (!adaYangKosong && !adaError) {
    // ambil data dari form
    let namaDriver = formulir.querySelector("#nama-driver-mobil").value;
    let merekKendaraan = formulir.querySelector("#merek-kendaraan").value;
    let merekLain = formulir.querySelector("#merek-lain").value;
    let noKendaraan = formulir.querySelector("#no-kendaraan-mobil").value;
    let awalKm = formulir.querySelector("#awal-km").value;
    let akhirKm = formulir.querySelector("#akhir-km").value;
    let tujuan = formulir.querySelector("#tujuan").value;
    let keperluan = formulir.querySelector("#keperluan-mobil").value;

    // Buat objek XMLHttpRequest
    let xhr = new XMLHttpRequest();

    // menentukan method dan url
    xhr.open("POST", "/functions/data-manager.php", true);

    // Set header
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // tanggapan ketika request selesai
    xhr.onload = function () {
      if (xhr.status === 200) {
        // JSON parsing response
        let respon = JSON.parse(xhr.responseText);
        showUpdate(respon.pesan, respon.atxt, respon.alnk);

        if (respon.status === "success") {
          formulir.querySelector(".batal").click();
          muatData();
        } else {
          console.log(respon.errorMsg);
        }
      } else {
        console.log(xhr.status);
      }
    };

    // Kirim data ke server
    xhr.send(
      "DataMobil=true&ubah=true&IdData=" +
        idData +
        "&NamaDriver=" +
        encodeURIComponent(namaDriver) +
        "&MerekKendaraan=" +
        encodeURIComponent(merekKendaraan) +
        "&MerekLain=" +
        encodeURIComponent(merekLain) +
        "&NoKendaraan=" +
        encodeURIComponent(noKendaraan) +
        "&AwalKm=" +
        encodeURIComponent(awalKm) +
        "&AkhirKm=" +
        encodeURIComponent(akhirKm) +
        "&tujuan=" +
        encodeURIComponent(tujuan) +
        "&keperluan=" +
        encodeURIComponent(keperluan)
    );
  }
}

// modal box
let modals = document.querySelector(".modals");
let modalContainer = modals.querySelectorAll(".modal-container");

// Konversi tanggal
function konversiTanggal(tanggalString) {
  const [hari, bulan, tahun] = tanggalString.split(" ");
  const namaBulan = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];
  const month = namaBulan.indexOf(bulan) + 1;

  const formatBulan = month.toString().padStart(2, "0");
  const formatHari = hari.padStart(2, "0");

  return `${tahun}-${formatBulan}-${formatHari}`;
}

// Edit Pengunjung
function editPengunjung(elm, idData) {
  let editModal = modals.querySelector(".edit-pengunjung");
  let barisData = elm.parentElement.parentElement.parentElement;

  // Nama pengunjung
  let pengunjung = barisData.querySelectorAll("td.list ul li");
  let kolomPengunjung = editModal.querySelector(".formulir #field-nama");

  editModal.querySelector(
    ".formulir #field-nama .form-field #nama-pengunjung"
  ).value = pengunjung[0].innerText;

  // Jika pengunjung lebih dari 1
  if (pengunjung.length > 1) {
    for (let i = 1; i < pengunjung.length; i++) {
      const formField = document.createElement("div");
      formField.classList.add("form-field");
      formField.innerHTML = `
        <label for="nama-pengunjung-${i}">nama pengunjung</label>
        <input type="text" id="nama-pengunjung-${i}" name="nama-pengunjung-${i}" value="${pengunjung[i].innerText}">
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text"></span>
        <span class="material-symbols-rounded delete-field" onclick="hapusField(this); return false;">delete</span>
        <span class="material-symbols-rounded field-icon">person</span>
      `;
      kolomPengunjung.appendChild(formField);
    }
  }

  // Nama perusahaan
  editModal.querySelector(".formulir .form-field #nama-perusahaan").value =
    barisData.querySelector("td.nama-perusahaan p").innerText;

  // Nomor kendaraan
  editModal.querySelector(
    ".formulir .form-field #no-kendaraan-pengunjung"
  ).value = barisData.querySelector("td.no-kendaraan p").innerText;

  // Tanggal
  editModal.querySelector(".formulir .form-field #tanggal-kunjung").value =
    konversiTanggal(barisData.querySelector("td.tanggal p").innerText);

  // Nomor telepon
  editModal.querySelector(".formulir .form-field #no-tlp").value =
    barisData.querySelector("td.no-tlp p").innerText;

  // tombol
  editModal
    .querySelector(".formulir .tombol-aksi button[type='submit']")
    .setAttribute(
      "onclick",
      "ubahPengunjung(this.parentElement.parentElement, event, " + idData + ")"
    );

  focusAnimation();
  editModal.classList.add("show");
  history.pushState({ editDialog: true }, "");
}

// Edit barang ext
function editBarangExt(elm, idData) {
  let editModal = modals.querySelector(".edit-barang-ext");
  let barisData = elm.parentElement.parentElement.parentElement;

  // Tanggal
  editModal.querySelector(".formulir .form-field #tanggal-ext").value =
    konversiTanggal(barisData.querySelector("td.tanggal p").innerText);

  //Nama Driver
  editModal.querySelector(".formulir .form-field #nama-driver-ext").value =
    barisData.querySelector("td.nama-pembawa p").innerText;

  // Nama suplier
  editModal.querySelector(".formulir .form-field #nama-suplier").value =
    barisData.querySelector("td.nama-suplier p").innerText;

  // Keperluan
  editModal.querySelector(".formulir .form-field #keperluan-ext").value =
    barisData.querySelector("td.keperluan p").innerText;

  // Barang
  let barang = barisData.querySelectorAll("td.list ul li");
  let kolomBarang = editModal.querySelector(".formulir #field-barang-ext");

  editModal.querySelector(
    ".formulir #field-barang-ext .multi-field .form-field #nama-barang-ext"
  ).value = barang[0].innerText.split(", ")[0];
  editModal.querySelector(
    ".formulir #field-barang-ext .multi-field .form-field #jumlah-barang-ext"
  ).value = barang[0].innerText.split(", ")[1];

  // Jika barang lebih dari 1
  if (barang.length > 1) {
    for (let i = 1; i < barang.length; i++) {
      const judulMultiField = document.createElement("h2");
      judulMultiField.innerText = "Barang tambahan";

      const multiField = document.createElement("div");
      multiField.classList.add("multi-field");
      multiField.innerHTML = `
        <div class="form-field">
          <label for="nama-barang-${i}">nama barang</label>
          <input type="text" id="nama-barang-${i}" name="nama-barang-${i}" value="${
        barang[i].innerText.split(", ")[0]
      }">
          <span class="material-symbols-rounded field-error">error</span>
          <span class="supporting-text"></span>
        </div>
        <div class="form-field">
          <label for="jumlah-barang-${i}">jumlah barang</label>
          <input type="text" id="jumlah-barang-${i}" name="jumlah-barang-${i}" value="${
        barang[i].innerText.split(", ")[1]
      }">
          <span class="material-symbols-rounded field-error">error</span>
          <span class="supporting-text"></span>
        </div>
        <span class="material-symbols-rounded delete-field" onclick="hapusField(this); return false;">delete</span>
        <span class="material-symbols-rounded field-icon">category</span>
      `;
      kolomBarang.appendChild(judulMultiField);
      kolomBarang.appendChild(multiField);
    }
  }

  // Nomor kendaraan
  editModal.querySelector(".formulir .form-field #no-kendaraan").value =
    barisData.querySelector("td.no-kendaraan p").innerText;

  // Jam kedatangan
  editModal.querySelector(".formulir .form-field #time-pp").value =
    barisData.querySelector("td.time-pp p").innerText;

  // keterangan
  editModal.querySelector(".formulir .form-field #keterangan-ext").value =
    barisData.querySelector("td.keterangan p").innerText;

  // tombol
  editModal
    .querySelector(".formulir .tombol-aksi button[type='submit']")
    .setAttribute(
      "onclick",
      "ubahBarangExt(this.parentElement.parentElement, event, " + idData + ")"
    );

  focusAnimation();
  editModal.classList.add("show");
  history.pushState({ editDialog: true }, "");
}

// edit barang int
function editBarangInt(elm, idData) {
  let editModal = modals.querySelector(".edit-barang-int");
  let barisData = elm.parentElement.parentElement.parentElement;

  //Nama pembawa
  editModal.querySelector(".formulir .form-field #nama-pembawa").value =
    barisData.querySelector("td.nama-pembawa p").innerText;

  // Barang
  let barang = barisData.querySelectorAll("td.list ul li");
  let kolomBarang = editModal.querySelector(".formulir #field-barang-int");

  editModal.querySelector(
    ".formulir #field-barang-int .multi-field .form-field #nama-barang-int"
  ).value = barang[0].innerText.split(", ")[0];
  editModal.querySelector(
    ".formulir #field-barang-int .multi-field .form-field #jumlah-barang-int"
  ).value = barang[0].innerText.split(", ")[1];

  // Jika barang lebih dari 1
  if (barang.length > 1) {
    for (let i = 1; i < barang.length; i++) {
      const judulMultiField = document.createElement("h2");
      judulMultiField.innerText = "Barang tambahan";

      const multiField = document.createElement("div");
      multiField.classList.add("multi-field");
      multiField.innerHTML = `
        <div class="form-field">
          <label for="nama-barang-${i}">nama barang</label>
          <input type="text" id="nama-barang-${i}" name="nama-barang-${i}" value="${
        barang[i].innerText.split(", ")[0]
      }">
          <span class="material-symbols-rounded field-error">error</span>
          <span class="supporting-text"></span>
        </div>
        <div class="form-field">
          <label for="jumlah-barang-${i}">jumlah barang</label>
          <input type="text" id="jumlah-barang-${i}" name="jumlah-barang-${i}" value="${
        barang[i].innerText.split(", ")[1]
      }">
          <span class="material-symbols-rounded field-error">error</span>
          <span class="supporting-text"></span>
        </div>
        <span class="material-symbols-rounded delete-field" onclick="hapusField(this); return false;">delete</span>
        <span class="material-symbols-rounded field-icon">category</span>
      `;
      kolomBarang.appendChild(judulMultiField);
      kolomBarang.appendChild(multiField);
    }
  }

  //Tanggal
  editModal.querySelector(".formulir .form-field #tanggal-int").value =
    konversiTanggal(barisData.querySelector("td.tanggal p").innerText);

  //Keterangan
  editModal.querySelector(".formulir .form-field #keterangan-int").value =
    barisData.querySelector("td.keterangan p").innerText;

  // tombol
  editModal
    .querySelector(".formulir .tombol-aksi button[type='submit']")
    .setAttribute(
      "onclick",
      "ubahBarangInt(this.parentElement.parentElement, event, " + idData + ")"
    );

  focusAnimation();
  editModal.classList.add("show");
  history.pushState({ editDialog: true }, "");
}

// edit km mobil
function editMobil(elm, idData) {
  merekKendaraan();
  let editModal = modals.querySelector(".edit-mobil");
  let barisData = elm.parentElement.parentElement.parentElement;

  //Nama driver
  editModal.querySelector(".formulir .form-field #nama-driver-mobil").value =
    barisData.querySelector("td.nama-driver p").innerText;

  //Merek kendaraan
  let merekField = editModal.querySelector(
    ".formulir .form-field #merek-kendaraan"
  );
  let merekData = barisData.querySelector("td.merek-kendaraan p").innerText;
  let cekData = merekField.querySelector("option[value='" + merekData + "']");
  if (cekData) {
    merekField.value = merekData;
  } else {
    merekField.value = "Lainnya";
    merekKendaraan();
    editModal.querySelector(".formulir .form-field #merek-lain").value =
      merekData;
  }

  // Nomor kendaraan
  editModal.querySelector(".formulir .form-field #no-kendaraan-mobil").value =
    barisData.querySelector("td.no-kendaraan p").innerText;

  //Awal KM
  editModal.querySelector(".formulir .form-field #awal-km").value =
    barisData.querySelector("td.awal-km p").innerText;

  //Akhir KM
  editModal.querySelector(".formulir .form-field #akhir-km").value =
    barisData.querySelector("td.akhir-km p").innerText;

  //Tujuan
  editModal.querySelector(".formulir .form-field #tujuan").value =
    barisData.querySelector("td.tujuan p").innerText;

  //Keperluan
  editModal.querySelector(".formulir .form-field #keperluan-mobil").value =
    barisData.querySelector("td.keperluan p").innerText;

  // tombol
  editModal
    .querySelector(".formulir .tombol-aksi button[type='submit']")
    .setAttribute(
      "onclick",
      "ubahMobil(this.parentElement.parentElement, event, " + idData + ")"
    );

  focusAnimation();
  editModal.classList.add("show");
  history.pushState({ editDialog: true }, "");
}

// Tutup modal
function batalEdit(namaModal) {
  let inputField = document.querySelectorAll(
    ".formulir .form-field input:not([type='date']), .formulir .form-field select"
  );
  let deleteField = namaModal.querySelectorAll(".delete-field");
  deleteField.forEach((element) => {
    element.click();
  });
  inputField.forEach((element) => {
    element.parentElement.classList.remove("fokus");
  });
  namaModal.classList.remove("show");
  history.back();
}

// dialogs alert
let dialogs = document.querySelector(".popup");

function tutupDialog() {
  if (dialogs.classList.contains("show")) {
    dialogs.classList.remove("show");
    history.back();
  }
}

// Fungsi hapus
// Dialog hapus
function hapusData(idData, tabelData) {
  dialogs.classList.add("show");
  history.pushState({ dialogHapus: true }, "");
  let confirmDelete = dialogs.querySelector(".submit-btn");
  confirmDelete.setAttribute(
    "onclick",
    "prosesHapusData(" + idData + ", '" + tabelData + "')"
  );
}

// Proses hapus data
function prosesHapusData(idData, tabelData) {
  let xhrHapus = new XMLHttpRequest();
  xhrHapus.open("POST", "/functions/data-manager.php", true);
  xhrHapus.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );
  xhrHapus.onload = function () {
    if (xhrHapus.status === 200) {
      let respon = JSON.parse(xhrHapus.responseText);
      if (respon.status === "berhasil") {
        tutupDialog();
        showUpdate(respon.pesan, respon.atxt, respon.alnk);
      } else {
        showUpdate(respon.pesan, respon.atxt, respon.alnk);
        console.log(respon.pesanError);
      }
      muatData();
    } else {
      showUpdate(
        "Gagal terhubung, silahkan cek console",
        respon.atxt,
        respon.alnk
      );
      console.log(xhrHapus.status);
    }
  };
  xhrHapus.send(
    "hapusData=true&namaTabel=" +
      encodeURIComponent(tabelData) +
      "&idData=" +
      encodeURIComponent(idData)
  );
}

window.addEventListener("click", (e) => {
  modalContainer.forEach((element) => {
    if (e.target == element) {
      element.querySelector(".batal").click();
    }
  });
  if (e.target == dialogs) {
    tutupDialog();
  }
});

window.addEventListener("popstate", (e) => {
  if (dialogs.classList.contains("show")) {
    dialogs.classList.remove("show");
  }

  modals.querySelectorAll(".modal-container").forEach((element) => {
    if (element.classList.contains("show")) {
      let inputField = document.querySelectorAll(
        ".formulir .form-field input:not([type='date']), .formulir .form-field select"
      );
      let deleteField = element.querySelectorAll(".delete-field");
      deleteField.forEach((elementDelete) => {
        elementDelete.click();
      });
      inputField.forEach((elementInput) => {
        elementInput.parentElement.classList.remove("fokus");
      });
      element.classList.remove("show");
    }
  });
});

// etc
let nomorKendaraan = document.querySelector(
  ".edit-barang-ext .formulir .form-field #no-kendaraan"
);
let nomorTelepon = document.querySelector(
  ".edit-pengunjung .formulir .form-field #no-tlp"
);

if (nomorKendaraan) {
  nomorKendaraan.addEventListener("keyup", () => {
    if (nomorKendaraan.value.length > 12) {
      tampilkanError(
        nomorKendaraan.parentElement,
        "Tidak melebihi 12 karakter"
      );
    } else {
      hapusError(nomorKendaraan.parentElement);
    }
  });
}

if (nomorTelepon) {
  nomorTelepon.addEventListener("keyup", () => {
    if (nomorTelepon.value.length > 13) {
      tampilkanError(nomorTelepon.parentElement, "Tidak melebihi 13 karakter");
    } else {
      hapusError(nomorTelepon.parentElement);
    }
  });
}
