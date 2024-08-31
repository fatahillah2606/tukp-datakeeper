<div class="modal-container edit-pengunjung">
  <div class="formulir">
    <h1>Edit laporan pengunjung</h1>
    <form action="">
      <div id="field-nama">
        <div class="form-field">
          <label for="nama-pengunjung">Nama Pengunjung</label>
          <input type="text" id="nama-pengunjung" name="nama-pengunjung" />
          <span class="material-symbols-rounded field-error">error</span>
          <span class="supporting-text">Supporting text</span>
          <span class="material-symbols-rounded field-icon">person</span>
        </div>
      </div>
      <div
        class="tambah"
        onclick="tambahSingleField('Tambahan pengunjung', 'Nama Pengunjung', 'text', 'field-nama', 'person')"
      >
        <span class="material-symbols-rounded">add</span>
        <span class="btn-label">Tambah</span>
      </div>
      <div class="form-field">
        <label for="nama-perusahaan">Nama Perusahaan</label>
        <input type="text" id="nama-perusahaan" name="nama-perusahaan" />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">factory</span>
      </div>
      <div class="form-field fokus">
        <label for="tanggal">Tanggal</label>
        <input type="date" id="tanggal" name="tanggal" />
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">event</span>
      </div>
      <div class="form-field">
        <label for="no-tlp">Nomor Telepon</label>
        <input type="text" id="no-tlp" name="no-tlp" />
        <span class="material-symbols-rounded field-error">error</span>
        <span class="supporting-text">Supporting text</span>
        <span class="material-symbols-rounded field-icon">call</span>
      </div>
      <div class="tombol-aksi">
        <button
          type="reset"
          class="batal"
          onclick="batalEdit(this.parentElement.parentElement.parentElement.parentElement)"
        >
          Batal
        </button>
        <button name="updatePengunjung" type="submit">Simpan</button>
      </div>
    </form>
  </div>
</div>