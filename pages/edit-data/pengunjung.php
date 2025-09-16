<?php
// reuire $_SERVER['DOCUMENT_ROOT'] . ''

// cek sesi 
session_start();
if (!isset($_SESSION["role"])) {

    // Pindah user ke halaman login
    header("Location: /");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Pengunjung - TUKP Data Keeper</title>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        />
        <link
            rel="stylesheet"
            href="/assets/bootstrap-5.3.5-dist/css/bootstrap.min.css"
        />
        <!-- local css -->
        <link rel="stylesheet" href="/assets/style/style.css" />
    </head>
    <body>
        <div class="layout">
            <!-- Sidebar -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"; ?>
            <div class="main">
                <!-- Bagian Navbar -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>
                <main class="content p-4">
                    <!-- Formulir -->
                    <div class="card overflow-hidden" id="formulir">
                        <h5 class="card-header">Catat Pengunjung</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pencatatan">
                                <div id="form-container">
                                    <div class="flex-grow-1">
                                        <label
                                            for="nama-pengunjung-1"
                                            class="form-label"
                                            >Nama Pengunjung</label
                                        >
                                        <div
                                            class="mb-3 d-flex align-items-center"
                                        >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nama-pengunjung-1"
                                                name="nama_pengunjung[]"
                                                placeholder=""
                                                maxlength="25"
                                                required
                                            />
                                        </div>
                                    </div>
                                </div>

                                <button
                                    type="button"
                                    class="btn btn-outline-success my-3"
                                    id="btn-tambah"
                                >
                                    Tambah
                                </button>
                                <div class="mb-3">
                                    <label
                                        for="nama-perusahaan"
                                        class="form-label"
                                        >Nama Perusahaan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama-perusahaan"
                                        name="nama_perusahaan"
                                        placeholder=""
                                        maxlength="25"
                                        required
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="no-kendaraan" class="form-label"
                                        >Nomor Kendaraan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="no-kendaraan"
                                        name="no_kendaraan"
                                        placeholder=""
                                        maxlength="11"
                                        required
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label"
                                        >Tanggal</label
                                    >
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="tanggal"
                                        name="tanggal"
                                        placeholder=""
                                        required
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="nomor-telepon"
                                        class="form-label"
                                        >Nomor Telepon</label
                                    >
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="nomor-telepon"
                                        name="nomor_telepon"
                                        placeholder=""
                                        max="9999999999999"
                                        required
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="keperluan" class="form-label"
                                        >Keperluan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="keperluan"
                                        name="keperluan"
                                        placeholder=""
                                        maxlength="50"
                                        required
                                    />
                                </div>
                                <div class="safety">
                                    <p>
                                        Apakah Sudah Dilakukan Safety Induction
                                        Oleh Security ?
                                    </p>
                                    <div class="form-radio">
                                        <input
                                            type="radio"
                                            id="ya"
                                            name="safety_induction"
                                            value="Ya"
                                            required
                                        />
                                        <label for="ya">Ya</label>
                                    </div>
                                    <div
                                        class="form-radio"
                                        style="margin-bottom: 1px"
                                    >
                                        <input
                                            type="radio"
                                            id="tidak"
                                            name="safety_induction"
                                            value="Tidak"
                                            required
                                        />
                                        <label for="tidak">Tidak</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button
                                            type="reset"
                                            class="btn btn-outline-success my-3 w-100"
                                        >
                                            Bersihkan
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button
                                            type="button"
                                            class="btn btn-success my-3 w-100"
                                            onclick="simpan(event)"
                                        >
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Ambil parameter url
            const urlParam = new URLSearchParams(window.location.search);
            const idPengunjung = urlParam.get("id_pengunjung");

            // limit number
            document
                .getElementById("nomor-telepon")
                .addEventListener("input", function () {
                    if (this.value.length > 13) {
                        this.value = this.value.slice(0, 13);
                    }
                });
            // muatDataPengunjung();
            let counter = 1;

            // Fungsi untuk bikin kolom baru
            function buatKolom(nomor) {
                const div = document.createElement("div");

                div.innerHTML = `
                    <div class="flex-grow-1">
                        <label
                            for="nama-pengunjung-${nomor}"
                            class="form-label"
                            >Nama Pengunjung</label
                        >
                        <div
                            class="mb-3 d-flex align-items-center"
                        >
                            <input
                                type="text"
                                class="form-control"
                                id="nama-pengunjung-${nomor}"
                                name="nama_pengunjung[]"
                                placeholder=""
                                maxlength="25"
                                required
                            />
                            <button
                                type="button"
                                class="btn btn-danger btn-sm ms-2 btn-hapus"
                            >
                                <span
                                    class="material-symbols-rounded"
                                    >delete</span
                                >
                            </button>
                        </div>
                    </div>
                `;

                return div;
            }

            // Event tambah
            document
                .getElementById("btn-tambah")
                .addEventListener("click", function () {
                    counter++;
                    const kolomBaru = buatKolom(counter);
                    document
                        .getElementById("form-container")
                        .appendChild(kolomBaru);
                });

            // Event hapus (delegasi ke parent)
            document
                .getElementById("form-container")
                .addEventListener("click", function (e) {
                    if (e.target.closest(".btn-hapus")) {
                        e.target.closest(".flex-grow-1").remove();
                        counter--;
                    }
                });

            // Simpan data ke database
            function simpan(event) {
                event.preventDefault();

                const elmForm = document.getElementById("form-pencatatan");
                const dataForm = new FormData(elmForm);
                dataForm.append("kirim_data_pengunjung", true);

                //  for (const [name, value] of dataForm) {
                //     console.log(`${name}: ${value}`);
                //  }

                const kolomIsian = document.querySelectorAll(
                    "input[required], select[required]"
                );
                console.log(kolomIsian);

                let valid = true;

                kolomIsian.forEach((element) => {
                    if (element.value == "") {
                        valid = false;
                    }
                });

                if (valid) {
                    fetch("/backend/kelola_data.php", {
                        method: "POST",
                        body: dataForm,
                    })
                        .then(async (respon) => {
                            const data = await respon.json();
                            console.log(data);
                            if (!respon.ok) {
                                throw new Error(
                                    data.message || "Terjadi kesalahan"
                                );
                            }
                            return data;
                        })
                        .then((data) => {
                            alert(data.message);
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                } else {
                    alert("Semua Kolom Wajib Diisi");
                }
            }
        </script>
    </body>
</html>
