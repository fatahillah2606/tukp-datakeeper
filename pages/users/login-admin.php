<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | TUKP Datakeeper</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="/assets/css/login.css" />
  </head>
  <body data-bs-theme="dark">
    <!-- Login form -->
    <div class="login-form">
      <!-- icon -->
      <div class="icon">
        <img src="/assets/images/logo.svg" alt="Logo" />
        <h3>TUKP Datakeeper</h3>
      </div>
      <div class="card shadow bg-body-tertiary rounded">
        <div class="card-body">
          <h2 class="card-title mb-4">Login</h2>
          <!-- Login as -->
          <h5 class="card-subtitle text-body-secondary mb-3">Login sebagai:</h5>
          <div class="dropdown mb-4">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Admin
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/">Pengguna Biasa</a></li>
              <li>
                <a class="dropdown-item" href="pages/users/admin.php">Admin</a>
              </li>
              <li><a class="dropdown-item" href="#">Tamu</a></li>
            </ul>
          </div>
          <!-- Form field -->
          <form action="" class="needs-validation" novalidate>
            <div class="mb-3">
              <label for="useremail" class="form-label">Email</label>
              <div class="input-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Nama"
                  aria-label="Username"
                  required
                />
                <span class="input-group-text">@</span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Email"
                  aria-label="Server"
                  required
                />
              </div>
              <div id="bantuanuseremail" class="invalid-feedback">
                Wajib diisi
              </div>
            </div>
            <div class="mb-3">
              <label for="sandi" class="form-label">Kata Sandi</label>
              <input
                type="password"
                id="sandi"
                class="form-control"
                aria-describedby="bantuansandi"
                required
              />
              <div id="bantuansandi" class="invalid-feedback">Wajib diisi</div>
            </div>
            <!-- show passwd -->
            <div class="form-check mb-3">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="tampilkansandi"
              />
              <label class="form-check-label" for="tampilkansandi">
                Tampilkan sandi
              </label>
            </div>
            <div class="buttons d-flex">
              <button type="submit" class="btn btn-primary">Login</button>
              <a href="#" class="btn btn-link">Lupa sandi</a>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (() => {
        "use strict";

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll(".needs-validation");

        // Loop over them and prevent submission
        Array.from(forms).forEach((form) => {
          form.addEventListener(
            "submit",
            (event) => {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add("was-validated");
            },
            false
          );
        });
      })();
    </script>
  </body>
</html>
