<?php
  require $_SERVER["DOCUMENT_ROOT"] . "/includes/cek-login.php";
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
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
        <!-- sidebar -->
        <?php
          if ($_SESSION["peran_pengguna"] == "Admin") {
            require $_SERVER["DOCUMENT_ROOT"] . "/templates/sidebar-admin.php";
          }else { 
            require $_SERVER["DOCUMENT_ROOT"] . "/templates/sidebar-user.php";
          }

        ?>

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
              src="../assets/images/logo.svg"
              alt="Logo"
              class="bg-light rounded-circle p-1"
            />
            <span class="text-white">TUKP Data Keeper</span>
          </div>
          <div class="header mt-5">
            <h1><span class="text-primary">Selamat Datang,</span> Al Aziz</h1>
            <p class="lead">Mau Apa Kamu Hari Ini?</p>
          </div>

          <!-- Card options -->
          <div class="row mt-4">
            <div class="col-md-4">
              <div class="card text-center p-3">
                <div class="card-body">
                  <p>Pencatatan</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-center p-3">
                <div class="card-body">
                  <p>Lihat Data</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card text-center p-3">
                <div class="card-body">
                  <p>Data Eksternal</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Table Data -->
          <div class="table-container">
            <div class="card">
              <div class="card-body">
                <h5>Data Barang</h5>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Nama Pembawa</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Paraf</th>
                      <th>Ubah Data</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>27 Januari 2027</td>
                      <td>Sofian</td>
                      <td>Narkoba</td>
                      <td>20pcs</td>
                      <td>v</td>
                      <td>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                      </td>
                    </tr>
                    <tr>
                      <td>27 Januari 2027</td>
                      <td>Sofian</td>
                      <td>Narkoba</td>
                      <td>20pcs</td>
                      <td>v</td>
                      <td>
                        <button class="btn btn-primary btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                      </td>
                    </tr>
                    <tr>
                      <td>27 Januari 2027</td>
                      <td>Sofian</td>
                      <td>Narkoba</td>
                      <td>20pcs</td>
                      <td>v</td>
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
