function daftar(event) {
    event.preventDefault();

    let registAkun = document.getElementById("regist-akun");
    let formwajib = registAkun.querySelector("[required]:not([disabled])");
    let formRegist = new FormData(registAkun);
    formRegist.append("register", "true");

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/backend/daftar.php", true);

    xhr.send(formRegist);

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const respon = JSON.parse(xhr.responseText);
                if (respon.status === "success") {
                    // Jika respon berhasil
                    console.log("Berhasil\n" + respon.message);
                } else {
                    // Jika respon gagal
                    console.log("Gagal\n" + respon.message);
                }
            } catch (error) {
                // Jika terjadi kesalahan dalam memproses API
                console.error(
                    "Kesalahan dalam memproses API\n" +
                        error +
                        "\nRespon API:\n" +
                        xhr.responseText
                );
            }
        }
    };
}
