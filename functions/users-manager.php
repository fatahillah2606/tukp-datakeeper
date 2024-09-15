<?php
// Tampilkan semua pengguna
if (isset($_GET["dataPengguna"])) {
  require "../includes/db-connect.php";
  $sql = "SELECT * FROM pengguna";
  $hasil = $conn->query($sql);
  if ($hasil->num_rows > 0) {
    while ($baris = $hasil->fetch_assoc()) {
      ?>
        <div class="user">
          <div class="left">
            <div class="user-icon">
              <span class="material-symbols-rounded">person</span>
            </div>
            <div class="user-name">
              <h2 class="nama"><?php echo $baris['nama_user'] ?></h2>
              <?php if ($baris['role'] === 'Admin') { ?>
              <p class="id-email"><?php echo $baris['email_user'] ?></p>
              <?php } else { ?>
              <p class="id-email"><?php echo $baris['id_user'] ?></p>
              <?php } ?>
            </div>
          </div>
          <div class="right">
            <p class="role"><?php echo $baris['role'];?></p>
            <?php
              $idUser = $baris['id'];
              $namaUser = $baris['nama_user'];
            ?>
            <div class="action-btn">
              <div class="btn reset">
                <span class="material-symbols-rounded">history</span>
                <p
                  onclick="resetPasswd(<?php echo $idUser; ?>, '<?php echo $namaUser; ?>')"
                >
                  Reset
                </p>
              </div>
              <div class="btn edit" onclick="editUser()">
                <span class="material-symbols-rounded">edit</span>
                <p>Edit</p>
              </div>
              <a
                href="#"
                class="hapus material-symbols-rounded"
                onclick="hapusUser(<?php echo $idUser; ?>, '<?php echo $namaUser; ?>')"
                >delete</a
              >
            </div>
          </div>
        </div>
      <?php
    }
  } else {
    echo "<h3>Pengguna tidak tersedia</h3>";
  }
  $conn->close();
}
?>

<?php
// Tambah pengguna
if (isset($_POST["TambahUser"])) {
  require "../includes/db-connect.php";
  $namaUser = htmlspecialchars($_POST["NamaUser"]);
  $sandiUser = htmlspecialchars($_POST["SandiUser"]);
  $tipeUser = htmlspecialchars($_POST["TipeUser"]);

  $idUser = isset($_POST["IdUser"]) ? htmlspecialchars($_POST["IdUser"]) : null;
  $emailUser = isset($_POST["EmailUser"]) ? htmlspecialchars($_POST["EmailUser"]) : null;
  
  // Hash sandi
  $sandiUser = password_hash($sandiUser, PASSWORD_BCRYPT);

  try {
    $sql = "";
    $stmt = "";

    if ($idUser === "") {
      $sql = "INSERT INTO pengguna (`id`, `id_user`, `email_user`, `nama_user`, `role`, `password`) VALUES (null, null, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssss", $emailUser, $namaUser, $tipeUser, $sandiUser);
    } else if ($emailUser === "") {
      $sql = "INSERT INTO pengguna (`id`, `id_user`, `email_user`, `nama_user`, `role`, `password`) VALUES (null, ?, null, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("isss", $idUser, $namaUser, $tipeUser, $sandiUser);
    }
    
    $stmt->execute();
    echo json_encode(["status" => "berhasil", "pesan" => "Berhasil menambah pengguna", "atxt" => "", "alnk" => ""]);
  } catch (mysqli_sql_exception $kesalahan) {
    if ($kesalahan->getCode() == 1062) {
      echo json_encode(["status" => "gagal", "pesan" => "Id User atau Email sudah ada!", "atxt" => "", "alnk" => ""]);
    } else {
      echo json_encode(["status" => "kesalahan", "pesan" => "Terjadi kesalahan pada server", "atxt" => "", "alnk" => "", "error_msg" => " . $conn->error . "]);
    }
  } finally {
    $stmt->close();
    $conn->close();
  }
}
?>

<?php
// Hapus pengguna
if (isset($_POST["hapusUser"])) {
  require "../includes/db-connect.php";
  $idUser = htmlspecialchars($_POST["idUser"]);
  $sql = "DELETE FROM pengguna WHERE id = ?;";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $idUser);
  if ($stmt->execute()) {
    echo json_encode(["status" => "berhasil", "pesan" => "Pengguna dihapus", "atxt" => "", "alnk" => ""]);
  } else {
    echo json_encode(["status" => "gagal", "pesan" => "Terjadi kesalahan, silahkan cek console", "atxt" => "", "alnk" => "", "pesanError" => $conn->error]);
  }
  $conn->close();
}
?>

<?php
// Reset sandi pengguna
if (isset($_POST["updatePass"])) {
  require "../includes/db-connect.php";

  $akun = htmlspecialchars($_POST["akun"]);
  $sandiBaru = htmlspecialchars($_POST["SandiBaru"]);

  $sql = "SELECT password FROM pengguna WHERE id = ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $akun);
  $stmt->execute();
  $stmt->bind_result($sandiLama);
  $stmt->fetch();

  if (password_verify($sandiBaru, $sandiLama)) {
    echo json_encode(["status" => "kesalahan", "pesan" => "Sandi baru tidak boleh sama dengan sandi lama", "atxt" => "", "alnk" => ""]);
  } else {
    $stmt->close();
    $hashSandiBaru = password_hash($sandiBaru, PASSWORD_BCRYPT);
    $sql = "UPDATE pengguna SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $hashSandiBaru, $akun);
    if ($stmt->execute()) {
      echo json_encode(["status" => "berhasil", "pesan" => "Sandi berhasil di reset", "atxt" => "", "alnk" => ""]);
    } else {
      echo json_encode(["status" => "kesalahan", "pesan" => "Terjadi kesalahan: " . $conn->error(), "atxt" => "", "alnk" => ""]);
    }
  }

  $stmt->close();
  $conn->close();
}
?>

<?php
// Hapus notif
if (isset($_POST["HapusNotif"])) {
  require "../includes/db-connect.php";
  
  $notifId = htmlspecialchars($_POST["NotifId"]);

  $sql = "DELETE FROM reset_sandi WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $notifId);
  $stmt->execute();

  $stmt->close();
  $conn->close();
}
?>

<?php
if (isset($_POST["CekNotif"])) {
  require "../includes/db-connect.php";

  $sql = "SELECT id, cari_pengguna FROM reset_sandi";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $hasil = $stmt->get_result();

  if ($hasil->num_rows > 0) {
    ?>
    <div class="notif-container">
    <?php
    while ($baris = $hasil->fetch_assoc()) {
      ?>
        <a href="/pages/users/kelola-pengguna.php?search=<?php echo $baris['cari_pengguna'] ?>" class="notif-menu">
          <span class="material-symbols-rounded">passkey</span>
          <div class="notif-text">
            <h2>Permintaan reset sandi</h2>
            <p><?php echo $baris['cari_pengguna']; ?> meminta untuk mengatur ulang sandinya</p>
            <span onclick="hapusNotif(<?php echo $baris['id']; ?>, event)">Hapus</span>
          </div>
        </a>
      <?php
    }
    ?>
    </div>
    <?php
  } else {
    ?>
    <p class="no-notif">Tidak ada Notifikasi</p>
    <?php
  }
}
?>