// Buat pengumuman
function buatPengumuman() {
  let announcContainer = document.querySelector(".pengumuman");
  if (!announcContainer.querySelector(".buat-pengumuman")) {
    let formPengumuman = document.createElement("div");
    formPengumuman.classList.add("list-pengumuman", "buat-pengumuman");
    let isiForm = `
    <form action="">
      <input type="text" name="judul-pengumuman" id="judul-pengumuman" placeholder="Judul" />
      <textarea name="isi-pengumuman" id="isi-pengumuman" placeholder="Isi"></textarea>
      <div class="tombol-aksi">
        <button type="reset" onclick="batal(this)">Batal</button>
        <button type="submit" name="simpan-pengumuman" onclick="simpanPengumuman(this, event)">Simpan</button>
      </div>
    </form>
    `;
    formPengumuman.innerHTML = isiForm;
    announcContainer.insertBefore(formPengumuman, announcContainer.children[0]);
  }
}

// Batal buat
function batal(elemen) {
  let announcContainer = elemen.parentElement.parentElement.parentElement;
  announcContainer.remove();
}

// Edit pengumuman
function editPengumuman(elemen, id) {
  let announcContainer = elemen.parentElement.parentElement.parentElement;
  let pesan = elemen.parentElement.parentElement;
  let judulPengumuman = pesan.querySelector("h2").innerText;
  let isiPengumuman = pesan.querySelector("p").innerText;

  let formPengumuman = document.createElement("form");
  formPengumuman.classList.add("edit-pengumuman");

  // field judul
  let judul = document.createElement("input");
  Object.assign(judul, {
    type: "text",
    name: "edit-judul-pengumuman",
    id: "edit-judul-pengumuman",
    placeholder: "Judul",
    value: judulPengumuman,
  });

  // field isi
  let isi = document.createElement("textarea");
  Object.assign(isi, {
    name: "edit-judul-pengumuman",
    id: "edit-judul-pengumuman",
    placeholder: "Isi",
    value: isiPengumuman,
  });

  // Action button
  let tombolAksi = document.createElement("div");
  tombolAksi.classList.add("tombol-aksi");
  let isiTombol = `
    <button type="reset" onclick="batalEdit(this)">Batal</button>
    <button type="submit" name="simpan-perubahan" onclick="simpanPerubahan(this, event, ${id})">Simpan</button>
  `;
  tombolAksi.innerHTML = isiTombol;

  // Append
  formPengumuman.appendChild(judul);
  formPengumuman.appendChild(isi);
  formPengumuman.appendChild(tombolAksi);

  announcContainer.appendChild(formPengumuman);

  announcContainer.classList.add("mode-edit");
}

function batalEdit(elemen) {
  let announcContainer = elemen.parentElement.parentElement.parentElement;
  announcContainer.classList.remove("mode-edit");
  announcContainer.querySelector("form").remove();
}

// tampilkan pengumuman
function tampilkanPengumuman() {
  let pengumuman = new XMLHttpRequest();
  pengumuman.open(
    "GET",
    "/functions/data-manager.php?lihatPengumuman=true&list=true",
    true
  );

  pengumuman.onload = function () {
    if (pengumuman.status === 200) {
      let kontenPengumuman = document.querySelector(".pengumuman");
      kontenPengumuman.innerHTML = pengumuman.responseText;
    }
  };

  pengumuman.send();
}

window.onload = tampilkanPengumuman();

// simpan pengumuman
function simpanPengumuman(elemen, event) {
  event.preventDefault();
  let announcContainer = elemen.parentElement.parentElement;

  let judulPengumuman = announcContainer.querySelector("input").value;
  let isiPengumuman = announcContainer.querySelector("textarea").value;

  let simpan = new XMLHttpRequest();
  simpan.open("POST", "/functions/data-manager.php", true);
  simpan.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  simpan.onload = function () {
    if (simpan.status === 200) {
      console.log(simpan.responseText);
      let respon = JSON.parse(simpan.responseText);
      showUpdate(respon.pesan, respon.atxt, respon.alnk);

      if (respon.status === "berhasil") {
        tampilkanPengumuman();
      }
    }
  };

  simpan.send(
    "SimpanPengumuman=true&Judul=" +
      encodeURIComponent(judulPengumuman) +
      "&Isi=" +
      encodeURIComponent(isiPengumuman)
  );
}

// Hapus pengumuman
function hapusPengumuman(id) {
  let hapus = new XMLHttpRequest();
  hapus.open("POST", "/functions/data-manager.php", true);
  hapus.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  hapus.onload = function () {
    if (hapus.status === 200) {
      console.log(hapus.responseText);
      let respon = JSON.parse(hapus.responseText);
      showUpdate(respon.pesan, respon.atxt, respon.alnk);

      if (respon.status === "berhasil") {
        tampilkanPengumuman();
      }
    }
  };

  hapus.send("HapusPengumuman=true&Id=" + encodeURIComponent(id));
}

//
function simpanPerubahan(elemen, event, id) {
  event.preventDefault();

  let announcContainer = elemen.parentElement.parentElement;

  let judul = announcContainer.querySelector("input").value;
  let isi = announcContainer.querySelector("textarea").value;

  let SimpanPerubahan = new XMLHttpRequest();
  SimpanPerubahan.open("POST", "/functions/data-manager.php", true);
  SimpanPerubahan.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );

  SimpanPerubahan.onload = function () {
    if (SimpanPerubahan.status === 200) {
      console.log(SimpanPerubahan.responseText);
      let respon = JSON.parse(SimpanPerubahan.responseText);
      showUpdate(respon.pesan, respon.atxt, respon.alnk);

      if (respon.status === "berhasil") {
        tampilkanPengumuman();
      }
    }
  };

  SimpanPerubahan.send(
    "SimpanPerubahan=true&Id=" +
      encodeURIComponent(id) +
      "&Judul=" +
      encodeURIComponent(judul) +
      "&Isi=" +
      encodeURIComponent(isi)
  );
}
