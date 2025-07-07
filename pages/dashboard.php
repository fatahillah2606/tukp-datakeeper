<?php
// reuire $_SERVER['DOCUMENT_ROOT'] . ''

// cek sesi 
session_start();
if (!isset($_SESSION["role"])) {

    // Pindah user ke halaman login
    header("Location: /");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Dashboard - TUKP Data Keeper</title>
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        />
        <link
            rel="stylesheet"
            href="/assets/bootstrap-5.3.5-dist/css/bootstrap.min.css"
        />
        <!-- local css -->
        <link rel="stylesheet" href="/assets/style/style.css" />
    </head>
    <body>
        <div class="layout">
            <!-- Sidebar -->
            <aside class="sidebar">
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <hr />
                <!-- Pencatatan -->
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <hr />
                <!-- Lihat laporan -->
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">dashboard</span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </aside>
            <div class="main">
                <!-- Navbar -->
                <nav class="navbar px-4">
                    <div class="logo">
                        <img src="/assets/images/logo.svg" alt="Logo TUKP" />
                        <span>TUKP Data Keeper</span>
                    </div>
                    <span class="material-symbols-rounded" id="profile"
                        >account_circle</span
                    >
                </nav>
                <main class="content p-4">
                    <h1 class="display-2 mb-5 ms-3">Selamat Datang, "nama"</h1>

                    <!-- Tabel -->
                    <div class="tabel p-4 rounded-4">
                        <div class="tabel-head">
                            <h3>Data Barang Internal</h3>

                            <!-- search bar -->
                            <form class="row g-3">
                                <div class="col-auto">
                                    <label
                                        for="search-bar"
                                        class="visually-hidden"
                                        >Cari</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="search-bar"
                                        placeholder="Cari..."
                                    />
                                </div>
                                <div class="col-auto">
                                    <button
                                        type="submit"
                                        class="btn btn-primary mb-3"
                                    >
                                        <span class="material-symbols-rounded">
                                            search
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Tabel data -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>@social</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
