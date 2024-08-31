<?php
// Tampilkan semua pengguna
if (isset($_GET["dataPengguna"])) {
  require "../includes/db-connect.php";
  $sql = "SELECT * FROM users";
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
              <?php if ($baris['role_user'] === 'Admin') { ?>
              <p class="id-email"><?php echo $baris['email_user'] ?></p>
              <?php } else { ?>
              <p class="id-email"><?php echo $baris['id_user'] ?></p>
              <?php } ?>
            </div>
          </div>
          <div class="right">
            <p class="role"><?php echo $baris['role_user'];?></p>
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
      $sql = "INSERT INTO users (`id`, `id_user`, `email_user`, `nama_user`, `role_user`, `user_passwd`) VALUES (null, null, ?, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("ssss", $emailUser, $namaUser, $tipeUser, $sandiUser);
    } else if ($emailUser === "") {
      $sql = "INSERT INTO users (`id`, `id_user`, `email_user`, `nama_user`, `role_user`, `user_passwd`) VALUES (null, ?, null, ?, ?, ?)";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("isss", $idUser, $namaUser, $tipeUser, $sandiUser);
    }
    
    $stmt->execute();
    echo json_encode(["status" => "berhasil", "pesan" => "Berhasil menambah pengguna", "atxt" => "", "alnk" => ""]);
  } catch (mysqli_sql_exception $kesalahan) {
    if ($kesalahan->getCode() == 1062) {
      echo json_encode(["status" => "gagal", "pesan" => "Id User atau Email sudah ada!", "atxt" => "", "alnk" => ""]);
    } else {
      echo json_encode(["status" => "kesalahan", "pesan" => "Terjadi kesalahan pada server", "atxt" => "", "alnk" => ""]);
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
  $sql = "DELETE FROM users WHERE id = ?;";
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