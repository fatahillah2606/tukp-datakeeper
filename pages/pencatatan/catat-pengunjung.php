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
  <body class="bg-body">
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-md-6">
          <div class="card p-4 formulir">
            <h3 class="text-center mb-4">Catat Pengunjung</h3>
            <form>
              <div class="mb-3 >
                <label for="namapengunjung" class="form-label"
                  >Nama Pengunjung</label
                >
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined"> person </span>
                  <input
                    type="text"
                    class="form-control bg-secondary-subtle border-success shadow-sm"
                    id="namapengunjung"
                    placeholder="Masukan Nama Pengunjung"
                  />
                </div>
              </div>
              <button type="button" class="btn btn-outline-dark mb-3">
                Tambah
              </button>
              <div class="mb-3">
                <label for="namaperusahaan" class="form-label"
                  >Nama Perusahaan</label
                >
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined"> domain </span>
                  <input
                    type="text"
                    class="form-control bg-secondary-subtle"
                    id="namaperusahaan"
                    placeholder="Masukan Nama Perusahaan "
                    
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="tanggalkunjungan" class="form-label">Tanggal</label>
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined">
                    calendar_month
                  </span>
                  <input
                    type="date"
                    class="form-control bg-secondary-subtle"
                    id="tanggalkunjungan"
                    placeholder="Masukan Tanggal"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="notelpon" class="form-label">No Telpon</label>
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined"> call </span>
                  <input
                    type="text"
                    class="form-control bg-secondary-subtle"
                    id="notelpon"
                    placeholder="Masukan No Telpon"
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
