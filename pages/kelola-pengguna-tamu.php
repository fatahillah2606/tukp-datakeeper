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
        <title>Kelola Pengguna - TUKP Data Keeper</title>
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
                        <h5 class="card-header">Tambah Pengguna</h5>
                        <div class="card-body">
                            <form action="" method="post" id="form-pengguna">
                                <div class="mb-3">
                                    <label for="role" class="form-label"
                                        >Tipe Pengguna</label
                                    >
                                    <!-- Opsi Pilih Role -->
                                    <select
                                        class="form-select mb-3"
                                        aria-label="Jenis Pengguna"
                                        name="role"
                                        id="role"
                                    >
                                        <option value="Admin">Admin</option>
                                        <option value="Security">
                                            Security
                                        </option>
                                        <option value="Tamu" selected>
                                            Tamu
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_user" class="form-label"
                                        >Nama Pengguna</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nama_user"
                                        name="nama_user"
                                        placeholder=""
                                        maxlength="25"
                                        required
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="token_login" class="form-label"
                                        >Token</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="token_login"
                                        placeholder=""
                                        name="token_login"
                                        maxlength="60"
                                        required
                                    />
                                </div>
                                <div class="form-check mb-3">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value=""
                                        id="showpw"
                                    />
                                    <label
                                        class="form-check-label"
                                        for="showpw"
                                    >
                                        Tampilkan Sandi
                                    </label>
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
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- List pengguna -->
                    <div id="list-pengguna" class="mb-5">
                        <h2 class="mb-3 text-center">List Pengguna</h2>
                        <div id="pengguna-container"></div>
                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Cek opsi role
            let peran = document.getElementById("role");
            peran.addEventListener("change", () => {
                if (peran.value === "Admin") {
                    location.href = "kelola-pengguna-admin.php";
                } else if (peran.value === "Security") {
                    location.href = "kelola-pengguna.php";
                } else {
                    location.href = "kelola-pengguna-tamu.php";
                }
            });

            //Tombol Tampilkan Sandi
            let showpw = document.getElementById("showpw");
            let password = document.getElementById("password");

            if (showpw) {
                showpw.addEventListener("change", () => {
                    if (showpw.checked) {
                        password.setAttribute("type", "text");
                    } else {
                        password.setAttribute("type", "password");
                    }
                });
            }

            // muatDataPengguna(10);
            let counter = 1;

            // Simpan data ke database
            function simpan(event) {
                event.preventDefault();

                const elmForm = document.getElementById("form-pengguna");
                const dataForm = new FormData(elmForm);
                dataForm.append("kirim_data_pengguna_tamu", true);

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
                    fetch("/backend/kelola_pengguna.php", {
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
                            muatDataPengguna();
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                } else {
                    alert("Semua Kolom Wajib Diisi");
                }
            }

            // Lihat list Pengguna //
            const penggunaContainer =
                document.getElementById("pengguna-container");
            function muatDataPengguna() {
                fetch("../backend/kelola_pengguna.php", {
                    method: "GET",
                })
                    .then((response) => {
                        console.log("Status:", response.status);
                        if (!response.ok) {
                            throw new Error("Gagal terhubung ke server");
                        }
                        return response.json();
                    })
                    .then((data) => {
                        if (data.code === 200) {
                            ListPengguna = data.data;
                            let konten = `<div class="d-flex flex-wrap justify-content-center gap-3">`;
                            ListPengguna.forEach((Pengguna) => {
                                konten += `
                                            <div class="card" style="width: 300px">
                                                <span class="material-symbols-rounded">
                                                    account_circle
                                                </span>
                                                <div class="card-body">
                                                    <h5 class="card-title text-center">
                                                        ${Pengguna.nama_user}
                                                    </h5>
                                                    <h6
                                                        class="card-subtitle mb-2 text-body-secondary text-center"
                                                    >
                                                        ${Pengguna.role}
                                                    </h6>
                                                    <div class="row gap-2 mt-3">
                                                        <button
                                                            type="button"
                                                            class="col btn btn-danger"
                                                            title="Hapus"
                                                            onclick="hapusPengguna('${Pengguna.id_pengguna}')"
                                                        >
                                                            <span
                                                                class="material-symbols-rounded fs-3"
                                                                >delete</span
                                                            >
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                         `;
                            });
                            penggunaContainer.innerHTML = konten;
                        }
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            }

            // Hapus Penggunna
            function hapusPengguna(idData) {
                const dataPengguna = {
                    hapus_pengguna: true,
                    id_pengguna: idData,
                };

                if (confirm("Yakin ingin menghapus data ini?") === true) {
                    fetch(
                        "/backend/kelola_pengguna.php?hapus_data_pengguna=true",
                        {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(dataPengguna),
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
                            window.location.href =
                                "/pages/kelola-pengguna-tamu.php"; // pindah ke halaman kelola-pengguna
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                }
            }

            muatDataPengguna();
        </script>
    </body>
</html>
