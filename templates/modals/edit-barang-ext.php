<div class="modal-container edit-barang-ext">
  <div class="formulir">
    <h1>Edit laporan barang eksternal</h1>
    <form action="">
      <div class="form-field fokus">
        <label for="tanggal-ext">Tanggal</label>
        <input type="date" id="tanggal-ext" name="tanggal-ext" required />
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">event</span>
      </div>
      <div class="multi-field">
        <div class="form-field">
          <label for="nama-driver-ext">Nama Driver</label>
          <input type="text" id="nama-driver-ext" name="nama-driver-ext" required />
          <span class="material-symbols-rounded field-error">error</span>
          <span class="supporting-text">Supporting text</span>
        </div>
        <div class="form-field">
          <label for="nama-suplier">Nama Suplier</label>
          <input type="text" id="nama-suplier" name="nama-suplier" required />
          <span class="material-symbols-rounded field-error">error</span>
          <span class="supporting-text">Supporting text</span>
        </div>
        <span class="material-symbols-rounded field-icon">person</span>
      </div>
      <div class="form-field">
        <label for="keperluan-ext">Keperluan</label>
        <input type="text" id="keperluan-ext" name="keperluan-ext" required />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">task_alt</span>
      </div>
      <h2>Barang</h2>
      <div id="field-barang-ext">
        <div class="multi-field">
          <div class="form-field">
            <label for="nama-barang-ext">Nama Barang</label>
            <input type="text" id="nama-barang-ext" name="nama-barang-ext" required />
            <span class="material-symbols-rounded field-error">error</span>
            <span class="supporting-text">Supporting text</span>
          </div>
          <div class="form-field">
            <label for="jumlah-barang-ext">Jumlah Barang</label>
            <input
              type="number"
              id="jumlah-barang-ext"
              name="jumlah-barang-ext"
              required
            />
            <span class="material-symbols-rounded field-error">error</span>
            <span class="supporting-text">Supporting text</span>
          </div>
          <span class="material-symbols-rounded field-icon">category</span>
        </div>
      </div>
      <div
        class="tambah"
        onclick="tambahMultiField('Barang tambahan', 'Nama Barang Ext', 'Jumlah Barang Ext', 'text', 'number', 'field-barang-ext', 'category')"
      >
        <span class="material-symbols-rounded">add</span>
        <span class="btn-label">Tambah</span>
      </div>
      <div class="form-field keep-fokus">
        <label for="time-pp">Jam Kedatangan</label>
        <input type="time" id="time-pp" name="time-pp" required />
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">schedule</span>
      </div>
      <div class="form-field">
        <label for="no-kendaraan">Nomor Kendaraan</label>
        <input type="text" id="no-kendaraan" name="no-kendaraan" required />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">local_shipping</span>
      </div>

      <div class="form-field">
        <label for="keterangan-ext">Keterangan</label>
        <input type="text" id="keterangan-ext" name="keterangan-ext" />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">description</span>
      </div>
      <div class="tombol-aksi">
        <button
          type="reset"
          class="batal"
          onclick="batalEdit(this.parentElement.parentElement.parentElement.parentElement)"
        >
          Batal
        </button>
        <button name="updateBarangExt" type="submit">Simpan</button>
      </div>
    </form>
  </div>
</div>
