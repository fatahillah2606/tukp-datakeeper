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
        <title>Catat Mobil - TUKP Data Keeper</title>
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
                        <h5 class="card-header">Catat Mobil</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pencatatan">
                                <div class="mb-3">
                                    <label for="nama-driver" class="form-label"
                                        >Nama Driver</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama-driver"
                                        name="nama_driver"
                                        placeholder=""
                                        maxlength="25"
                                        required
                                    />
                                </div>
                                <div class="col">
                                    <label
                                        for="merek-kendaraan-"
                                        class="form-label"
                                        >Merek Kendaraan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="merek-kendaraan"
                                        name="merek_kendaraan"
                                        placeholder=""
                                        maxlength="25"
                                        required
                                    />
                                </div>
                                <div class="col">
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
                                <h5>Kilometer</h5>
                                <div class="row align-items-end">
                                    <div class="col">
                                        <label for="-awal" class="form-label"
                                            >Awal</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="awal"
                                            name="km_awal"
                                            placeholder=""
                                            required
                                        />
                                    </div>
                                    <div class="col">
                                        <label for="akhir" class="form-label"
                                            >Akhir</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="akhir"
                                            name="km_akhir"
                                            placeholder=""
                                            required
                                        />
                                    </div>
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
                                    <label for="tujuan" class="form-label"
                                        >Tujuan</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="tujuan"
                                        name="tujuan"
                                        placeholder=""
                                        maxlength="25"
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
                                <div class="row">
                                    <div class="col">
                                        <button
                                            type="button"
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
            // muatDataMobil(10);
            let counter = 1;

            // Simpan data ke database
            function simpan(event) {
                event.preventDefault();

                const elmForm = document.getElementById("form-pencatatan");
                const dataForm = new FormData(elmForm);
                dataForm.append("kirim_data_mobil", true);

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
