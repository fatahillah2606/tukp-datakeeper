<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <title>Surat Jalan - Barang Internal</title>

        <!-- (Opsional) Bootstrap untuk grid & tabel saat preview -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        />

        <style>
            :root {
                --text: #000;
                --muted: #555;
                --line: #000;
            }

            html,
            body {
                color: var(--text);
                font-family: system-ui, -apple-system, "Segoe UI", Roboto,
                    "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans",
                    "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
                font-size: 13px;
                background: #fff;
            }

            .wrap {
                max-width: 820px; /* mendekati lebar A4 - margin */
                margin: 0 auto;
                padding: 28px 36px;
            }

            /* Kop surat */
            .kop {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }

            .kop-logo {
                flex: 0 0 70px; /* lebar area logo */
                text-align: center;
            }

            .kop-logo img {
                height: 55px; /* tinggi logo supaya proporsional */
            }

            .kop-info {
                flex: 1;
                text-align: center;
                max-width: 600px; /* batasi agar alamat tidak melebar */
                margin: 0 auto;
                line-height: 1.4;
            }

            .kop-info h5 {
                margin: 0;
                font-weight: 600; /* lebih tebal */
                font-size: 15px; /* lebih besar */
                text-transform: uppercase; /* opsional: huruf besar semua */
            }

            .kop-info small {
                display: block;
                color: var(--muted);
                white-space: normal; /* biar wrap kalau teks panjang */
                word-wrap: break-word;
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

            /* Tabel meta */
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
                white-space: nowrap;
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
                @page {
                    size: A4;
                    margin: 14mm;
                }
                .noprint {
                    display: none !important;
                }
                body {
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }
                a,
                button {
                    display: none !important;
                }
            }

            /* Box opsional untuk detail item */
            .box {
                border: 1px solid #333;
                border-radius: 8px;
                padding: 12px;
            }
        </style>
    </head>
    <body>
        <div class="wrap">
            <!-- KOP SURAT -->
            <header class="kop">
                <div class="kop-logo">
                    <img src="/assets/images/logo.svg" alt="Logo TUKP" />
                </div>
                <div class="kop-info">
                    <h5>PT Taland Utama Karisma Perkasa</h5>
                    <small
                        >Jalan Kampung Cikoneng Ilir No.26 RT 003/ RW 007 Kel.
                        Jatake, Kec. Jatiuwung, Kota Tangerang</small
                    >
                    <small
                        >Telp: (021) 55660856 | Email: info@pttaland.com</small
                    >
                    <small>Website : www.pttaland.com</small>
                </div>
            </header>
            <div class="divider" aria-hidden="true"></div>

            <!-- JUDUL & NOMOR -->
            <section class="heading">
                <div>
                    <h6 class="mb-0">
                        <strong>Surat Jalan Barang</strong>
                    </h6>
                    <small>Dokumen ini dicetak otomatis dari sistem</small>
                </div>
                <div class="text-end">
                    <small>Tanggal: <strong id="tglTransaksi">-</strong></small>
                </div>
            </section>

            <!-- INFORMASI UTAMA -->
            <table class="meta">
                <tr>
                    <td>Nama Pembawa</td>
                    <td>:</td>
                    <td id="namaPembawa">-</td>
                </tr>
                <tr>
                    <td>Nama &amp; Jumlah Barang</td>
                    <td>:</td>
                    <td id="namaBarang">-</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td id="keterangan">-</td>
                </tr>
            </table>

            <!-- (Opsional) DETAIL ITEM
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
            <section class="row ttd">
                <div class="col-6">
                    <p>Penerima</p>
                    <span class="line-sign"></span>
                </div>
                <div class="col-6">
                    <p>Petugas Keamanan</p>
                    <span class="line-sign"></span>
                </div>
            </section>

            <!-- Tombol non-cetak untuk uji coba -->
            <div class="noprint">
                <button class="btn btn-secondary" onclick="window.print()">
                    Print Lagi
                </button>
                <a
                    href="javascript:history.back()"
                    class="btn btn-outline-secondary"
                    >Kembali</a
                >
            </div>
        </div>

        <script>
            // Format tanggal IDN (contoh input: 2025-09-03)
            function formatTanggalID(isoLike) {
                if (!isoLike || isoLike === "-") return "-";
                const d = new Date(isoLike);
                if (Number.isNaN(d.getTime())) return isoLike; // fallback kalau bukan tanggal valid
                const bulan = [
                    "Januari",
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
                    "Desember",
                ];
                return `${d.getDate()} ${
                    bulan[d.getMonth()]
                } ${d.getFullYear()}`;
            }

            (function initFromQuery() {
                const p = new URLSearchParams(location.search);

                const idBarang = p.get("id_barang") || "-";

                fetch("/backend/kelola_data.php?barang_internal=" + idBarang, {
                    method: "GET",
                })
                    .then(async (respon) => {
                        const data = await respon.json();
                        if (!respon.ok) {
                            throw new Error("Terjadi kesalahan");
                        }
                        return data;
                    })
                    .then((data) => {
                        const dataBarang = data.data;
                        let barangDibawa = JSON.parse(
                            dataBarang.nama_jumlah_barang
                        );

                        // looping barang yang dibawa biar jadi nomor
                        let listBarang = "<ol>";
                        barangDibawa.forEach((barang) => {
                            listBarang += `
                                <li>${barang.nama_barang}: ${barang.jumlah_barang}</li>
                            `;
                        });
                        listBarang += "</ol>";

                        // Tampilkan datanya
                        document.getElementById("tglTransaksi").textContent =
                            formatTanggalID(dataBarang.tanggal);
                        document.getElementById("namaPembawa").textContent =
                            dataBarang.nama_pembawa;
                        document.getElementById("namaBarang").innerHTML =
                            listBarang;
                        document.getElementById("keterangan").textContent =
                            dataBarang.keterangan;

                        // Print dokumen setelah data dimuat
                        window.print();
                    })
                    .catch((error) => {
                        console.error("Kesalahan: " + error);
                    });

                // Dari chatgpt
                const tanggal = p.get("tanggal") || "-";
                const namaPembawa = p.get("nama_pembawa") || "-";
                const namaBarang = p.get("nama_barang") || "-";
                const keterangan = p.get("keterangan") || "-";
            })();
        </script>
    </body>
</html>
