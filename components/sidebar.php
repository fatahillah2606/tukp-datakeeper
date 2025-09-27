<!-- Sidebar -->
<aside class="sidebar p-2">
    <?php if ($_SESSION["role"] !== "Tamu") { ?>
    <!-- buttons -->
    <div class="mb-3">
        <button
            class="material-symbols-rounded bg-transparent border border-0 p-2"
            id="menu-btn"
            onclick="togglemenu()"
        >
            menu
        </button>
    </div>
    <a href="/pages/dashboard.php">
        <span class="material-symbols-rounded">dashboard</span>
        <span class="menu-title">Dashboard</span>
    </a>
    <hr />
    <!-- Pencatatan -->
    <a href="/pages/catat-data/pengunjung.php">
        <span class="material-symbols-rounded">person_edit</span>
        <span class="menu-title">Catat Pengunjung</span>
    </a>
    <a href="/pages/catat-data/barang-internal.php">
        <span class="material-symbols-rounded">note_alt</span>
        <span class="menu-title">Catat Barang Internal</span>
    </a>
    <a href="/pages/catat-data/barang-eksternal.php">
        <span class="material-symbols-rounded">edit_document</span>
        <span class="menu-title">Catat Barang Eksternal</span>
    </a>
    <a href="/pages/catat-data/mobil.php">
        <span class="material-symbols-rounded">edit_road</span>
        <span class="menu-title">Catat Mobil</span>
    </a>
    <hr />
    <!-- Lihat laporan -->
    <a href="/pages/lihat-data/pengunjung.php">
        <span class="material-symbols-rounded">group</span>
        <span class="menu-title">Lihat Pengunjung</span>
    </a>
    <a href="/pages/lihat-data/barang-internal.php">
        <span class="material-symbols-rounded">content_paste_search</span>
        <span class="menu-title">Lihat Barang Internal</span>
    </a>
    <a href="/pages/lihat-data/barang-eksternal.php">
        <span class="material-symbols-rounded">description</span>
        <span class="menu-title">Lihat Barang Eksternal</span>
    </a>
    <a href="/pages/lihat-data/mobil.php">
        <span class="material-symbols-rounded">speed</span>
        <span class="menu-title">Lihat Mobil</span>
    </a>
    <hr />
    <!-- Admin -->
    <?php if ($_SESSION["role"] == "Admin") { ?>
    <a href="/pages/pengumuman.php">
        <span class="material-symbols-rounded">campaign</span>
        <span class="menu-title">Pengumuman</span>
    </a>
    <a href="/pages/kelola-pengguna.php">
        <span class="material-symbols-rounded">manage_accounts</span>
        <span class="menu-title">Kelola Pengguna</span>
    </a>
    <?php } ?>
    <?php } ?>
</aside>
