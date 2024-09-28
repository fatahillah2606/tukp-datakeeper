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
            <h3 class="text-center mb-4">Catat Mobil</h3>
            <form>
              <div class="mb-3">
                <label for="driver" class="form-label">Driver</label>
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined"> person </span>
                  <input
                    type="text"
                    class="form-control"
                    id="driver"
                    placeholder="Masukan Nama Driver"
                  />
                </div>
              </div>
              <div class="mb-3">
                <label for="merekmobil" class="form-label">Merek Mobil</label>
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined">
                    directions_car
                  </span>
                  <input
                    type="text"
                    class="form-control"
                    id="merekmobil"
                    placeholder="Masukan Merek Mobil"
                  />
                </div>
              </div>
              <div class="d-flex gap-2">
                <div class="mb-3 w-100">
                  <label for="kilometerawal" class="form-label"
                    >Kilometer Awal</label
                  >
                  <div class="d-flex align-items-center gap-1">
                    <span class="material-symbols-outlined"> speed </span>
                    <input
                      type="text"
                      class="form-control"
                      id="kilometerawal"
                      placeholder="KM Awal"
                    />
                  </div>
                </div>
                <div class="mb-3 w-100">
                  <label for="kilometerakhir" class="form-label"
                    >Kilometer Akhir</label
                  >
                  <div class="d-flex align-items-center gap-1">
                    <input
                      type="text"
                      class="form-control"
                      id="kilometerakhir"
                      placeholder="KM Akhir"
                    />
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="tujuan" class="form-label">Tujuan</label>
                <div class="d-flex align-items-center gap-1">
                  <span class="material-symbols-outlined"> location_on </span>
                  <input
                    type="text"
                    class="form-control"
                    id="tujuan"
                    placeholder="Tujuan"
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
