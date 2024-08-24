<?php
require "../includes/db-connect.php";

// Untuk catat pengunjung
if (isset($_POST["simpan-pengunjung"])) {
  // Dapatkan semua field nama pengunjung
  $pengunjung_fields = array_filter($_POST, function($key) {
    return preg_match('/^nama-pengunjung/', $key);
  }, ARRAY_FILTER_USE_KEY);

  // Masukan data ke $namaPengunjung
  $namaPengunjung = '';
  foreach ($pengunjung_fields as $key => $value) {
    $namaPengunjung .= '<li>' . htmlspecialchars($value) . '</li>';
  }

  // Dapatkan semua field
  $namaPerusahaan = htmlspecialchars($_POST["nama-perusahaan"]);
  $tanggal = htmlspecialchars($_POST["tanggal"]);
  $noTlp = htmlspecialchars($_POST["no-tlp"]);

  // masukan ke database
  $sql = "INSERT INTO data_pengunjung (`id`, `nama_pengunjung`,	`nama_perusahaan`,	`tanggal`,	`nomor_telepon`) VALUES (null, '$namaPengunjung', '$namaPerusahaan', '$tanggal', '$noTlp');";
  if ($conn->query($sql) === TRUE) {
    // Kembalikan pengguna ke halaman sebelumnya
    header("Location: /pages/catat/catat-pengunjung.php");
  } else {
    echo "failed saving data" . $conn->error;
  }
}

// Untuk catat barang eksternal
if (isset($_POST["simpan-barang-ext"])) {
  // Dapatkan semua nama dan jumlah barang
  $nama_barang_fields = array_filter($_POST, function($key) {
    return preg_match('/^nama-barang/', $key);
  }, ARRAY_FILTER_USE_KEY);

  $jumlah_barang_fields = array_filter($_POST, function($key) {
    return preg_match('/^jumlah-barang/', $key);
  }, ARRAY_FILTER_USE_KEY);

  // Gabungkan nama barang dan jumlah barang
  $gabungBarang = [];
  foreach ($nama_barang_fields as $key => $nama) {
    $jumlah_key = str_replace("nama", "jumlah", $key);
    if (isset($jumlah_barang_fields[$jumlah_key])) {
      $jumlah = $jumlah_barang_fields[$jumlah_key];
      $gabungBarang[] = "<li>" . htmlspecialchars($nama) . ", " . htmlspecialchars($jumlah) . "</li>";
    }
  }

  $barang = '';
  foreach ($gabungBarang as $key) {
    $barang .= $key;
  }
  // Dapatkan semua field
  $tanggal = htmlspecialchars($_POST["tanggal"]);
  $namaDriver = htmlspecialchars($_POST["nama-driver"]);
  $namaSuplier = htmlspecialchars($_POST["nama-suplier"]);
  $keperluan = htmlspecialchars($_POST["keperluan"]);
  $jamKedatangan = htmlspecialchars($_POST["time-pp"]);
  $noKendaraan = htmlspecialchars($_POST["no-kendaraan"]);
  $keterangan = htmlspecialchars($_POST["keterangan"]);
  
  // masukan ke database
  $sql = "INSERT INTO data_barang_external (`id`,	`tanggal`,	`nama_driver`,	`nama_suplier`,	`keperluan`,	`nama_jumlah_barang`,	`nomor_kendaraan`,	`jam_kedatangan`, `keterangan`) VALUES (null, '$tanggal', '$namaDriver', '$namaSuplier', '$keperluan', '$barang', '$noKendaraan', '$jamKedatangan', '$keterangan');";
  if ($conn->query($sql) === TRUE) {
    // Kembalikan pengguna ke halaman sebelumnya
    header("Location: /pages/catat/catat-barang-ext.php");
  } else {
    echo "failed saving data" . $conn->error;
  }
}

// Untuk catat barang internal
if (isset($_POST["simpan-barang-int"])) {
  // Dapatkan semua nama dan jumlah barang
  $nama_barang_fields = array_filter($_POST, function($key) {
    return preg_match('/^nama-barang/', $key);
  }, ARRAY_FILTER_USE_KEY);

  $jumlah_barang_fields = array_filter($_POST, function($key) {
    return preg_match('/^jumlah-barang/', $key);
  }, ARRAY_FILTER_USE_KEY);

  // Gabungkan nama barang dan jumlah barang
  $gabungBarang = [];
  foreach ($nama_barang_fields as $key => $nama) {
    $jumlah_key = str_replace("nama", "jumlah", $key);
    if (isset($jumlah_barang_fields[$jumlah_key])) {
      $jumlah = $jumlah_barang_fields[$jumlah_key];
      $gabungBarang[] = "<li>" . htmlspecialchars($nama) . ", " . htmlspecialchars($jumlah) . "</li>";
    }
  }

  $barang = '';
  foreach ($gabungBarang as $key) {
    $barang .= $key;
  }
  // Dapatkan semua field
  $namaPembawa = htmlspecialchars($_POST["nama-pembawa"]);
  $tanggal = htmlspecialchars($_POST["tanggal"]);
  $keterangan = htmlspecialchars($_POST["keterangan"]);
  
  // masukan ke database
  $sql = "INSERT INTO data_barang_internal (`id`,	`nama_pembawa`,	`nama_jumlah_barang`,	`tanggal`,	`keterangan`) VALUES (null, '$namaPembawa', '$barang', '$tanggal', '$keterangan');";
  if ($conn->query($sql) === TRUE) {
    // Kembalikan pengguna ke halaman sebelumnya
    header("Location: /pages/catat/catat-barang-int.php");
  } else {
    echo "failed saving data" . $conn->error;
  }
}


// Untuk catat mobil
 if (isset($_POST["simpan-mobil"])) {
  // Dapatkan semua field
  $namaDriver = htmlspecialchars($_POST["nama-driver"]);
  $awalKm = htmlspecialchars($_POST["awal-km"]);
  $akhirKm = htmlspecialchars($_POST["akhir-km"]);
  $tujuan = htmlspecialchars($_POST["tujuan"]);
  $keperluan = htmlspecialchars($_POST["keperluan"]);

  // Cek merek mobil
  $merek = '';
  if ($_POST["merek-kendaraan"] == "Lainnya") {
    $merek = htmlspecialchars($_POST["merek-lain"]);
  } else {
    $merek = htmlspecialchars($_POST["merek-kendaraan"]);
  }

  // masukan ke database
  $sql = "INSERT INTO data_mobil (`id`, `nama_driver`, `merek_kendaraan`,	`km_awal`, `km_akhir`, `tujuan`, `keperluan`) VALUES (null, '$namaDriver', '$merek', '$awalKm', '$akhirKm', '$tujuan', '$keperluan');";
  if ($conn->query($sql) === TRUE) {
    // Kembalikan pengguna ke halaman sebelumnya
    header("Location: /pages/catat/catat-mobil.php");
  } else {
    echo "failed saving data" . $conn->error;
  }
 }
 ?>