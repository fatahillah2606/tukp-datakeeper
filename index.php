<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>

        <!-- Style CSS -->
        <link
            rel="stylesheet"
            href="assets/bootstrap-5.3.5-dist/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="assets/style/login.css" />
    </head>
    <body>
        <!-- Kolom Login -->
        <div class="card">
            <!-- Logo dan Nama Perusahaan -->
            <div class="card-header d-flex align-items-center">
                <img
                    src="assets/images/logo.svg"
                    alt="Logo Taland Utama Karisma Perkasa"
                    class="me-2"
                />
                <p class="h2">PT Taland Utama Karisma Perkasa</p>
            </div>
            <div class="card-body">
                <!-- Form Login -->
                <form action="" method="post" id="login" name="login">
                    <p class="h3">Login</p>

                    <!-- Opsi Pilih Role -->
                    <select
                        class="form-select mb-3"
                        aria-label="Jenis Pengguna"
                        name="pengguna"
                        id="role"
                    >
                        <option value="Admin">Admin</option>
                        <option value="Security" selected>Security</option>
                        <option value="Tamu">Tamu</option>
                    </select>

                    <!-- Kolom Id Pengguna -->
                    <div class="mb-3">
                        <label for="userid" class="form-label"
                            >Id Pengguna</label
                        >
                        <input
                            type="number"
                            class="form-control"
                            id="userid"
                            placeholder="123456"
                        />
                    </div>

                    <!-- Kolom Kata Sandi -->
                    <div class="mb-3">
                        <label for="userpassword" class="form-label"
                            >Sandi Pengguna</label
                        >
                        <input
                            type="password"
                            class="form-control"
                            id="userpassword"
                            placeholder=""
                        />
                    </div>

                    <!-- Check untuk menampilkan sandi -->
                    <div class="form-check mb-3">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="showpw"
                        />
                        <label class="form-check-label" for="showpw">
                            Tampilkan Sandi
                        </label>
                    </div>

                    <!-- Tombol -->
                    <div class="btn-grup">
                        <a href="#" class="btn btn-secondary"> Lupa Sandi </a>
                        <button
                            type="submit"
                            class="btn btn-success"
                            onclick="SecurityLogin()"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Script Js -->
        <script src="assets/scripts/login.js"></script>
        <script src="assets/bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
