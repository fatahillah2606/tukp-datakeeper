<div class="modal-container edit-mobil">
  <div class="formulir">
    <h1>Edit laporan kilometer mobil</h1>
    <form action="">
      <div class="form-field">
        <label for="nama-driver">Nama Driver</label>
        <input type="text" id="nama-driver" name="nama-driver" required />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">person</span>
      </div>
      <div class="form-field">
        <label for="merek-kendaraan">Merek Kendaraan</label>
        <select name="merek-kendaraan" id="merek-kendaraan" required>
          <option value=""></option>
          <option value="Luxio">Luxio</option>
          <option value="Grandmax">Grandmax</option>
          <option value="Panther">Panther</option>
          <option value="Lainnya">Lainnya</option>
        </select>
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">local_shipping</span>
      </div>
      <div class="form-field none">
        <label for="merek-lain">Merek Lain</label>
        <input
          type="text"
          id="merek-lain"
          name="merek-lain"
          disabled
          required
        />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
      </div>
      <h2>Kilometer</h2>
      <div class="multi-field">
        <div class="form-field">
          <label for="awal-km">Awal</label>
          <input type="number" id="awal-km" name="awal-km" required />
          <span class="material-symbols-rounded field-error">error</span>
          <span class="supporting-text">Supporting text</span>
        </div>
        <div class="form-field">
          <label for="akhir-km">Akhir</label>
          <input type="number" id="akhir-km" name="akhir-km" required />
          <span class="material-symbols-rounded field-error">error</span>
          <span class="supporting-text">Supporting text</span>
        </div>
        <span class="material-symbols-rounded field-icon">speed</span>
      </div>
      <div class="form-field">
        <label for="tujuan">Tujuan</label>
        <input type="text" id="tujuan" name="tujuan" required />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">location_on</span>
      </div>
      <div class="form-field">
        <label for="keperluan">Keperluan</label>
        <input type="text" id="keperluan" name="keperluan" required />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">task_alt</span>
      </div>
      <div class="tombol-aksi">
        <button
          type="reset"
          class="batal"
          onclick="batalEdit(this.parentElement.parentElement.parentElement.parentElement)"
        >
          Batal
        </button>
        <button name="updateMobil" type="submit">Simpan</button>
      </div>
    </form>
  </div>
</div>
