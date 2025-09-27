<?php
session_start();
if (!isset($_SESSION["role"])) {
    header("Location: /");
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . "/connection/db_tukp.php"; // koneksi DB

// Ambil data lama berdasarkan ID
if (isset($_GET['id_mobil'])) {
    $id = $_GET['id_mobil'];
    $stmt = $pdo->prepare("SELECT * FROM data_mobil WHERE id_mobil = :id");
    $stmt->execute(['id' => $id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Mobil - TUKP Data Keeper</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/assets/bootstrap-5.3.5-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/style/style.css" />
</head>
<body>
<div class="layout">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"; ?>
    <div class="main">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>
        <main class="content p-4">
            <!-- Form rapi di tengah horizontal, bisa scroll kalau panjang -->
            <div class="container min-vh-100 d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow-sm w-100 mb-5" id="formulir">
                        <h5 class="card-header text-center">Edit Data Mobil</h5>
                        <div class="card-body">
                            <form action="/backend/kelola_data.php" method="post">
                                <input type="hidden" name="id_mobil" value="<?= $data['id_mobil'] ?>">

                                <div class="mb-3">
                                    <label class="form-label">Nama Driver</label>
                                    <input type="text" class="form-control" name="nama_driver" value="<?= $data['nama_driver'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Merek Kendaraan</label>
                                    <input type="text" class="form-control" name="merek_kendaraan" value="<?= $data['merek_kendaraan'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor Kendaraan</label>
                                    <input type="text" class="form-control" name="no_kendaraan" value="<?= $data['no_kendaraan'] ?>" required>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">KM Awal</label>
                                        <input type="number" class="form-control" name="km_awal" value="<?= $data['km_awal'] ?>" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">KM Akhir</label>
                                        <input type="number" class="form-control" name="km_akhir" value="<?= $data['km_akhir'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tujuan</label>
                                    <input type="text" class="form-control" name="tujuan" value="<?= $data['tujuan'] ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Keperluan</label>
                                    <input type="text" class="form-control" name="keperluan" value="<?= $data['keperluan'] ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <!-- Tombol Batalkan -->
                                        <a href="/pages/lihat-data/mobil.php" class="btn btn-outline-danger w-100">Batalkan</a>
                                    </div>
                                    <div class="col">
                                        <!-- Tombol Update -->
                                        <button type="submit" name="update_mobil" class="btn btn-success w-100">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
