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
// 🔹 Variabel global
let semuaBarangInternal = [];

// 🔹 Fungsi muat data barang internal
function muatDataBarangInternal(limit) {
    let url = limit
        ? "/backend/kelola_data.php?data_internal&limit=" + limit
        : "/backend/kelola_data.php?data_internal";

    fetch(url)
        .then((res) => res.json())
        .then((data) => {
            if (data.code === 200) {
                semuaBarangInternal = data.data; // simpan global
                renderBarangInternal(semuaBarangInternal); // tampilkan default
            }
        })
        .catch((err) => console.error(err));
}

// 🔹 Fungsi render tabel barang internal
function renderBarangInternal(list) {
    let isiTabel = document.getElementById("isi-tabel-internal");
    let konten = "";

    list.forEach((laporan, nomor) => {
        let dataBarang = "";
        try {
            JSON.parse(laporan.nama_jumlah_barang).forEach((b) => {
                dataBarang += `<li>${b.nama_barang}, ${b.jumlah_barang}</li>`;
            });
        } catch (e) {
            console.error("Gagal parse barang:", e);
        }

        konten += `
            <tr>
                <td>${nomor + 1}</td>
                <td>${laporan.nama_pembawa}</td>
                <td>${dataBarang}</td>
                <td>${formatTanggal(laporan.tanggal)}</td>
                <td>${laporan.keterangan}</td>
                <td class="action-btn">
                    <button class="btn btn-success" onclick="window.location.href='/pages/edit-data/barang-internal.php?id_barang_internal=${
                        laporan.id_barang_internal
                    }'">
                        <span class="material-symbols-rounded">edit</span>
                    </button>
                    <button class="btn btn-danger" onclick="hapusBarangInternal(${
                        laporan.id_barang_internal
                    })">
                        <span class="material-symbols-rounded">delete</span>
                    </button>
                    <a href="/pages/print/print-barang-internal.php?id_barang=${
                        laporan.id_barang_internal
                    }" target="_blank" class="btn btn-primary">
                        <span class="material-symbols-rounded">print</span>
                    </a>
                </td>
            </tr>
        `;
    });

    isiTabel.innerHTML =
        konten || `<tr><td colspan="6">Data tidak ditemukan</td></tr>`;
}

// 🔎 Search khusus internal
let searchInternal = document.getElementById("search-internal");
if (searchInternal) {
    searchInternal.addEventListener("click", function (e) {
        e.preventDefault();
        const keyword = document
            .getElementById("search-bar-internal")
            .value.toLowerCase();

        const hasil = semuaBarangInternal.filter((item) => {
            // cek field utama + tanggal
            const cocokFieldUtama =
                String(item.nama_pembawa || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.keterangan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.tanggal || "")
                    .toLowerCase()
                    .includes(keyword) || // format DB (YYYY-MM-DD)
                formatTanggal(item.tanggal).toLowerCase().includes(keyword); // format Indonesia

            // cek di barang JSON
            let cocokBarang = false;
            try {
                const barangList = JSON.parse(item.nama_jumlah_barang);
                cocokBarang = barangList.some(
                    (b) =>
                        String(b.nama_barang || "")
                            .toLowerCase()
                            .includes(keyword) ||
                        String(b.jumlah_barang || "")
                            .toLowerCase()
                            .includes(keyword)
                );
            } catch (e) {
                console.error("Parse error:", e);
            }

            return cocokFieldUtama || cocokBarang;
        });

        renderBarangInternal(hasil);
    });
}

// Hapus barang Internal
function hapusBarangInternal(idData) {
    const dataBarangInternal = {
        hapus_barang_internal: true,
        id_barang_internal: idData,
    };

    if (confirm("Yakin ingin menghapus data ini?") === true) {
        fetch("/backend/kelola_data.php?hapus_data_barang_internal=true", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(dataBarangInternal),
        })
            .then(async (response) => {
                const data = await response.json();
                if (!response.ok) {
                    throw new Error(data.message || "Terjadi kesalahan");
                }
                return data;
            })
            .then((data) => {
                alert(data.message);
                muatDataBarangInternal();
            })
            .catch((error) => {
                console.error(error);
            });
    }
}

