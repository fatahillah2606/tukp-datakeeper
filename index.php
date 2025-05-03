<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>
        <link
            rel="stylesheet"
            href="assets/bootstrap-5.3.5-dist/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="assets/style/login.css" />
    </head>
    <body>
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <img
                    src="assets/images/logo.svg"
                    alt="Logo Taland Utama Karisma Perkasa"
                    class="me-2"
                />
                <p class="h2">PT Taland Utama Karisma Perkasa</p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <p class="h3">Login</p>
                    <select
                        class="form-select mb-3"
                        aria-label="Jenis Pengguna"
                        name="pengguna"
                    >
                        <option value="admin">Admin</option>
                        <option value="security" selected>Security</option>
                        <option value="tamu">Tamu</option>
                    </select>
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
                    <div class="btn-grup">
                        <a href="#" class="btn btn-secondary"> Lupa Sandi </a>
                        <button type="submit" class="btn btn-success">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script src="assets/bootstrap-5.3.5-dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
