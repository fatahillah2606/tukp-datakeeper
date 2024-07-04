function tambahData() {
  // Ambil nilai dari input form
  let namaPembawa = document.getElementById('namaPembawa').value;
  let namaBarang = document.getElementById('namaBarang').value;
  let jumlahBarang = document.getElementById('jumlahBarang').value;
  let tanggal = document.getElementById('tanggal').value;

  // Validasi input
  if (!namaPembawa || !namaBarang || !jumlahBarang || !tanggal) {
    alert('Semua kolom harus diisi!');
    return;
  }

  // Tampilkan pesan konfirmasi
  alert(`Data ditambahkan:\nNama Pembawa: ${namaPembawa}\nNama Barang: ${namaBarang}\nJumlah Barang: ${jumlahBarang}\nTanggal: ${tanggal}`);
}

function ubahData() {
  // Ambil nilai dari input form
  let namaPembawa = document.getElementById('namaPembawa').value;
  let namaBarang = document.getElementById('namaBarang').value;
  let jumlahBarang = document.getElementById('jumlahBarang').value;
  let tanggal = document.getElementById('tanggal').value;

  // Validasi input
  if (!namaPembawa || !namaBarang || !jumlahBarang || !tanggal) {
    alert('Semua kolom harus diisi!');
    return;
  }

  // Tampilkan pesan konfirmasi
  alert(`Data diubah:\nNama Pembawa: ${namaPembawa}\nNama Barang: ${namaBarang}\nJumlah Barang: ${jumlahBarang}\nTanggal: ${tanggal}`);
}

function simpanData() {
  // Ambil nilai dari input form
  let namaPembawa = document.getElementById('namaPembawa').value;
  let namaBarang = document.getElementById('namaBarang').value;
  let jumlahBarang = document.getElementById('jumlahBarang').value;
  let tanggal = document.getElementById('tanggal').value;

  // Validasi input
  if (!namaPembawa || !namaBarang || !jumlahBarang || !tanggal) {
    alert('Semua kolom harus diisi!');
    return;
  }

  // Tampilkan pesan konfirmasi
  alert(`Data disimpan:\nNama Pembawa: ${namaPembawa}\nNama Barang: ${namaBarang}\nJumlah Barang: ${jumlahBarang}\nTanggal: ${tanggal}`);
}
