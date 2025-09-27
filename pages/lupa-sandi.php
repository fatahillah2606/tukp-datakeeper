<?php
// reuire $_SERVER['DOCUMENT_ROOT'] . ''
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lupa Sandi - TUKP Data Keeper</title>
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
    <main class="content p-4">
        <!-- Formulir -->
        <div class="card overflow-hidden" id="formulir" style="max-width:500px;margin:auto;">
            <h5 class="card-header bg-success text-white">Lupa Sandi</h5>
            <div class="card-body">
                <form action="" method="post" id="form-lupa-sandi">
                    <div class="mb-3">
                        <label for="cari_pengguna" class="form-label">Nama Pengguna</label>
                        <input
                            type="text"
                            class="form-control"
                            id="cari_pengguna"
                            name="cari_pengguna"
                            maxlength="25"
                            required
                        />
                    </div>
                    <div class="row">
                        <div class="col">
                            <button
                                type="reset"
                                class="btn btn-outline-success my-3 w-100"
                            >
                                Bersihkan
                            </button>
                        </div>
                        <div class="col">
                            <button
                                type="button"
                                class="btn btn-success my-3 w-100"
                                onclick="simpan(event)"
                            >
                                Kirim 
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="/assets/scripts/kelola_data.js"></script>
    <script src="/assets/scripts/navigation.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function simpan(event) {
            event.preventDefault();

            const elmForm = document.getElementById("form-lupa-sandi");
            const dataForm = new FormData(elmForm);
            dataForm.append("kirim_data_lupa_sandi", true);

            fetch("/backend/lupa_sandi.php", {
                method: "POST",
                body: dataForm,
            })
            .then(async (respon) => {
                const data = await respon.json();
                console.log(data);
                if (!respon.ok) {
                    throw new Error(data.message || "Terjadi kesalahan");
                }
                return data;
            })
            .then((data) => {
                alert(data.message);
                window.location.href = "/index.php";
            })
            .catch((error) => {
                console.error(error);
            });
        }
    </script>
</body>
</html>
