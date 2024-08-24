<?php
// Data simulasi dari $_POST
$_POST = [
    'nama-pengunjung' => 'Fazri',
    'nama-pengunjung-1' => 'Zaki',
    'nama-pengunjung-2' => 'Al Aziz',
    'umur-pengunjung' => 20,
    'umur-pengunjung-1' => 25,
    'umur-pengunjung-2' => 30,
];

// Memisahkan data nama dan umur pengunjung
$nama_pengunjung = array_filter($_POST, function($key) {
    return preg_match('/^nama-pengunjung/', $key);
}, ARRAY_FILTER_USE_KEY);

$umur_pengunjung = array_filter($_POST, function($key) {
    return preg_match('/^umur-pengunjung/', $key);
}, ARRAY_FILTER_USE_KEY);

// Menggabungkan nama dan umur
$hasil_penggabungan = [];
foreach ($nama_pengunjung as $key => $nama) {
    // Mencari kunci yang sesuai di array umur
    $umur_key = str_replace('nama', 'umur', $key);
    if (isset($umur_pengunjung[$umur_key])) {
        $umur = $umur_pengunjung[$umur_key];
        $hasil_penggabungan[] = "Umur $nama adalah $umur tahun";
    }
}

// Menampilkan hasil
foreach ($hasil_penggabungan as $hasil) {
    echo $hasil . PHP_EOL;
}
?>
