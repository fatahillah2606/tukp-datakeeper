<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
  </head>
  <body class="bg-success">
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-6">
          <div class="card p-4">
            <h3 class="text-center mb-4">Catat Barang External</h3>
            <form>
              <div class="d-flex gap-2">
                <div class="mb-3 w-100">
                  <label for="namadriver" class="form-label">Nama Driver</label>
                  <div class="d-flex align-items-center gap-1">
                    <span class="material-symbols-outlined"> person </span>
                    <input
                      type="text"
                      class="form-control"
                      id="namadriver"
                      placeholder="Nama Driver"
                    />
                  </div>
                </div>
                <div class="mb-3 w-100">
                  <label for="namasuplier" class="form-label"
                    >Nama Supplier</label
                  >
                  <div class="d-flex align-items-center gap-1">
                    <input
                      type="text"
                      class="form-control"
                      id="namasuplier"
                      placeholder="Nama Supplier"
                    />
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="platnomor" class="form-label">Plat Nomor</label>
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined">
                    local_shipping
                  </span>
                  <input
                    type="text"
                    class="form-control"
                    id="platnomor"
                    placeholder="Plat Nomor"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined"> task_alt </span>
                  <input
                    type="text"
                    class="form-control"
                    id="keperluan"
                    placeholder="Keperluan"
                  />
                </div>
              </div>
              <div class="d-flex gap-2">
                <div class="mb-3 w-100">
                  <label for="namabarang" class="form-label">Nama Barang</label>
                  <div class="d-flex align-items-center gap-1">
                    <span class="material-symbols-outlined"> category </span>
                    <input
                      type="text"
                      class="form-control"
                      id="namabarang"
                      placeholder="Nama Barang"
                    />
                  </div>
                </div>
                <div class="mb-3 w-100">
                  <label for="jumlahbarang" class="form-label"
                    >Jumlah Barang</label
                  >
                  <div class="d-flex align-items-center gap-1">
                    <input
                      type="text"
                      class="form-control"
                      id="jumlahbarang"
                      placeholder="Jumlah Barang"
                    />
                  </div>
                </div>
              </div>
              <button type="button" class="btn btn-outline-dark mb-3">
                Tambah
              </button>
              <div class="mb-3">
                <label for="tanggalkunjungan" class="form-label">Tanggal</label>
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined">
                    calendar_month
                  </span>
                  <input
                    type="date"
                    class="form-control"
                    id="tanggalkunjungan"
                    placeholder="Masukan Tanggal"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="jamkedatangan" class="form-label"
                  >Jam Kedatangan</label
                >
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined"> schedule </span>
                  <input type="time" class="form-control" id="jamkedatangan" />
                </div>
              </div>
              <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined"> description </span>
                  <input
                    type="text"
                    class="form-control"
                    id="keterangan"
                    placeholder="Keterangan"
                  />
                </div>
              </div>
              <div class="d-flex justify-content-center gap-5">
                <button type="reset" class="btn btn-outline-danger w-100">
                  Batal
                </button>
                <button type="submit" class="btn btn-outline-success w-100">
                  Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
