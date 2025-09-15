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
        <title>Kelola Pengumuman - TUKP Data Keeper</title>
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
                        <h5 class="card-header">Buat Pengumuman</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pengumuman">
                                <div class="mb-3">
                                    <label
                                        for="judul_pengumuman"
                                        class="form-label"
                                        >Judul Pengumuman</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="judul_pengumuman"
                                        name="judul_pengumuman"
                                        placeholder=""
                                        maxlength="25"
                                        required
                                    />
                                </div>
                                <div class="mb-3">
                                    <label
                                        for="isi_pengumuman"
                                        class="form-label"
                                        >Isi Pengumuman</label
                                    >
                                    <textarea
                                        class="form-control"
                                        id="isi_pengumuman"
                                        name="isi_pengumuman"
                                        rows="3"
                                        required
                                    ></textarea>
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

                    <!-- List pengumuman -->
                    <div id="list-pengumuman">
                        <h2 class="mb-3">List Pengumuman</h2>
                        <div id="pengumuman-container"></div>
                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // muatDataPengumuman(10);
            let counter = 1;

            // Simpan data ke database
            function simpan(event) {
                event.preventDefault();

                const elmForm = document.getElementById("form-pengumuman");
                const dataForm = new FormData(elmForm);
                dataForm.append("kirim_data_pengumuman", true);

                //  for (const [name, value] of dataForm) {
                //     console.log(`${name}: ${value}`);
                //  }

                const kolomIsian = document.querySelectorAll(
                    "input[required], select[required], textarea[required]"
                );
                console.log(kolomIsian);

                let valid = true;

                kolomIsian.forEach((element) => {
                    if (element.value == "") {
                        valid = false;
                    }
                });

                if (valid) {
                    fetch("/backend/pengumuman.php", {
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
                            muatDataPengumuman();
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                } else {
                    alert("Semua Kolom Wajib Diisi");
                }
            }

            // Lihat list Pengumuman //
            const pengumumanContainer = document.getElementById(
                "pengumuman-container"
            );
            function muatDataPengumuman() {
                fetch("/backend/pengumuman.php", {
                    method: "GET",
                })
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error("Gagal terhubung ke server");
                        }
                        return response.json();
                    })
                    .then((data) => {
                        if (data.code === 200) {
                            ListPengumuman = data.data;
                            konten = "";
                            ListPengumuman.forEach((Pengumuman) => {
                                konten += `
                                    <div class="alert alert-success" role="alert">
                                        <h1 class="fs-3">${Pengumuman.judul_pengumuman}</h1>
                                            <p>
                                                ${Pengumuman.isi_pengumuman}
                                            </p>
                                <button class="btn btn-danger" onclick="hapusPengumuman(${Pengumuman.id_pengumuman})">
                                <span
                                        class="material-symbols-rounded"
                                    >
                                        delete
                                    </span>
                                    </div>
                                         `;
                            });
                            pengumumanContainer.innerHTML = konten;
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }

            // Hapus Pengumuman
            function hapusPengumuman(idData) {
                const dataPengumuman = {
                    hapus_pengumuman: true,
                    id_pengumuman: idData,
                };

                if (confirm("Yakin ingin menghapus data ini?") === true) {
                    fetch(
                        "/backend/pengumuman.php?hapus_data_pengumuman=true",
                        {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(dataPengumuman),
                        }
                    )
                        .then(async (response) => {
                            const data = await response.json();
                            console.log(data);
                            if (!response.ok) {
                                throw new Error(
                                    data.message || "Terjadi kesalahan"
                                );
                            }
                            return data;
                        })
                        .then((data) => {
                            alert(data.message);
                            muatDataPengumuman();
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                }
            }

            muatDataPengumuman();
        </script>
    </body>
</html>
