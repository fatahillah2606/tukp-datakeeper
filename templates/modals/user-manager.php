<div class="modal-container user-manager-dialog">
  <div class="formulir">
    <h1>Tambah pengguna</h1>
    <div class="content">
      <div class="left">
        <div class="profile-icon">
          <span class="material-symbols-rounded">person</span>
        </div>
        <div class="profile-desc">
          <h2 class="username">Nama Pengguna</h2>
          <p class="userid">email/user_id</p>
          <p class="userrole">Tipe</p>
        </div>
      </div>
      <div class="right">
        <form action="" method="post" id="tambah-user">
          <div class="form-field">
            <label for="username">Nama Pengguna</label>
            <input type="text" id="username" name="username" />
            <span class="material-symbols-rounded field-error">error</span>
            <span class="supporting-text">Supporting text</span>
            <span class="material-symbols-rounded field-icon">person</span>
          </div>
          <h2>Kata sandi</h2>
          <div class="multi-field">
            <div class="form-field">
              <label for="first-pass">Masukan sandi</label>
              <input type="password" id="first-pass" name="first-pass" />
              <span class="material-symbols-rounded field-error">error</span>
              <span class="supporting-text">Supporting text</span>
            </div>
            <div class="form-field">
              <label for="final-pass">Ketikan ulang sandi</label>
              <input type="password" id="final-pass" name="final-pass" />
              <span class="material-symbols-rounded field-error">error</span>
              <span class="supporting-text">Supporting text</span>
            </div>
            <span class="material-symbols-rounded field-icon">vpn_key</span>
          </div>
          <div class="show-passwd">
            <input type="checkbox" name="tampil-sandi" id="tampil-sandi" />
            <label for="tampil-sandi">Tampilkan sandi</label>
          </div>
          <div class="form-field">
            <label for="tipe-pengguna">Tipe Pengguna</label>
            <select name="tipe-pengguna" id="tipe-pengguna">
              <option value=""></option>
              <option value="Admin">Admin</option>
              <option value="User">Pengguna Biasa</option>
            </select>
            <span class="material-symbols-rounded field-error">error</span>
            <span class="supporting-text">Supporting text</span>
            <span class="material-symbols-rounded field-icon"
              >assignment_ind</span
            >
          </div>
          <div class="user-login-method">
            <div class="form-field none" id="email">
              <label for="useremail">Masukan Email</label>
              <input type="email" id="useremail" name="useremail" disabled />
              <span class="material-symbols-rounded field-error">error</span>
              <span class="supporting-text">Supporting text</span>
              <span class="material-symbols-rounded field-icon">mail</span>
            </div>
            <div class="form-field none" id="user-id">
              <label for="userid">Masukan User ID</label>
              <input type="number" id="userid" name="userid" disabled />
              <span class="material-symbols-rounded field-error">error</span>
              <span class="supporting-text">Supporting text</span>
              <span class="material-symbols-rounded field-icon">passkey</span>
            </div>
          </div>
          <div class="tombol-aksi">
            <button
              type="reset"
              class="batal"
              onclick="closeUserManager(this.parentElement.parentElement)"
            >
              Batal
            </button>
            <button name="" type="submit">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
