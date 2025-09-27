<?php
// Ambil database
require "../connection/db_tukp.php";
// Ambil fungsi untuk membuat API
require "generate_api.php";

// Bagian untuk request dengan method POST 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Jika request adalah register
    if (isset($_POST["register"])) {

        // Ambil data dari formulir 
        $type_user = htmlspecialchars($_POST ["selecttype"]);
        $user_id = isset($_POST["user-id"]) ? htmlspecialchars($_POST["user-id"]) : null ;    
        $user_email = isset($_POST["user-email"]) ? htmlspecialchars($_POST["user-email"]) : null ;    
        $nama = htmlspecialchars($_POST["nama"]);
        $sandi = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_BCRYPT);

        // Coba masukan datanya ke database
        try {
            $sql = "INSERT INTO `pengguna` (`id_pengguna`, `id_user`, `email_user`, `nama_user`, `role`, `password`) VALUES (null, :idUser, :emailUser, :namaUser, :typeUser, :sandi)";
       
            //siapkan query nya
            $stmt = $pdo->prepare($sql);


            //siapka variabel untuk dimasukan ke SQL
            $stmt->execute([
                "idUser" =>$user_id
                ,"emailUser"=>$user_email
                ,"namaUser"=>$nama
                ,"typeUser"=>$type_user
                ,"sandi"=>$sandi
             ]);
            
             // Jika berhasil di simpan, beri respon berhasil menyimpan data
             echo json_encode(generateAPI("success", 200, "Berhasil menambahkan pengguna baru", []));
            

        } catch (\Throwable $th) {
            echo json_encode(generateAPI("failed", 500, "Internal Server Error", print_r($th)));
        }
    }
}
?>