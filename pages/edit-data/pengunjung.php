<?php
session_start();
if (!isset($_SESSION["role"])) {
    header("Location: /");
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . "/connection/db_tukp.php";

// Ambil data lama berdasarkan ID
$id = $_GET['id_pengunjung'] ?? null;
if (!$id) {
    die("ID pengunjung tidak ditemukan!");
}

$stmt = $pdo->prepare("SELECT * FROM data_pengunjung WHERE id_pengunjung = :id");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data pengunjung tidak ditemukan!");
}

// Decode nama_pengunjung (disimpan sebagai JSON array)
$nama_pengunjung = json_decode($data['nama_pengunjung'], true) ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengunjung - TUKP Data Keeper</title>
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
                <div class="col-md-6">
                    <div class="card shadow-sm w-100 mb-5">
                        <h5 class="card-header text-center">Edit Data Pengunjung</h5>
                        <div class="card-body">
                            <form action="/backend/kelola_data.php" method="post">
                                <input type="hidden" name="id_pengunjung" value="<?= $data['id_pengunjung'] ?>">

                                <!-- Nama Pengunjung -->
                                <div id="form-container">
                                    <?php foreach ($nama_pengunjung as $i => $nama): ?>
                                        <div class="flex-grow-1">
                                            <label class="form-label">Nama Pengunjung</label>
                                            <div class="mb-3 d-flex align-items-center">
                                                <input type="text" class="form-control"
                                                       name="nama_pengunjung[]"
                                                       value="<?= htmlspecialchars($nama) ?>"
                                                       maxlength="25" required>
                                                <?php if ($i > 0): ?>
                                                    <button type="button" class="btn btn-danger btn-sm ms-2 btn-hapus">
                                                        <span class="material-symbols-rounded">delete</span>
                                                    </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <button type="button" class="btn btn-outline-success my-3" id="btn-tambah">Tambah</button>

                                <!-- Nama Perusahaan -->
                                <div class="mb-3">
                                    <label class="form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="nama_perusahaan"
                                           value="<?= htmlspecialchars($data['nama_perusahaan']) ?>"
                                           maxlength="25" required>
                                </div>

                                <!-- Nomor Kendaraan -->
                                <div class="mb-3">
                                    <label class="form-label">Nomor Kendaraan</label>
                                    <input type="text" class="form-control" name="no_kendaraan"
                                           value="<?= htmlspecialchars($data['no_kendaraan']) ?>"
                                           maxlength="11" required>
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="tanggal"
                                           value="<?= htmlspecialchars($data['tanggal']) ?>" required>
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="mb-3">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" id="no-telpon" name="no_telpon"
                                           value="<?= htmlspecialchars($data['no_telpon']) ?>"
                                           maxlength="13" pattern="[0-9]{1,13}"
                                           title="Nomor telepon hanya angka maksimal 13 digit" required>
                                </div>

                                <!-- Keperluan -->
                                <div class="mb-3">
                                    <label class="form-label">Keperluan</label>
                                    <input type="text" class="form-control" name="keperluan"
                                           value="<?= htmlspecialchars($data['keperluan']) ?>"
                                           maxlength="50" required>
                                </div>

                                <!-- Safety Induction -->
                                <div class="mb-3">
                                    <p>Apakah Sudah Dilakukan Safety Induction Oleh Security?</p>
                                    <div>
                                        <input type="radio" id="ya" name="safety_induction" value="Ya"
                                            <?= $data['safety_induction'] === "Ya" ? "checked" : "" ?> required>
                                        <label for="ya">Ya</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="tidak" name="safety_induction" value="Tidak"
                                            <?= $data['safety_induction'] === "Tidak" ? "checked" : "" ?> required>
                                        <label for="tidak">Tidak</label>
                                    </div>
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="row">
                                    <div class="col">
                                        <a href="/pages/lihat-data/pengunjung.php" class="btn btn-outline-danger w-100">Batalkan</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="update_pengunjung" class="btn btn-success w-100">Update</button>
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
// Tambah kolom nama pengunjung baru
document.getElementById("btn-tambah").addEventListener("click", function () {
    const div = document.createElement("div");
    div.classList.add("flex-grow-1");
    div.innerHTML = `
        <label class="form-label">Nama Pengunjung</label>
        <div class="mb-3 d-flex align-items-center">
            <input type="text" class="form-control" name="nama_pengunjung[]" maxlength="25" required>
            <button type="button" class="btn btn-danger btn-sm ms-2 btn-hapus">
                <span class="material-symbols-rounded">delete</span>
            </button>
        </div>
    `;
    document.getElementById("form-container").appendChild(div);
});

// Hapus kolom nama pengunjung
document.getElementById("form-container").addEventListener("click", function (e) {
    if (e.target.closest(".btn-hapus")) {
        e.target.closest(".flex-grow-1").remove();
    }
});

// Batasi nomor telepon hanya angka max 13 digit
document.getElementById("no-telpon").addEventListener("input", function () {
    this.value = this.value.replace(/[^0-9]/g, ''); // hapus non angka
    if (this.value.length > 13) {
        this.value = this.value.slice(0, 13);
    }
});
</script>
</body>
</html>