// Muat data barang eksternal
// 🔹 Variabel global
let semuaBarangEksternal = [];

// 🔹 Fungsi muat data barang eksternal
function muatDataBarangEksternal(limit) {
    let url = limit
        ? "/backend/kelola_data.php?data_eksternal&limit=" + limit
        : "/backend/kelola_data.php?data_eksternal";

    fetch(url)
        .then((res) => res.json())
        .then((data) => {
            if (data.code === 200) {
                semuaBarangEksternal = data.data; // simpan global
                renderBarangEksternal(semuaBarangEksternal); // tampilkan default
            }
        })
        .catch((err) => console.error(err));
}

// 🔹 Fungsi render tabel barang eksternal
function renderBarangEksternal(list) {
    let isiTabel = document.getElementById("isi-tabel-eksternal");
    let konten = "";

    list.forEach((laporan, nomor) => {
        let dataBarang = "";
        try {
            JSON.parse(laporan.nama_jumlah_barang).forEach((b) => {
                dataBarang += `<li>${b.nama_barang}, ${b.jumlah_barang}</li>`;
            });
        } catch (e) {
            console.error("Gagal parse barang:", e);
        }

        konten += `
            <tr>
                <td>${nomor + 1}</td>
                <td>${laporan.nama_driver}</td>
                <td>${laporan.nama_suplier}</td>
                <td>${dataBarang}</td>
                <td>${formatTanggal(laporan.tanggal)}</td>
                <td>${laporan.jam_kedatangan}</td>
                <td>${laporan.no_kendaraan}</td>
                <td>${laporan.keterangan}</td>
                <td class="action-btn">
                    <!-- Tombol Edit -->
                    <button class="btn btn-success" 
                        onclick="window.location.href='/pages/edit-data/barang-eksternal.php?id_barang_eksternal=${
                            laporan.id_barang_eksternal
                        }'">
                        <span class="material-symbols-rounded">edit</span>
                    </button>

                    <!-- Tombol Hapus -->
                    <button class="btn btn-danger" 
                        onclick="hapusBarangEksternal(${
                            laporan.id_barang_eksternal
                        })">
                        <span class="material-symbols-rounded">delete</span>
                    </button>
                </td>
            </tr>
        `;
    });

    isiTabel.innerHTML =
        konten || `<tr><td colspan="10">Data tidak ditemukan</td></tr>`;
}

// 🔎 Search khusus eksternal
let searchExternal = document.getElementById("search-eksternal");
if (searchExternal) {
    searchExternal.addEventListener("click", function (e) {
        e.preventDefault();
        const keyword = document
            .getElementById("search-bar-eksternal")
            .value.toLowerCase();

        const hasil = semuaBarangEksternal.filter((item) => {
            // cek field utama + tanggal
            const cocokFieldUtama =
                String(item.nama_driver || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.nama_suplier || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.no_kendaraan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.keterangan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.jam_kedatangan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.tanggal || "")
                    .toLowerCase()
                    .includes(keyword) || // format DB (YYYY-MM-DD)
                formatTanggal(item.tanggal).toLowerCase().includes(keyword); // format Indonesia

            // cek di barang JSON
            let cocokBarang = false;
            try {
                const barangList = JSON.parse(item.nama_jumlah_barang);
                cocokBarang = barangList.some(
                    (b) =>
                        String(b.nama_barang || "")
                            .toLowerCase()
                            .includes(keyword) ||
                        String(b.jumlah_barang || "")
                            .toLowerCase()
                            .includes(keyword)
                );
            } catch (e) {
                console.error("Parse error:", e);
            }

            return cocokFieldUtama || cocokBarang;
        });

        renderBarangEksternal(hasil);
    });
}
// Hapus barang eksternal
function hapusBarangEksternal(idData) {
    const dataBarangEksternal = {
        hapus_barang_eksternal: true,
        id_barang_eksternal: idData,
    };

    if (confirm("Yakin ingin menghapus data ini?") === true) {
        fetch("/backend/kelola_data.php?hapus_data_barang_eksternal=true", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(dataBarangEksternal),
        })
            .then(async (response) => {
                const data = await response.json();
                if (!response.ok) {
                    throw new Error(data.message || "Terjadi kesalahan");
                }
                return data;
            })
            .then((data) => {
                alert(data.message);
                muatDataBarangEksternal();
            })
            .catch((error) => {
                console.error(error);
            });
    }
}

