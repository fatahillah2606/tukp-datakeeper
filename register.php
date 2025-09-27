<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>
        <link rel="stylesheet" href="assets/style/style.css" />
    </head>
    <body>
        <section>
            <h1>Register</h1>
            <form action="" method="post" id="regist-akun">
                <table>
                    <tr>
                        <td>
                            <label for="selecttype">Pilih Jenis Pengguna</label>
                        </td>
                        <td>
                            <select name="selecttype" id="selecttype" required>
                                <option value="" selected>-- Pilih --</option>
                                <option value="Admin">Admin</option>
                                <option value="Security">Security</option>
                                <option value="Tamu">Tamu</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="user" class="hidden">
                        <td>
                            <label for="user-id">Id</label>
                        </td>
                        <td>
                            <input
                                type="number"
                                name="user-id"
                                id="user-id"
                                placeholder="Masukkan Id anda"
                                disabled
                                required
                            />
                        </td>
                    </tr>
                    <tr id="admin" class="hidden">
                        <td>
                            <label for="user-email">Email</label>
                        </td>
                        <td>
                            <input
                                type="email"
                                name="user-email"
                                id="user-email"
                                placeholder="Masukkan Email Anda"
                                disabled
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="nama">Nama</label></td>
                        <td>
                            <input
                                type="text"
                                name="nama"
                                id="nama"
                                placeholder="Masukkan Nama Anda"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="Masukkan Password Anda"
                                required
                            />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input
                                type="checkbox"
                                name="show-pw"
                                id="show-pw"
                            />
                            <label for="show-pw">Tampilkan Password</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button
                                type="submit"
                                name="register"
                                id="register"
                                onclick="daftar(event)"
                            >
                                Register
                            </button>
                            <button type="reset" name="reset" id="reset">
                                Reset
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </section>
        <script src="assets/scripts/scripts.js"></script>
        <script src="assets/scripts/login.js"></script>
    </body>
</html>
