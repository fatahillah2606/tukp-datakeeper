<?php
  require $_SERVER["DOCUMENT_ROOT"] . "/includes/cek-login.php";
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
  </head>
  <body>
    <!-- <div class="sidebar">
      <ul class="dropdown-menu">
        <li class="dropdown-item">
          <span class="material-symbols-rounded">arrow_back</span>
        </li>
      </ul>
    </div> -->
    <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block sidebar">
          <div class="position-sticky">
            <a href="#" class="navbar-brand mb-1">
              <span class="material-symbols-outlined"> menu </span>
            </a>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="../dashboard.php">
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
                  <span class="material-symbols-outlined"
                    >arrow_drop_down_circle</span
                  >
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
                  <span class="material-symbols-outlined"
                    >arrow_drop_down_circle</span
                  >
                </a>
                <div class="collapse" id="collapseLihatData">
                  <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="#"
                        ><i class="bi bi-person-check"></i> Lihat Pengunjung</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="lihat-barang-ext.php"
                        ><i class="bi bi-box"></i> Lihat Barang Eksternal</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="lihat-barang-int.php"
                        ><i class="bi bi-box"></i> Lihat Barang Internal</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="lihat-mobil.php"
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
                <a class="nav-link" href="#"
                  ><i class="bi bi-bell"></i> Notifikasi</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"
                  ><i class="bi bi-box-arrow-right"></i> Keluar</a
                >
              </li>
            </ul>
          </div>
        </nav>

        <!-- Main content -->
        <main
          class="col-md-9 ms-sm-auto col-lg-10 px-md-4 content position-relative"
        >
          <!-- Header -->
          <div
            class="d-block position-absolute top-0 start-0 w-100"
            style="background-color: #158c4c"
          >
            <img
              src="../../assets/images/logo.svg"
              alt="Logo"
              class="bg-light rounded-circle p-1"
            />
            <span class="text-white">TUKP Data Keeper</span>
          </div>

          <!-- Table Data -->
          <div class="table-container" style="margin-top: 60px">
            <div class="card">
              <div class="card-body">
                <h5>Data Barang</h5>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Pengunjung</th>
                      <th>Nama Perusahaan</th>
                      <th>Tanggal</th>
                      <th>No Telepon</th>
                      <th>No Kendaraan</th>
                      <th>Ubah Data</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Asep</td>
                      <td>Agus Maju Bersama</td>
                      <td>31 Februari 2090</td>
                      <td>0895385166564</td>
                      <td>BH 151 TT</td>
                      <td>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
