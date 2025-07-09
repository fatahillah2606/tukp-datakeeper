function formatTanggal(tanggalString) {
    // Buat objek Date dari string tanggal
    const tanggal = new Date(tanggalString);

    // Array nama bulan dalam bahasa Indonesia
    const namaBulan = [
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

    // Dapatkan hari, bulan, dan tahun
    const hari = tanggal.getDate();
    const bulan = namaBulan[tanggal.getMonth()]; // getMonth() mengembalikan indeks 0-11
    const tahun = tanggal.getFullYear();

    // Gabungkan menjadi format yang diinginkan
    return `${hari} ${bulan} ${tahun}`;
}

// Muat data barang internal
function muatDataBarangInternal(limit) {
    let url;
    let isiTabel = document.getElementById("isi-tabel");
    let konten = "";

    // Jika diminta limit
    if (limit) {
        url = "/backend/kelola_data.php?data_internal&limit=" + limit;
    } else {
        url = "/backend/kelola_data.php?data_internal";
    }

    // Fetch API
    fetch(url, {
        method: "GET",
    })
        .then((response) => {
            if (!response.ok) {
                throw new Error("Gagal terhubung ke server");
            }
            return response.json();
        })
        .then((data) => {
            if (data.code === 200) {
                laporan = data.data;
                nomor = 1;
                data.data.forEach((laporan) => {
                    konten += `
                        <tr>
                            <th scope="row">${nomor}</th>
                            <td>${laporan.nama_pembawa}</td>
                            <td>${laporan.nama_jumlah_barang}</td>
                            <td>${formatTanggal(laporan.tanggal)}</td>
                            <td>${laporan.keterangan}</td>
                            <td class="action-btn">
                                <button class="btn btn-success">
                                    <span
                                        class="material-symbols-rounded"
                                    >
                                        edit
                                    </span>
                                </button>
                                <button class="btn btn-danger">
                                    <span
                                        class="material-symbols-rounded"
                                    >
                                        delete
                                    </span>
                                </button>
                            </td>
                        </tr>
                    `;
                    nomor++;
                });
                isiTabel.innerHTML = konten;
            }
        })
        .catch((error) => {
            console.error(error);
        });
}