// Muat data mobil
// 🔹 Variabel global
let semuaMobil = [];

// 🔹 Fungsi muat data mobil
function muatDataMobil(limit) {
    let url = limit
        ? "/backend/kelola_data.php?data_mobil&limit=" + limit
        : "/backend/kelola_data.php?data_mobil";

    fetch(url)
        .then((res) => res.json())
        .then((data) => {
            if (data.code === 200) {
                semuaMobil = data.data; // simpan global
                renderMobil(semuaMobil); // tampilkan default
            }
        })
        .catch((err) => console.error(err));
}

// 🔹 Fungsi render tabel mobil
function renderMobil(list) {
    let isiTabel = document.getElementById("isi-tabel-mobil");
    let konten = "";

    list.forEach((laporan, nomor) => {
        konten += `
            <tr>
                <td>${nomor + 1}</td>
                <td>${laporan.nama_driver}</td>
                <td>${laporan.merek_kendaraan}</td>
                <td>${laporan.no_kendaraan}</td>
                <td>${formatTanggal(laporan.tanggal)}</td>
                <td>${laporan.km_awal}</td>
                <td>${laporan.km_akhir}</td>
                <td>${laporan.tujuan}</td>
                <td>${laporan.keperluan}</td>
                <td class="action-btn">
                    <button class="btn btn-success" onclick="window.location.href='/pages/edit-data/mobil.php?id_mobil=${
                        laporan.id_mobil
                    }'">
                        <span class="material-symbols-rounded">edit</span>
                    </button>
                    <button class="btn btn-danger" onclick="hapusMobil(${
                        laporan.id_mobil
                    })">
                        <span class="material-symbols-rounded">delete</span>
                    </button>
                </td>
            </tr>
        `;
    });

    isiTabel.innerHTML =
        konten || `<tr><td colspan="10">Data tidak ditemukan</td></tr>`;
}

// 🔎 Search khusus mobil
let searchMobil = document.getElementById("search-mobil");
if (searchMobil) {
    searchMobil.addEventListener("click", function (e) {
        e.preventDefault();
        const keyword = document
            .getElementById("search-bar-mobil")
            .value.toLowerCase();

        const hasil = semuaMobil.filter((item) => {
            return (
                String(item.nama_driver || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.merek_kendaraan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.no_kendaraan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.tujuan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.keperluan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.km_awal || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.km_akhir || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.tanggal || "")
                    .toLowerCase()
                    .includes(keyword) || // format DB
                formatTanggal(item.tanggal).toLowerCase().includes(keyword) // format Indonesia
            );
        });

        renderMobil(hasil);
    });
}

// Hapus mobil
function hapusMobil(idData) {
    const dataMobil = {
        hapus_mobil: true,
        id_mobil: idData,
    };

    if (confirm("Yakin ingin menghapus data ini?") === true) {
        fetch("/backend/kelola_data.php?hapus_data_mobil=true", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(dataMobil),
        })
            .then(async (response) => {
                const data = await response.json();
                if (!response.ok) {
                    throw new Error(data.message || "Terjadi kesalahan");
                }
                return data;
            })
            .then((data) => {
                alert(data.message);
                muatDataMobil();
            })
            .catch((error) => {
                console.error(error);
            });
    }
}

// Muat data pengunjung
// 🔹 Variabel global
let semuaPengunjung = [];

