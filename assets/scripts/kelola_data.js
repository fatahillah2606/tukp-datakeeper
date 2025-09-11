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
                    let dataBarang = "";
                    let isiDataBarang = JSON.parse(laporan.nama_jumlah_barang);

                    isiDataBarang.forEach((barang) => {
                        dataBarang += `
                        <li>${barang.nama_barang}, ${barang.jumlah_barang} </li>
                        `;
                    });

                    konten += `
                        <tr>
                            <th scope="row">${nomor}</th>
                            <td>${laporan.nama_pembawa}</td>
                            <td>${dataBarang}</td>
                            <td>${formatTanggal(laporan.tanggal)}</td>
                            <td>${laporan.keterangan}</td>
                            <td class="action-btn">
                            <a href="/pages/edit-data/barang-internal.php">
                                <button class="btn btn-success" <button class="btn btn-success"    onclick="window.location.href='/pages/edit-data/barang-internal.php'">
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
                                <a href="/pages/print/print-barang-internal.php?id_barang=${
                                    laporan.id_barang_internal
                                }" target="_blank" class="btn btn-primary">
                                   <span class="material-symbols-rounded">print</span>
                                </a>
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

// Muat data barang eksternal
function muatDataBarangEksternal(limit) {
    let url;
    let isiTabel = document.getElementById("isi-tabel");
    let konten = "";

    // Jika diminta limit
    if (limit) {
        url = "/backend/kelola_data.php?data_eksternal&limit=" + limit;
    } else {
        url = "/backend/kelola_data.php?data_eksternal";
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
                    let dataBarang = "";
                    let isiDataBarang = JSON.parse(laporan.nama_jumlah_barang);

                    isiDataBarang.forEach((barang) => {
                        dataBarang += `
                        <li>${barang.nama_barang}, ${barang.jumlah_barang} </li>
                        `;
                    });

                    konten += `
                        <tr>
                            <th scope="row">${nomor}</th>
                            <td>${laporan.nama_driver}</td>
                            <td>${laporan.nama_suplier}</td>
                            <td>${dataBarang}</td>
                            <td>${formatTanggal(laporan.tanggal)}</td>
                            <td>${laporan.jam_kedatangan}</td>
                            <td>${laporan.no_kendaraan}</td>
                            <td>${laporan.keterangan}</td>
                            <td class="action-btn">
                                <button class="btn btn-success"    onclick="window.location.href='/pages/edit-data/barang-eksternal.php'">
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

// Muat data mobil
function muatDataMobil(limit) {
    let url;
    let isiTabel = document.getElementById("isi-tabel");
    let konten = "";

    // Jika diminta limit
    if (limit) {
        url = "/backend/kelola_data.php?data_mobil&limit=" + limit;
    } else {
        url = "/backend/kelola_data.php?data_mobil";
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
                            <td>${laporan.nama_driver}</td>
                            <td>${laporan.merek_kendaraan}</td>
                            <td>${laporan.no_kendaraan}</td>
                            <td>${formatTanggal(laporan.tanggal)}</td>
                            <td>${laporan.km_awal}</td>
                            <td>${laporan.km_akhir}</td>
                            <td>${laporan.tujuan}</td>
                            <td>${laporan.keperluan}</td>
                            <td class="action-btn">
                                <button class="btn btn-success"    onclick="window.location.href='/pages/edit-data/mobil.php'">
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

// Muat data pengunjung
function muatDataPengunjung(limit) {
    let url;
    let isiTabel = document.getElementById("isi-tabel");
    let konten = "";

    // Jika diminta limit
    if (limit) {
        url = "/backend/kelola_data.php?data_pengunjung&limit=" + limit;
    } else {
        url = "/backend/kelola_data.php?data_pengunjung";
    }

    // Fetch API
    fetch(url, {
        method: "GET",
    })
        .then(async (response) => {
            const data = await response.json();
            if (!response.ok) {
                throw new Error("Gagal terhubung ke server");
            }
            return data;
        })
        .then((data) => {
            if (data.code === 200) {
                laporan = data.data;
                nomor = 1;
                data.data.forEach((laporan) => {
                    let dataPengunjung = "";
                    let isiDataPengunjung = JSON.parse(laporan.nama_pengunjung);
                    console.log(isiDataPengunjung);
                    isiDataPengunjung.forEach((pengunjung) => {
                        dataPengunjung += `
                        <li>${pengunjung}</li>
                        `;
                    });

                    konten += `
                        <tr>
                            <th scope="row">${nomor}</th>
                            <td>${dataPengunjung}</td>
                            <td>${laporan.nama_perusahaan}</td>
                            <td>${laporan.no_kendaraan}</td>
                            <td>${formatTanggal(laporan.tanggal)}</td>
                            <td>${laporan.no_telpon}</td>
                            <td>${laporan.keperluan}</td>
                            <td>${laporan.safety_induction}</td>
                            <td class="action-btn">
                                <button class="btn btn-success"    onclick="window.location.href='/pages/edit-data/pengunjung.php'">
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
