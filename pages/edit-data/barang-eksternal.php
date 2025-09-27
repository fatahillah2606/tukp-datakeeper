<?php
session_start();
if (!isset($_SESSION["role"])) {
    header("Location: /");
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . "/connection/db_tukp.php";

// Ambil data lama berdasarkan ID
$id = $_GET['id_barang_eksternal'] ?? null;
if (!$id) {
    die("ID barang eksternal tidak ditemukan!");
}

$stmt = $pdo->prepare("SELECT * FROM data_barang_eksternal WHERE id_barang_eksternal = :id");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data barang eksternal tidak ditemukan!");
}

// Decode nama_jumlah_barang (disimpan sebagai JSON array)
$barangList = json_decode($data['nama_jumlah_barang'], true) ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang Eksternal - TUKP Data Keeper</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
    <link rel="stylesheet" href="/assets/bootstrap-5.3.5-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/assets/style/style.css"/>
</head>
<body>
<div class="layout">
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/sidebar.php"; ?>
    <div class="main">
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/components/navbar.php"; ?>
        <main class="content p-4">
            <div class="container min-vh-100 d-flex justify-content-center">
                <div class="col-md-7">
                    <div class="card shadow-sm w-100 mb-5" id="formulir">
                        <h5 class="card-header text-center">Edit Barang Eksternal</h5>
                        <div class="card-body">
                            <form action="/backend/kelola_data.php" method="post">
                                <input type="hidden" name="id_barang_eksternal" value="<?= $data['id_barang_eksternal'] ?>">

                                <!-- Nama Driver & Supplier -->
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="form-label">Nama Driver</label>
                                        <input type="text" class="form-control" name="nama_driver"
                                               value="<?= htmlspecialchars($data['nama_driver']) ?>" maxlength="25" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Nama Supplier</label>
                                        <input type="text" class="form-control" name="nama_suplier"
                                               value="<?= htmlspecialchars($data['nama_suplier']) ?>" maxlength="25" required>
                                    </div>
                                </div>

                                <!-- Barang -->
                                <h5>Barang</h5>
                                <div id="form-container">
                                    <?php foreach ($barangList as $i => $barang): ?>
                                        <div class="row align-items-end barang-row mb-2">
                                            <div class="col">
                                                <label class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control" name="nama_barang[]"
                                                       value="<?= htmlspecialchars($barang['nama_barang']) ?>"
                                                       maxlength="25" required>
                                            </div>
                                            <div class="col">
                                                <label class="form-label">Jumlah Barang</label>
                                                <input type="number" class="form-control" name="jumlah_barang[]"
                                                       value="<?= htmlspecialchars($barang['jumlah_barang']) ?>"
                                                       max="9999" required>
                                            </div>
                                            <div class="col-2">
                                                <?php if ($i > 0): ?>
                                                    <button type="button" class="btn btn-danger btn-hapus">
                                                        <span class="material-symbols-rounded">delete</span>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button type="button" class="btn btn-outline-success my-3" id="btn-tambah">Tambah</button>

                                <!-- Tanggal & Jam Kedatangan -->
                                <div class="row mb-3">
                                    <div class="col">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal"
                                               value="<?= htmlspecialchars($data['tanggal']) ?>" required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Jam Kedatangan</label>
                                        <input type="time" class="form-control" name="jam_kedatangan"
                                               value="<?= htmlspecialchars($data['jam_kedatangan']) ?>" required>
                                    </div>
                                </div>

                                <!-- Nomor Kendaraan -->
                                <div class="mb-3">
                                    <label class="form-label">Nomor Kendaraan</label>
                                    <input type="text" class="form-control" name="no_kendaraan"
                                           value="<?= htmlspecialchars($data['no_kendaraan']) ?>" maxlength="11" required>
                                </div>

                                <!-- Keterangan -->
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="keterangan"
                                           value="<?= htmlspecialchars($data['keterangan']) ?>" maxlength="50" required>
                                </div>

                                <!-- Tombol -->
                                <div class="row">
                                    <div class="col">
                                        <a href="/pages/lihat-data/barang-eksternal.php" class="btn btn-outline-danger w-100">Batal</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="update_barang_eksternal" class="btn btn-success w-100">Update</button>
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

<script>
// Tambah kolom barang baru
document.getElementById("btn-tambah").addEventListener("click", function () {
    const div = document.createElement("div");
    div.classList.add("row", "align-items-end", "barang-row", "mb-2");
    div.innerHTML = `
        <div class="col">
            <label class="form-label">Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang[]" maxlength="25" required>
        </div>
        <div class="col">
            <label class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" name="jumlah_barang[]" max="9999" required>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-danger btn-hapus">
                <span class="material-symbols-rounded">delete</span>
            </button>
        </div>
    `;
    document.getElementById("form-container").appendChild(div);
});

// Hapus kolom barang
document.getElementById("form-container").addEventListener("click", function (e) {
    if (e.target.closest(".btn-hapus")) {
        e.target.closest(".barang-row").remove();
    }
});
</script>
</body>
</html>
