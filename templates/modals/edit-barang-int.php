<div class="modal-container edit-barang-int">
  <div class="formulir">
    <h1>Edit laporan barang internal</h1>
    <form action="">
      <div class="form-field">
        <label for="nama-pembawa">Nama Pembawa</label>
        <input type="text" id="nama-pembawa" name="nama-pembawa" />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">person</span>
      </div>
      <div id="field-barang-int">
        <h2>Barang</h2>
        <div class="multi-field">
          <div class="form-field">
            <label for="nama-barang">Nama Barang</label>
            <input type="text" id="nama-barang" name="nama-barang" />
            <span class="material-symbols-rounded field-error">error</span>
            <span class="supporting-text">Supporting text</span>
          </div>
          <div class="form-field">
            <label for="jumlah-barang">Jumlah Barang</label>
            <input type="number" id="jumlah-barang" name="jumlah-barang" />
            <span class="material-symbols-rounded field-error">error</span>
            <span class="supporting-text">Supporting text</span>
          </div>
          <span class="material-symbols-rounded field-icon">category</span>
        </div>
      </div>
      <div
        class="tambah"
        onclick="tambahMultiField('Barang tambahan', 'Nama Barang', 'Jumlah Barang', 'text', 'number', 'field-barang-int', 'category')"
      >
        <span class="material-symbols-rounded">add</span>
        <span class="btn-label">Tambah</span>
      </div>
      <div class="form-field fokus">
        <label for="tanggal">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" />
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">event</span>
      </div>
      <div class="form-field">
        <label for="keterangan">Keterangan</label>
        <input type="text" id="keterangan" name="keterangan" />
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
        <button name="updateBarangInt" type="submit">Simpan</button>
      </div>
    </form>
  </div>
</div>