// 🔹 Fungsi muat data pengunjung
function muatDataPengunjung(limit) {
    let url = limit
        ? "/backend/kelola_data.php?data_pengunjung&limit=" + limit
        : "/backend/kelola_data.php?data_pengunjung";

    fetch(url)
        .then((res) => res.json())
        .then((data) => {
            if (data.code === 200) {
                semuaPengunjung = data.data; // simpan global
                renderPengunjung(semuaPengunjung); // tampilkan default
            }
        })
        .catch((err) => console.error(err));
}

// 🔹 Fungsi render tabel pengunjung
function renderPengunjung(list) {
    let isiTabel = document.getElementById("isi-tabel-pengunjung");
    let konten = "";

    list.forEach((laporan, nomor) => {
        let dataPengunjung = "";
        try {
            // Asumsi nama_pengunjung tersimpan sebagai JSON array string
            JSON.parse(laporan.nama_pengunjung).forEach((p) => {
                dataPengunjung += `<li>${p}</li>`;
            });
        } catch (e) {
            console.error("Gagal parse pengunjung:", e);
        }

        konten += `
            <tr>
                <td>${nomor + 1}</td>
                <td>${dataPengunjung}</td>
                <td>${laporan.nama_perusahaan}</td>
                <td>${laporan.no_kendaraan}</td>
                <td>${formatTanggal(laporan.tanggal)}</td>
                <td>${laporan.no_telpon}</td>
                <td>${laporan.keperluan}</td>
                <td>${laporan.safety_induction}</td>
                <td class="action-btn">
                    <button class="btn btn-success" 
                        onclick="window.location.href='/pages/edit-data/pengunjung.php?id_pengunjung=${
                            laporan.id_pengunjung
                        }'">
                        <span class="material-symbols-rounded">edit</span>
                    </button>
                    <button class="btn btn-danger" 
                        onclick="hapusPengunjung(${laporan.id_pengunjung})">
                        <span class="material-symbols-rounded">delete</span>
                    </button>
                </td>
            </tr>
        `;
    });

    isiTabel.innerHTML =
        konten || `<tr><td colspan="9">Data tidak ditemukan</td></tr>`;
}

// 🔎 Search khusus pengunjung
let searchPengunjung = document.getElementById("search-pengunjung");
if (searchPengunjung) {
    searchPengunjung.addEventListener("click", function (e) {
        e.preventDefault();
        const keyword = document
            .getElementById("search-bar-pengunjung")
            .value.toLowerCase();

        const hasil = semuaPengunjung.filter((item) => {
            // cek field utama + tanggal
            const cocokFieldUtama =
                String(item.nama_perusahaan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.no_kendaraan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.no_telpon || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.keperluan || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.safety_induction || "")
                    .toLowerCase()
                    .includes(keyword) ||
                String(item.tanggal || "")
                    .toLowerCase()
                    .includes(keyword) || // format DB
                formatTanggal(item.tanggal).toLowerCase().includes(keyword); // format Indonesia

            // cek di array nama_pengunjung
            let cocokPengunjung = false;
            try {
                const pengunjungList = JSON.parse(item.nama_pengunjung);
                cocokPengunjung = pengunjungList.some((p) =>
                    String(p || "")
                        .toLowerCase()
                        .includes(keyword)
                );
            } catch (e) {
                console.error("Parse error:", e);
            }

            return cocokFieldUtama || cocokPengunjung;
        });

        renderPengunjung(hasil);
    });
}

// Hapus Pengunjung
function hapusPengunjung(idData) {
    const dataPengunjung = {
        hapus_pengunjung: true,
        id_pengunjung: idData,
    };

    if (confirm("Yakin ingin menghapus data ini?") === true) {
        fetch("/backend/kelola_data.php?hapus_data_pengunjung=true", {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(dataPengunjung),
        })
            .then(async (response) => {
                const data = await response.json();
                if (!response.ok) {
                    throw new Error(data.message || "Terjadi kesalahan");
                }
                return data;
            })
            .then((data) => {
                alert(data.message);
                muatDataPengunjung(); // refresh tabel setelah hapus
            })
            .catch((error) => {
                console.error(error);
            });
    }
}
