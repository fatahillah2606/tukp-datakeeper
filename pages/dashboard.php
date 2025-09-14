<?php
// reuire $_SERVER['DOCUMENT_ROOT'] . ''

// cek sesi 
session_start();
if (!isset($_SESSION["role"])) {

    // Pindah user ke halaman login
    header("Location: /");
    exit();
} else {
    if ($_SESSION["role"]  == "Tamu") {
        header("Location: /pages/dashboard-tamu.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - TUKP Data Keeper</title>
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
            <!-- Bagian Sidebar -->
            <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"; ?>
            <!--  -->
            <div class="main">
                <!-- Bagian Navbar -->
                <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>
                <main class="content p-4">
                    <h1 class="display-2 mb-5 ms-3">
                        Selamat Datang,
                        <?php echo $_SESSION["nama_user"]; ?>
                    </h1>

                    <!-- Pengumuman -->
                    <div id="pengumuman-container"></div>

                    <!-- Tabel -->
                    <div class="tabel p-4 rounded-4">
                        <div class="tabel-head">
                            <h3>Data Barang Internal</h3>

                            <!-- search bar -->
                            <form class="row g-3">
                                <div class="col-auto">
                                    <label
                                        for="search-bar"
                                        class="visually-hidden"
                                        >Cari</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="search-bar"
                                        placeholder="Cari..."
                                    />
                                </div>
                                <div class="col-auto">
                                    <button
                                        type="submit"
                                        class="btn mb-3"
                                        id="search"
                                    >
                                        <span class="material-symbols-rounded">
                                            search
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Tabel data -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Pembawa</th>
                                    <th scope="col">Nama dan Jumlah Barang</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="isi-tabel">
                                <tr>
                                    <td cols>Driver_51</td>
                                    <td><li>Minyak, 500</li></td>
                                    <td>2025-03-12</td>
                                    <td>Barang diterima dalam kondisi baik</td>
                                    <td class="action-btn">
                                        <button class="btn btn-success">
                                            <span
                                                class="material-symbols-rounded"
                                            >
                                                edit
                                            </span>
                                        </button>
                                        <button class="btn btn-danger">
                                            <span
                                                class="material-symbols-rounded"
                                            >
                                                delete
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
        <script src="/assets/scripts/kelola_data.js"></script>
        <script src="/assets/scripts/navigation.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            muatDataBarangInternal(10);

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
            muatDataPengumuman();
        </script>
    </body>
</html>
