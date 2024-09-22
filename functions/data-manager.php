<?php
// Fungsi
function konversiTanggal($tgl) {
  $bln = array(
    1 => "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember"
  );
  $pecahkan = explode("-", $tgl);
  return $pecahkan[2] . " " . $bln[(int)$pecahkan[1]] . " " . $pecahkan[0];
}
?>

<?php
// Proses simpan data
// Untuk catat pengunjung
if (isset($_POST["DataPengunjung"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  // Ambil data dari input pengguna
  $namaPengunjung = '';
  $namaPerusahaan = htmlspecialchars($_POST["NamaPerusahaan"]);
  $tanggal = htmlspecialchars($_POST["tanggal"]);
  $noTlp = htmlspecialchars($_POST["NomorTlp"]);

  // Dapatkan semua field nama pengunjung
  $pengunjung_fields = array_filter($_POST, function($key) {
    return preg_match('/^NamaPengunjung/', $key);
  }, ARRAY_FILTER_USE_KEY);

  // Masukan data ke $namaPengunjung
  foreach ($pengunjung_fields as $key => $value) {
    $namaPengunjung .= '<li>' . htmlspecialchars($value) . '</li>';
  }

  // Simpan
  if (isset($_POST["simpan"])) {
    // masukan ke database
    $sql = "INSERT INTO data_pengunjung (`id`, `nama_pengunjung`,	`nama_perusahaan`,	`tanggal`,	`no_telpon`) VALUES (null, ?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $namaPengunjung, $namaPerusahaan, $tanggal, $noTlp);
    if ($stmt->execute()) {
      // Kembalikan info berupa JSON
      echo json_encode(["status" => "success", "pesan" => "Data tersimpan", "atxt" => "Lihat", "alnk" => "/pages/lihat/lihat-pengunjung.php"]);
    } else {
      echo json_encode(["status" => "error", "pesan" => "Terjadi kesalahan", "atxt" => "", "alnk" => "", "errorMsg" => " . $conn->error ."]);
    }

    // Tutup pernyataan setelah selesai
    $stmt->close();
  }

  // Ubah
  if (isset($_POST["ubah"])) {
    $idData = htmlspecialchars($_POST["IdData"]);
    // masukan ke database
    $sql = "UPDATE data_pengunjung SET `nama_pengunjung` = ?, `nama_perusahaan` = ?, `tanggal` = ?, `no_telpon` = ? WHERE `id` = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $namaPengunjung, $namaPerusahaan, $tanggal, $noTlp, $idData);
    if ($stmt->execute()) {
      // Kembalikan info berupa JSON
      echo json_encode(["status" => "success", "pesan" => "Data diubah", "atxt" => "Lihat", "alnk" => "/pages/lihat/lihat-pengunjung.php"]);
    } else {
      echo json_encode(["status" => "error", "pesan" => "Terjadi kesalahan", "atxt" => "", "alnk" => "", "errorMsg" => " . $conn->error ."]);
    }

    // Tutup pernyataan setelah selesai
    $stmt->close();
  }
  
  $conn->close();
}


// Untuk catat barang eksternal
if (isset($_POST["DataBarangExt"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  // Dapatkan semua field
  $tanggal = htmlspecialchars($_POST["tanggal"]);
  $namaDriver = htmlspecialchars($_POST["NamaDriver"]);
  $namaSuplier = htmlspecialchars($_POST["NamaSuplier"]);
  $keperluan = htmlspecialchars($_POST["keperluan"]);
  $barang = '';
  $jamKedatangan = htmlspecialchars($_POST["JamKedatangan"]);
  $noKendaraan = htmlspecialchars($_POST["NoKendaraan"]);
  $keterangan = htmlspecialchars($_POST["keterangan"]);

  // Dapatkan semua nama dan jumlah barang
  $nama_barang_fields = array_filter($_POST, function($key) {
    return preg_match('/^NamaBarang/', $key);
  }, ARRAY_FILTER_USE_KEY);

  $jumlah_barang_fields = array_filter($_POST, function($key) {
    return preg_match('/^JumlahBarang/', $key);
  }, ARRAY_FILTER_USE_KEY);

  // Gabungkan nama barang dan jumlah barang
  $gabungBarang = [];
  foreach ($nama_barang_fields as $key => $nama) {
    $jumlah_key = str_replace("NamaBarang", "JumlahBarang", $key);
    if (isset($jumlah_barang_fields[$jumlah_key])) {
      $jumlah = $jumlah_barang_fields[$jumlah_key];
      $gabungBarang[] = "<li>" . htmlspecialchars($nama) . ", " . htmlspecialchars($jumlah) . "</li>";
    }
  }

  foreach ($gabungBarang as $key) {
    $barang .= $key;
  }
  
  // Simpan
  if (isset($_POST["simpan"])) {
    // masukan ke database
    $sql = "INSERT INTO data_barang_eksternal (`id`,	`tanggal`,	`nama_driver`,	`nama_suplier`,	`keperluan`,	`nama_jumlah_barang`,	`jam_kedatangan`,	`no_kendaraan`, `keterangan`) VALUES (null, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $tanggal, $namaDriver, $namaSuplier, $keperluan, $barang, $jamKedatangan, $noKendaraan, $keterangan);
    if ($stmt->execute()) {
      // Kembalikan info berupa JSON
      echo json_encode(["status" => "success", "pesan" => "Data tersimpan", "atxt" => "Lihat", "alnk" => "/pages/lihat/lihat-barang-ext.php"]);
    } else {
      echo json_encode(["status" => "error", "pesan" => "Terjadi kesalahan", "atxt" => "", "alnk" => "", "errorMsg" => " . $conn->error ."]);
    }
  
    // Tutup pernyataan setelah selesai
    $stmt->close();
  }

  // ubah
  if (isset($_POST["ubah"])) {
    $idData = htmlspecialchars($_POST["IdData"]);
    // masukan ke database
    $sql = "UPDATE data_barang_eksternal SET `tanggal` = ?, `nama_driver` = ?,	`nama_suplier` = ?,	`keperluan` = ?,	`nama_jumlah_barang` = ?,	`jam_kedatangan` = ?,	`no_kendaraan` = ?, `keterangan` = ? WHERE `id` = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $tanggal, $namaDriver, $namaSuplier, $keperluan, $barang, $jamKedatangan, $noKendaraan, $keterangan, $idData);
    if ($stmt->execute()) {
      // Kembalikan info berupa JSON
      echo json_encode(["status" => "success", "pesan" => "Data diubah", "atxt" => "Lihat", "alnk" => "/pages/lihat/lihat-barang-ext.php"]);
    } else {
      echo json_encode(["status" => "error", "pesan" => "Terjadi kesalahan", "atxt" => "", "alnk" => "", "errorMsg" => " . $conn->error ."]);
    }
  
    // Tutup pernyataan setelah selesai
    $stmt->close();
  }
  $conn->close();
}


// Untuk catat barang internal
if (isset($_POST["DataBarangInt"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  // Dapatkan semua field 
  $namaPembawa = htmlspecialchars($_POST["NamaPembawa"]);
  $barang = '';
  $tanggal = htmlspecialchars($_POST["tanggal"]);
  $keterangan = htmlspecialchars($_POST["keterangan"]);

  // Dapatkan semua nama dan jumlah barang
  $nama_barang_fields = array_filter($_POST, function($key) {
    return preg_match('/^NamaBarang/', $key);
  }, ARRAY_FILTER_USE_KEY);

  $jumlah_barang_fields = array_filter($_POST, function($key) {
    return preg_match('/^JumlahBarang/', $key);
  }, ARRAY_FILTER_USE_KEY);

  // Gabungkan nama barang dan jumlah barang
  $gabungBarang = [];
  foreach ($nama_barang_fields as $key => $nama) {
    $jumlah_key = str_replace("NamaBarang", "JumlahBarang", $key);
    if (isset($jumlah_barang_fields[$jumlah_key])) {
      $jumlah = $jumlah_barang_fields[$jumlah_key];
      $gabungBarang[] = "<li>" . htmlspecialchars($nama) . ", " . htmlspecialchars($jumlah) . "</li>";
    }
  }

  foreach ($gabungBarang as $key) {
    $barang .= $key;
  }
  
  // Simpan
  if (isset($_POST["simpan"])) {
    // masukan ke database
    $sql = "INSERT INTO data_barang_internal (`id`,	`nama_pembawa`,	`nama_jumlah_barang`,	`tanggal`,	`keterangan`) VALUES (null, ?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $namaPembawa, $barang, $tanggal, $keterangan);
    if ($stmt->execute()) {
      // Kembalikan info berupa JSON
      echo json_encode(["status" => "success", "pesan" => "Data tersimpan", "atxt" => "Lihat", "alnk" => "/pages/lihat/lihat-barang-int.php"]);
    } else {
      echo json_encode(["status" => "error", "pesan" => "Terjadi kesalahan", "atxt" => "", "alnk" => "", "errorMsg" => " . $conn->error ."]);
    }
  
    // Tutup pernyataan setelah selesai
    $stmt->close();
  }

  // Ubah
  if (isset($_POST["ubah"])) {
    $idData = htmlspecialchars($_POST["IdData"]);
    // masukan ke database
    $sql = "UPDATE data_barang_internal SET `nama_pembawa` = ?,	`nama_jumlah_barang` = ?,	`tanggal` = ?,	`keterangan` = ? WHERE `id` = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $namaPembawa, $barang, $tanggal, $keterangan, $idData);
    if ($stmt->execute()) {
      // Kembalikan info berupa JSON
      echo json_encode(["status" => "success", "pesan" => "Data diubah", "atxt" => "Lihat", "alnk" => "/pages/lihat/lihat-barang-int.php"]);
    } else {
      echo json_encode(["status" => "error", "pesan" => "Terjadi kesalahan", "atxt" => "", "alnk" => "", "errorMsg" => " . $conn->error ."]);
    }
  
    // Tutup pernyataan setelah selesai
    $stmt->close();
  }
  $conn->close();
}


// Untuk catat mobil
if (isset($_POST["DataMobil"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  // Dapatkan semua field
  $namaDriver = htmlspecialchars($_POST["NamaDriver"]);
  $merek = '';
  $awalKm = htmlspecialchars($_POST["AwalKm"]);
  $akhirKm = htmlspecialchars($_POST["AkhirKm"]);
  $tujuan = htmlspecialchars($_POST["tujuan"]);
  $keperluan = htmlspecialchars($_POST["keperluan"]);

  // Cek merek mobil
  if ($_POST["MerekKendaraan"] == "Lainnya") {
    $merek = htmlspecialchars($_POST["MerekLain"]);
  } else {
    $merek = htmlspecialchars($_POST["MerekKendaraan"]);
  }

  // simpan
  if (isset($_POST["simpan"])) {
    // masukan ke database
    $sql = "INSERT INTO data_mobil (`id`, `nama_driver`, `merek_kendaraan`,	`km_awal`, `km_akhir`, `tujuan`, `keperluan`) VALUES (null, ?, ?, ?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiss", $namaDriver, $merek, $awalKm, $akhirKm, $tujuan, $keperluan);
    if ($stmt->execute()) {
      // Kembalikan info berupa JSON
      echo json_encode(["status" => "success", "pesan" => "Data tersimpan", "atxt" => "Lihat", "alnk" => "/pages/lihat/lihat-mobil.php"]);
    } else {
      echo json_encode(["status" => "error", "pesan" => "Terjadi kesalahan", "atxt" => "", "alnk" => "", "errorMsg" => " . $conn->error ."]);
    }
    $stmt->close();
  }

  // Ubah
  if (isset($_POST["ubah"])) {
    $idData = htmlspecialchars($_POST["IdData"]);
    // masukan ke database
    $sql = "UPDATE data_mobil SET `nama_driver` = ?, `merek_kendaraan` = ?,	`km_awal` = ?, `km_akhir` = ?, `tujuan` = ?, `keperluan` = ? WHERE `id` = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiissi", $namaDriver, $merek, $awalKm, $akhirKm, $tujuan, $keperluan, $idData);
    if ($stmt->execute()) {
      // Kembalikan info berupa JSON
      echo json_encode(["status" => "success", "pesan" => "Data diubah", "atxt" => "Lihat", "alnk" => "/pages/lihat/lihat-mobil.php"]);
    } else {
      echo json_encode(["status" => "error", "pesan" => "Terjadi kesalahan", "atxt" => "", "alnk" => "", "errorMsg" => " . $conn->error ."]);
    }
    $stmt->close();
  }
  $conn->close();
}
?>


<?php
// Proses ambil data pengunjung
if (isset($_GET["dataPengunjung"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  $sql = "";
  if (isset($_GET["limit"])) {
    $sql = "SELECT * FROM data_pengunjung ORDER BY id DESC LIMIT 10";
  } else {
    $sql = "SELECT * FROM data_pengunjung ORDER BY id DESC";
  }
  $hasil = $conn->query($sql);
  if ($hasil->num_rows > 0) {
    $nomor = 1;
    ?>
    <table>
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pengunjung</th>
          <th scope="col">Nama Perusahaan</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col">Ubah Data</th>
        </tr>
      </thead>
      <tbody>
    <?php
    while ($baris = $hasil->fetch_assoc()) {
      ?>
      <tr>
        <td data-label="No" class="no">
          <p class="text-wrap"><?php echo $nomor; ?></p>
        </td>
        <td
          data-label="Nama Pengunjung"
          class="nama-pengunjung list"
        >
          <ul>
            <?php echo $baris['nama_pengunjung']; ?>
          </ul>
        </td>
        <td data-label="Nama Perusahaan" class="nama-perusahaan">
          <p class="text-wrap">
            <?php echo $baris['nama_perusahaan']; ?>
          </p>
        </td>
        <td data-label="Tanggal" class="tanggal">
          <p class="text-wrap"><?php echo konversiTanggal($baris["tanggal"]); ?></p>
        </td>
        <td data-label="Nomor Telepon" class="no-tlp">
          <p class="text-wrap">
            <?php echo $baris['no_telpon']; ?>
          </p>
        </td>
        <td data-label="Ubah Data" class="buttons">
          <div class="btn-cont">
            <button class="hapus material-symbols-rounded" onclick="hapusData(<?php echo $baris['id'] ?>, 'data_pengunjung')">
              delete
            </button>
            <button class="edit material-symbols-rounded" onclick="editPengunjung(this, <?php echo $baris['id'] ?>)">
              edit
            </button>
          </div>
        </td>
      </tr>
      <?php
      $nomor++;
    }
    ?>
      </tbody>
    </table>
    <?php
  } else {
    ?>
    <td>
      <h3>Data tidak tersedia</h3>
    </td>
    <?php
  }
  $conn->close();
}
?>


<?php
// Proses ambil data barang eksternal
if (isset($_GET["dataBarangEksternal"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  $sql = "";
  if (isset($_GET["limit"])) {
    $sql = "SELECT * FROM data_barang_eksternal ORDER BY id DESC LIMIT 10";
  } else {
    $sql = "SELECT * FROM data_barang_eksternal ORDER BY id DESC";
  }
  $hasil = $conn->query($sql);
  if ($hasil->num_rows > 0) {
    $nomor = 1;
    ?>
    <table>
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Nama Driver</th>
          <th scope="col">Nama Suplier</th>
          <th scope="col">Keperluan</th>
          <th scope="col">Nama & Jumlah Barang</th>
          <th scope="col">Nomor Kendaraan</th>
          <th scope="col">Jam Kedatangan</th>
          <th scope="col">Keterangan</th>
          <th scope="col">Ubah Data</th>
        </tr>
      </thead>
      <tbody>
    <?php
    while ($baris = $hasil->fetch_assoc()) {
      ?>
      <tr>
        <td data-label="No" class="no">
          <p class="text-wrap"><?php echo $nomor; ?></p>
        </td>
        <td data-label="Tanggal" class="tanggal">
          <p class="text-wrap"><?php echo konversiTanggal($baris["tanggal"]); ?></p>
        </td>
        <td data-label="Nama Pembawa" class="nama-pembawa">
          <p class="text-wrap">
            <?php echo $baris["nama_driver"]; ?>
          </p>
        </td>
        <td data-label="Nama Suplier" class="nama-suplier">
          <p class="text-wrap">
            <?php echo $baris["nama_suplier"]; ?>
          </p>
        </td>
        <td data-label="Keperluan" class="keperluan">
          <p class="text-wrap">
            <?php echo $baris["keperluan"]; ?>
          </p>
        </td>
        <td data-label="Barang" class="list">
          <ul>
            <?php echo $baris["nama_jumlah_barang"]; ?>
          </ul>
        </td>
        <td data-label="Nomor Kendaraan" class="no-kendaraan">
          <p class="text-wrap">
            <?php echo $baris["no_kendaraan"]; ?>
          </p>
        </td>
        <td data-label="Jam Kedatangan" class="time-pp">
          <p class="text-wrap"><?php echo $baris["jam_kedatangan"]; ?></p>
        </td>
        <td data-label="Keterangan" class="keterangan">
          <p class="text-wrap"><?php echo $baris["keterangan"]; ?></p>
        </td>
        <td data-label="Ubah Data" class="buttons">
          <div class="btn-cont">
            <button class="hapus material-symbols-rounded" onclick="hapusData(<?php echo $baris['id'] ?>, 'data_barang_eksternal')">
              delete
            </button>
            <button class="edit material-symbols-rounded" onclick="editBarangExt(this, <?php echo $baris['id'] ?>)">
              edit
            </button>
          </div>
        </td>
      </tr>
      <?php
      $nomor++;
    }
    ?>
      </tbody>
    </table>
    <?php
  } else {
    ?>
    <td>
      <h3>Data tidak tersedia</h3>
    </td>
    <?php
  }
  $conn->close();
}
?>


<?php
// Proses ambil data barang internal
if (isset($_GET["dataBarangInternal"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  $sql = "";
  if (isset($_GET["limit"])) {
    $sql = "SELECT * FROM data_barang_internal ORDER BY id DESC LIMIT 10";
  } else {
    $sql = "SELECT * FROM data_barang_internal ORDER BY id DESC";
  }
  $hasil = $conn->query($sql);
  if ($hasil->num_rows > 0) {
    $nomor = 1;
    ?>
    <table>
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Pembawa</th>
          <th scope="col">Nama & Jumlah Barang</th>
          <th scope="col">Tanggal</th>
          <th scope="col">keterangan</th>
          <th scope="col">Ubah Data</th>
        </tr>
      </thead>
      <tbody>
    <?php
    while ($baris = $hasil->fetch_assoc()) {
      ?>
      <tr>
        <td data-label="No" class="no">
          <p class="text-wrap"><?php echo $nomor; ?></p>
        </td>
        <td data-label="Nama Pembawa" class="nama-pembawa">
          <p class="text-wrap">
            <?php echo $baris['nama_pembawa']; ?>
          </p>
        </td>
        <td data-label="Barang" class="list">
          <ul>
            <?php echo $baris['nama_jumlah_barang']; ?>
          </ul>
        </td>
        <td data-label="Tanggal" class="tanggal">
          <p class="text-wrap"><?php echo konversiTanggal($baris["tanggal"]); ?></p>
        </td>
        <td data-label="Keterangan" class="keterangan">
          <p class="text-wrap">
            <?php echo $baris['keterangan']; ?>
          </p>
        </td>
        <td data-label="Ubah Data" class="buttons">
          <div class="btn-cont">
            <button class="hapus material-symbols-rounded" onclick="hapusData(<?php echo $baris['id'] ?>, 'data_barang_internal')">
              delete
            </button>
            <button class="edit material-symbols-rounded" onclick="editBarangInt(this, <?php echo $baris['id'] ?>)">
              edit
            </button>
          </div>
        </td>
      </tr>
      <?php
      $nomor++;
    }
    ?>
      </tbody>
    </table>
    <?php
  } else {
    ?>
    <td>
      <h3>Data tidak tersedia</h3>
    </td>
    <?php
  }
  $conn->close();
}
?>


<?php
// Proses ambil data kilometer mobil
if (isset($_GET["dataMobil"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  $sql = "";
  if (isset($_GET["limit"])) {
    $sql = "SELECT * FROM data_mobil ORDER BY id DESC LIMIT 10";
  } else {
    $sql = "SELECT * FROM data_mobil ORDER BY id DESC";
  }
  $hasil = $conn->query($sql);
  if ($hasil->num_rows > 0) {
    $nomor = 1;
    ?>
    <table>
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Driver</th>
          <th scope="col">Merek Kendaraan</th>
          <th scope="col">KM Awal</th>
          <th scope="col">KM Akhir</th>
          <th scope="col">Tujuan</th>
          <th scope="col">Keperluan</th>
          <th scope="col">Ubah Data</th>
        </tr>
      </thead>
      <tbody>
    <?php
    while ($baris = $hasil->fetch_assoc()) {
      ?>
      <tr>
        <td data-label="No" class="no">
          <p class="text-wrap"><?php echo $nomor; ?></p>
        </td>
        <td data-label="Nama Driver" class="nama-driver">
          <p class="text-wrap">
            <?php echo $baris['nama_driver']; ?>
          </p>
        </td>
        <td data-label="Merek Kendaraan" class="merek-kendaraan">
          <p class="text-wrap">
            <?php echo $baris['merek_kendaraan']; ?>
          </p>
        </td>
        <td data-label="KM Awal" class="awal-km">
          <p class="text-wrap"><?php echo $baris['km_awal']; ?></p>
        </td>
        <td data-label="KM Akhir" class="akhir-km">
          <p class="text-wrap"><?php echo $baris['km_akhir']; ?></p>
        </td>
        <td data-label="Tujuan" class="tujuan">
          <p class="text-wrap"><?php echo $baris['tujuan']; ?></p>
        </td>
        <td data-label="Keperluan" class="keperluan">
          <p class="text-wrap">
            <?php echo $baris['keperluan']; ?>
          </p>
        </td>
        <td data-label="Ubah Data" class="buttons">
          <div class="btn-cont">
            <button class="hapus material-symbols-rounded" onclick="hapusData(<?php echo $baris['id'] ?>, 'data_mobil')">
              delete
            </button>
            <button class="edit material-symbols-rounded" onclick="editMobil(this, <?php echo $baris['id'] ?>)">
              edit
            </button>
          </div>
        </td>
      </tr>
      <?php
      $nomor++;
    }
    ?>
      </tbody>
    </table>
    <?php
  } else {
    ?>
    <td>
      <h3>Data tidak tersedia</h3>
    </td>
    <?php
  }
  $conn->close();
}
?>

<?php
// Hapus data
if (isset($_POST["hapusData"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";
  $namaTabel = htmlspecialchars($_POST["namaTabel"]);
  $allowedTabel = ["data_pengunjung", "data_barang_eksternal", "data_barang_internal", "data_mobil"];
  if (!in_array($namaTabel, $allowedTabel)) {
    die("Nama tabel tidak valid!");
  }
  $idData = htmlspecialchars($_POST["idData"]);
  $sql = "DELETE FROM $namaTabel WHERE id = ?;";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $idData);
  if ($stmt->execute()) {
    echo json_encode(["status" => "berhasil", "pesan" => "Rekaman dihapus", "atxt" => "", "alnk" => ""]);
  } else {
    echo json_encode(["status" => "gagal", "pesan" => "Terjadi kesalahan, silahkan cek console", "atxt" => "", "alnk" => "", "pesanError" => $conn->error]);
  }
  $conn->close();
}
?>

<?php
// Tampilkan pengumuman
if (isset($_GET["lihatPengumuman"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";

  $sql = "SELECT * FROM pengumuman ORDER BY id DESC";
  $hasil = $conn->query($sql);
  
  if ($hasil->num_rows > 0) {
    if (isset($_GET["list"])) {
      while ($baris = $hasil->fetch_assoc()) {
        ?>
          <div class="list-pengumuman">
            <div class="pesan">
              <h2><?php echo $baris["judul_pengumuman"]; ?></h2>
              <p>
                <?php echo $baris["isi_pengumuman"]; ?>
              </p>
              <div class="tombol-aksi">
                <span onclick="editPengumuman(this, <?php echo $baris['id']; ?>)">Edit</span>
                <span onclick="hapusPengumuman(<?php echo $baris['id']; ?>)">Hapus</span>
              </div>
            </div>
          </div>
        <?php
      }
    } else {
      while ($baris = $hasil->fetch_assoc()) {
        ?>
          <div class="pengumuman">
            <span class="material-symbols-rounded">campaign</span>
            <div class="pesan">
              <h2><?php echo $baris["judul_pengumuman"]; ?></h2>
              <p>
                <?php echo $baris["isi_pengumuman"]; ?>
              </p>
            </div>
          </div>
        <?php
      }
    }
  }
  $conn->close();
}
?>

<?php
// simpan pengumuman
if (isset($_POST["SimpanPengumuman"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";

  $judul = htmlspecialchars($_POST["Judul"]);
  $isi = htmlspecialchars($_POST["Isi"]);

  $sql = "INSERT INTO pengumuman (`id`, `judul_pengumuman`, `isi_pengumuman`) VALUES (null, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $judul, $isi);

  if ($stmt->execute()) {
    echo json_encode(["status" => "berhasil", "pesan" => "Berhasil membuat pengumuman", "atxt" => "", "alnk" => ""]);
  } else {
    echo json_encode(["status" => "gagal", "pesan" => "Kesalahan dalam membuat pengumuman", "atxt" => "", "alnk" => ""]);
  }

  $stmt->close();
  $conn->close();
}
?>

<?php
// Hapus pengumuman
if (isset($_POST["HapusPengumuman"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";

  $id = htmlspecialchars($_POST["Id"]);

  $sql = "DELETE FROM pengumuman WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $id);

  if ($stmt->execute()) {
    echo json_encode(["status" => "berhasil", "pesan" => "Berhasil menghapus pengumuman", "atxt" => "", "alnk" => ""]);
  } else {
    echo json_encode(["status" => "gagal", "pesan" => "Kesalahan dalam menghapus pengumuman", "atxt" => "", "alnk" => ""]);
  }

  $stmt->close();
  $conn->close();
}
?>

<?php
// simpan perubahan
if (isset($_POST["SimpanPerubahan"])) {
  require $_SERVER['DOCUMENT_ROOT'] . "/includes/db-connect.php";

  $id = htmlspecialchars($_POST["Id"]);
  $judul = htmlspecialchars($_POST["Judul"]);
  $isi = htmlspecialchars($_POST["Isi"]);

  $sql = "UPDATE pengumuman SET `judul_pengumuman` = ?, `isi_pengumuman` = ? WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssi", $judul, $isi, $id);

  if ($stmt->execute()) {
    echo json_encode(["status" => "berhasil", "pesan" => "Berhasil mengubah pengumuman", "atxt" => "", "alnk" => ""]);
  } else {
    echo json_encode(["status" => "gagal", "pesan" => "Kesalahan dalam mengubah pengumuman", "atxt" => "", "alnk" => ""]);
  }

  $stmt->close();
  $conn->close();
}
?>