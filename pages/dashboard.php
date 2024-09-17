<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard | TUKP Datakeeper</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link rel="stylesheet" href="/assets/css/style.css" />
  </head>
  <body data-bs-theme="light">
    <!-- Navbar -->
    <header class="p-3 mb-3 border-bottom">
      <div class="container">
        <div
          class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start"
        >
          <a
            href="/"
            class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none"
          >
            <img
              src="../assets/images/logo.svg"
              class="bi me-2"
              width="32"
              role="img"
            />
          </a>

          <ul
            class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0"
          >
            <li>
              <a href="#" class="nav-link px-2 link-secondary">Dashboard</a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link px-2 text-body-emphasis dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Pencatatan
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Pengunjung</a></li>
                <li><a class="dropdown-item" href="#">Barang Eksternal</a></li>
                <li><a class="dropdown-item" href="#">Barang Internal</a></li>
                <li><a class="dropdown-item" href="#">Kilometer Mobil</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link px-2 text-body-emphasis dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Lihat catatan
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Pengunjung</a></li>
                <li><a class="dropdown-item" href="#">Barang Eksternal</a></li>
                <li><a class="dropdown-item" href="#">Barang Internal</a></li>
                <li><a class="dropdown-item" href="#">Kilometer Mobil</a></li>
              </ul>
            </li>
          </ul>
          <!-- User profile -->
          <div class="dropdown text-end me-3">
            <a
              href="#"
              class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="material-symbols-rounded" style="font-size: 32px"
                >account_circle</span
              >
            </a>
            <ul class="dropdown-menu text-small">
              <li><a class="dropdown-item" href="#">Kelola pengguna</a></li>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </div>
          <!-- Dark mode toggle -->
          <div class="dropdown text-end">
            <a
              href="#"
              class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="material-symbols-rounded" style="font-size: 32px"
                >dark_mode</span
              >
            </a>
            <ul class="dropdown-menu text-small">
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <span
                    class="material-symbols-rounded me-3"
                    style="font-size: 32px"
                    >light_mode</span
                  >
                  Terang</a
                >
              </li>
              <li>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <span
                    class="material-symbols-rounded me-3"
                    style="font-size: 32px"
                    >dark_mode</span
                  >
                  Gelap</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
