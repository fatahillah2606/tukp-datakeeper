<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Surat Jalan - Barang Internal</title>
  <!-- (Opsional) Bootstrap hanya untuk grid & tabel saat preview -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

  <style>
    /* Typography & layout dasar */
    :root {
      --text: #000;
      --muted: #555;
      --line: #000;
    }
    html, body {
      color: var(--text);
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
      font-size: 13px;
      background: #fff;
    }
    .wrap {
      max-width: 820px; /* kira-kira lebar A4 minus margin */
      margin: 0 auto;
      padding: 28px 36px;
    }

    /* Kop surat */
    .kop {
      text-align: center;
      margin-bottom: 10px;
    }
    .kop h5 {
      margin: 0;
      font-weight: 700;
    }
    .kop small {
      color: var(--muted);
      display: block;
    }
    .divider {
      border-top: 2px solid var(--line);
      margin: 10px 0 16px;
    }

    /* Heading */
    .heading {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 12px;
    }
    .heading small {
      color: var(--muted);
    }

    /* Meta table */
    .meta {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 8px;
    }
    .meta td {
      padding: 4px 6px;
      vertical-align: top;
    }
    .meta td:first-child {
      width: 170px;
      white-space: nowrap;
      font-weight: 600;
    }
    .meta td:nth-child(2) {
      width: 10px;
    }

    /* Tanda tangan */
    .ttd {
      margin-top: 48px;
    }
    .ttd .col-6 {
      text-align: center;
    }
    .ttd .line-sign {
      margin-top: 56px;
      display: inline-block;
      border-top: 1px solid #000;
      width: 240px;
      height: 1px;
    }

    /* Tombol non-cetak */
    .noprint {
      margin-top: 18px;
    }

    /* Print styles */
    @media print {
      @page { size: A4; margin: 14mm; }
      .noprint { display: none !important; }
      body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
      a, button { display: none !important; }
    }

    /* Box opsional untuk detail item jika diperlukan nanti */
    .box {
      border: 1px solid #333;
      border-radius: 8px;
      padding: 12px;
    }
  </style>
</head>
<body onload="window.print()">
  <div class="wrap">
    <!-- KOP SURAT -->
    <div class="kop">
      <h5>PT Taland Utama Karisma Perkasa</h5>
      <small>TUKP Data Keeper</small>
    </div>
    <div class="divider"></div>

    <!-- JUDUL & NOMOR -->
    <div class="heading">
      <div>
        <h6 class="mb-0"><strong>SURAT JALAN BARANG INTERNAL</strong></h6>
        <small>Dokumen ini dicetak otomatis dari sistem</small>
      </div>
      <div class="text-end">
        <small>No. Transaksi: <strong id="noTransaksi">#-</strong></small><br />
        <small>Tanggal: <strong id="tglTransaksi">-</strong></small>
      </div>
    </div>

    <!-- INFORMASI UTAMA -->
    <table class="meta">
      <tr>
        <td>Nama Pembawa</td>
        <td>:</td>
        <td id="namaPembawa">-</td>
      </tr>
      <tr>
        <td>Nama & Jumlah Barang</td>
        <td>:</td>
        <td id="namaBarang">-</td>
      </tr>
      <tr>
        <td>Keterangan</td>
        <td>:</td>
        <td id="keterangan">-</td>
      </tr>
    </table>

    <!-- (Opsional) DETAIL ITEM KALAU NANTI PERLU
    <div class="box mt-2">
      <table class="table table-sm table-bordered mb-0">
        <thead>
          <tr>
            <th>Nama Item</th>
            <th class="text-end" style="width:90px">Qty</th>
            <th style="width:120px">Satuan</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Contoh Item</td>
            <td class="text-end">1</td>
            <td>Unit</td>
            <td>-</td>
          </tr>
        </tbody>
      </table>
    </div>
    -->

    <!-- TANDA TANGAN -->
    <div class="row ttd">
      <div class="col-6">
        <p>Penerima</p>
        <span class="line-sign"></span>
      </div>
      <div class="col-6">
        <p>Petugas Keamanan</p>
        <span class="line-sign"></span>
      </div>
    </div>

    <!-- Tombol non-cetak untuk uji coba -->
    <div class="noprint">
      <button class="btn btn-secondary" onclick="window.print()">Print Lagi</button>
      <a href="javascript:history.back()" class="btn btn-outline-secondary">Kembali</a>
    </div>
  </div>

  <script>
    // Isi konten dari query string (opsional)
    // Contoh: ?id=12&tanggal=2025-09-03&nama_pembawa=Andika&nama_barang=Laptop%20x1&keterangan=Urgent
    (function() {
      const p = new URLSearchParams(location.search);

      // Ambil nilai dari URL jika ada, kalau tidak pakai placeholder
      const id           = p.get('id') || '-';
      const tanggal      = p.get('tanggal') || '-';
      const namaPembawa  = p.get('nama_pembawa') || '-';
      const namaBarang   = p.get('nama_barang') || '-';_
