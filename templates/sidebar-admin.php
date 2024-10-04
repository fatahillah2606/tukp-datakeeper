<!-- Sidebar -->
<nav class="col-md-2 d-none d-md-block sidebar">
  <div class="position-sticky">
    <a href="#" class="navbar-brand mb-1">
      <span class="material-symbols-outlined"> menu </span>
    </a>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="#">
          <i class="bi bi-speedometer2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          data-bs-toggle="collapse"
          href="#collapsePencatatan"
          role="button"
        >
          <!-- Pencatatan -->
          <i class="bi bi-pencil-square"></i> Pencatatan
          <span class="material-symbols-outlined">arrow_drop_down_circle</span>
        </a>
        <div class="collapse" id="collapsePencatatan">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              <a class="nav-link" href="pencatatan/catat-pengunjung.php"
                ><i class="bi bi-person-check"></i> Catat Pengunjung</a
              >
            </li>

            <li class="nav-item">
              <a class="nav-link" href="pencatatan/catat-mobil.php"
                ><i class="bi bi-truck"></i> Catat Mobil</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pencatatan/catat-barang-int.php"
                ><i class="bi bi-box"></i> Catat barang-int</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pencatatan/catat-barang-ext.php"
                ><i class="bi bi-box"></i> Catat Barang-ext.php</a
              >
            </li>
          </ul>
        </div>
      </li>
      <!-- Lihat data -->

      <li class="nav-item">
        <a
          class="nav-link"
          data-bs-toggle="collapse"
          href="#collapseLihatData"
          role="button"
        >
          <i class="bi bi-eye"></i> Lihat Data
          <span class="material-symbols-outlined">arrow_drop_down_circle</span>
        </a>
        <div class="collapse" id="collapseLihatData">
          <ul class="nav flex-column ms-3">
            <li class="nav-item">
              <a class="nav-link" href="#"
                ><i class="bi bi-person-check"></i> Lihat Pengunjung</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"
                ><i class="bi bi-box"></i> Lihat Barang</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"
                ><i class="bi bi-truck"></i> Lihat Mobil</a
              >
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"
          ><i class="bi bi-person-plus"></i> Tambah Pengguna</a
        >
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="bi bi-bell"></i> Notifikasi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout.php"
          ><i class="bi bi-box-arrow-right"></i> Keluar</a
        >
      </li>
    </ul>
  </div>
</nav>
