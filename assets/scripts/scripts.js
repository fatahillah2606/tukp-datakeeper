let kolomsandi = document.getElementById("password");
let showPw = document.getElementById("show-pw");

// Fungsi Untuk Menampilkan Sandi
function tampilkansandi() {
    kolomsandi.setAttribute("type", "text");
}

// Fungsi Untuk sembunyikan Sandi
function sembunyikansandi() {
    kolomsandi.setAttribute("type", "password");
}

// Apa yang akan dilakukan jika tombol checkbox tampilkan sandi ditekan?
showPw.addEventListener("click", function () {
    if (showPw.checked) {
        tampilkansandi();

        // Jika checkbox tidak ditekan
    } else {
        sembunyikansandi();
    }
});

// Opsi Pilih Tipe Pengguna
let selectType = document.getElementById("selecttype");
let kolomAdmin = document.getElementById("admin");
let kolomUser = document.getElementById("user");
selectType.addEventListener("change", function () {
    // Hilangkan elemen terlebih dahulu
    kolomAdmin.classList.add("hidden");
    kolomUser.classList.add("hidden");

    // Menonaktifkan kolom input
    kolomAdmin.querySelector("#user-email").setAttribute("disabled", "");
    kolomUser.querySelector("#user-id").setAttribute("disabled", "");

    // Tampilkan kolom isian sesuai dengan pilihan pengguna

    if (selectType.value === "Admin") {
        kolomAdmin.classList.remove("hidden");
        kolomAdmin.querySelector("#user-email").removeAttribute("disabled");
    } else if (selectType.value === "Security") {
        kolomUser.classList.remove("hidden");
        kolomUser.querySelector("#user-id").removeAttribute("disabled");
    }
});
