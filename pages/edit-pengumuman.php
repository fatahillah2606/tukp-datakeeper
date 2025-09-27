<?php
session_start();
if (!isset($_SESSION["role"])) {
    header("Location: /");
    exit();
}

include $_SERVER['DOCUMENT_ROOT'] . "/connection/db_tukp.php";

// Ambil ID dari query
$id = $_GET['id_pengumuman'] ?? null;
if (!$id) {
    die("ID pengumuman tidak ditemukan!");
}

// Ambil data lama
$stmt = $pdo->prepare("SELECT * FROM pengumuman WHERE id_pengumuman = :id");
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data pengumuman tidak ditemukan!");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengumuman - TUKP Data Keeper</title>
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
                    <div class="card shadow-sm w-100 mb-5" id="formulir">
                        <h5 class="card-header text-center">Edit Pengumuman</h5>
                        <div class="card-body">
                            <form action="/backend/pengumuman.php" method="post">
                                <input type="hidden" name="id_pengumuman" value="<?= $data['id_pengumuman'] ?>">

                                <!-- Judul -->
                                <div class="mb-3">
                                    <label class="form-label">Judul Pengumuman</label>
                                    <input type="text" class="form-control" name="judul_pengumuman"
                                           value="<?= htmlspecialchars($data['judul_pengumuman']) ?>"
                                           maxlength="25" required>
                                </div>

                                <!-- Isi -->
                                <div class="mb-3">
                                    <label class="form-label">Isi Pengumuman</label>
                                    <textarea class="form-control" name="isi_pengumuman" rows="3" required><?= htmlspecialchars($data['isi_pengumuman']) ?></textarea>
                                </div>

                                <!-- Tombol -->
                                <div class="row">
                                    <div class="col">
                                        <a href="/pages/pengumuman.php" class="btn btn-outline-danger w-100">Batalkan</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="update_pengumuman" class="btn btn-success w-100">Update</button>
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
