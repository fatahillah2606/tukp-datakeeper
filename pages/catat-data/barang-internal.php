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
        <title>Catat Barang Internal - TUKP Data Keeper</title>
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
                        <h5 class="card-header">Catat Barang Internal</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pencatatan">
                                <div class="mb-3">
                                    <label for="nama-pembawa" class="form-label"
                                        >Nama Pembawa</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama-pembawa"
                                        name="nama_pembawa"
                                        placeholder=""
                                        maxlength="25"
                                        required
                                    />
                                </div>
                                <h5>Barang</h5>
                                <div id="form-container">
                                    <div class="row align-items-end">
                                        <div class="col">
                                            <label
                                                for="nama-barang"
                                                class="form-label"
                                                >Nama Barang</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="nama-barang"
                                                name="nama_barang[]"
                                                placeholder=""
                                                maxlength="25"
                                                required
                                            />
                                        </div>
                                        <div class="col">
                                            <label
                                                for="jumlah-barang"
                                                class="form-label"
                                                >Jumlah Barang</label
                                            >
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="jumlah-barang"
                                                name="jumlah_barang[]"
                                                placeholder=""
                                                maxlength="10"
                                                required
                                            />
                                        </div>
                                        <div class="col-2">
                                            <button
                                                class="btn btn-danger btn-hapus"
                                                type="button"
                                            >
                                                <span
                                                    class="material-symbols-rounded"
                                                >
                                                    delete
                                                </span>
                                            </button>
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
                                    <label for="keterangan" class="form-label"
                                        >keterangan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="keterangan"
                                        name="keterangan"
                                        placeholder=""
                                        maxlength="50"
                                        required
                                    />
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
            // muatDataBarangInternal(10);
            let counter = 1;

            // Fungsi untuk bikin kolom baru
            function buatKolom(nomor) {
                const div = document.createElement("div");

                div.innerHTML = `
                    <div class="row align-items-end barang-row">
                        <div class="col">
                            <label
                                for="nama-barang-${nomor}"
                                class="form-label"
                                >Nama Barang</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="nama-barang-${nomor}"
                                name="nama_barang[]"
                                placeholder=""
                                maxlength="25"
                                required
                            />
                        </div>
                        <div class="col">
                            <label
                                for="jumlah-barang-${nomor}"
                                class="form-label"
                                >Jumlah Barang</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                id="jumlah-barang-${nomor}"
                                name="jumlah_barang[]"
                                placeholder=""
                                maxlength="10"
                                required
                            />
                        </div>
                        <div class="col-2">
                            <button class="btn btn-danger btn-hapus" type="button">
                                <span
                                    class="material-symbols-rounded"
                                >
                                    delete
                                </span>
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
                        e.target.closest(".align-items-end").remove();
                    }
                });

            // Simpan data ke database
            function simpan(event) {
                event.preventDefault();

                const elmForm = document.getElementById("form-pencatatan");
                const dataForm = new FormData(elmForm);
                dataForm.append("kirim_data_barang_internal", true);

                // for (const [name, value] of dataForm) {
                //     console.log(`${name}: ${value}`);
                // }
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
                            window.location.href = "/index.php"; // pindah ke login
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
