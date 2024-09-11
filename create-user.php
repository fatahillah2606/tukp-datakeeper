<?php
$conn = new mysqli("localhost", "andika", "CODOTERSNA29", "tukp_datakeeper");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["save"])) {
  $userRole = htmlspecialchars($_POST["roleuser"]);
  (isset($_POST["userid"])) ? $userId = htmlspecialchars($_POST["userid"]) : $userId = null;
  (isset($_POST["useremail"])) ? $userEmail = htmlspecialchars($_POST["useremail"]) : $userEmail = null;
  $userName = htmlspecialchars($_POST["username"]);
  $userPasswd = htmlspecialchars($_POST["password"]);

  $hashedPasswd = password_hash($userPasswd, PASSWORD_BCRYPT);

  $sql = "INSERT INTO pengguna (`id`, `id_user`, `email_user`, `nama_user`, `role`, `password`, `token_login`) VALUES (null, ?, ?, ?, ?, ?, null);";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("issss", $userId, $userEmail, $userName, $userRole, $hashedPasswd);

  if ($stmt->execute()) {
    echo "<script>alert('Successfully added user');</script>";
  } else {
    echo "<script>alert('Failed added user');</script>";
  }
}
?>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create user</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css
    "
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <style>
      body {
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .card-footer.buttons {
        direction: rtl;
      }
    </style>
  </head>
  <body data-bs-theme="light">
    <div class="card" style="width: 400px">
      <!-- header -->
      <div class="card-header d-flex justify-content-between">
        <h5>Create new user</h5>
        <div class="form-check form-switch d-flex align-items-center gap-2">
          <input
            class="form-check-input"
            type="checkbox"
            role="switch"
            id="toggle-darkmode"
          />
          <label
            class="form-check-label material-symbols-outlined"
            for="toggle-darkmode"
            style="font-size: 25px"
            >dark_mode</label
          >
        </div>
      </div>

      <!-- form -->
      <form
        action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"
        method="post"
        id="createuser"
        class="card-body"
      >
        <!-- User role -->
        <select class="form-select mb-3" id="roleuser" name="roleuser" required>
          <option selected value="">User Role</option>
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>

        <!-- user id -->
        <div class="mb-3">
          <label for="userid" class="form-label">User Id</label>
          <input
            type="number"
            class="form-control uniquekey"
            id="userid"
            name="userid"
            disabled
            required
          />
        </div>

        <!-- user email -->
        <div class="mb-3">
          <label for="useremail" class="form-label">User Email</label>
          <input
            type="email"
            class="form-control uniquekey"
            id="useremail"
            name="useremail"
            disabled
            required
          />
        </div>

        <!-- user name -->
        <div class="mb-3">
          <label for="username" class="form-label">User Name</label>
          <input
            type="text"
            class="form-control"
            id="username"
            name="username"
            required
          />
        </div>

        <!-- user password -->
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            id="password"
            name="password"
          />
        </div>

        <!-- show passwd -->
        <div class="form-check">
          <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="showpasswd"
          />
          <label class="form-check-label" for="showpasswd">
            Show password
          </label>
        </div>
      </form>

      <!-- buttons -->
      <div class="card-footer buttons">
        <button
          type="submit"
          class="btn btn-primary"
          name="save"
          form="createuser"
        >
          Save
        </button>
        <button
          type="reset"
          class="btn btn-link"
          form="createuser"
          onclick="setDefaultType()"
        >
          Cancel
        </button>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      let userrole = document.querySelector("#roleuser");
      let userid = document.querySelector("#userid");
      let useremail = document.querySelector("#useremail");
      let uniquekey = document.querySelectorAll(".uniquekey");

      userrole.addEventListener("change", () => {
        disableUnique();

        if (userrole.value === "admin") {
          useremail.removeAttribute("disabled");
        } else if (userrole.value === "user") {
          userid.removeAttribute("disabled");
        } else {
          disableUnique();
        }
      });

      function disableUnique() {
        uniquekey.forEach((key) => {
          key.setAttribute("disabled", "");
        });
      }

      let showpasswd = document.querySelector("#showpasswd");
      let passwdfield = document.querySelector("#password");
      showpasswd.addEventListener("click", () => {
        if (showpasswd.checked) {
          passwdfield.setAttribute("type", "text");
        } else {
          passwdfield.setAttribute("type", "password");
        }
      });
      function setDefaultType() {
        passwdfield.setAttribute("type", "password");
      }

      let toggleDarkmode = document.querySelector("#toggle-darkmode");
      toggleDarkmode.addEventListener("click", () => {
        if (toggleDarkmode.checked) {
          document.body.setAttribute("data-bs-theme", "dark");
        } else {
          document.body.setAttribute("data-bs-theme", "light");
        }
      });
    </script>
  </body>
</html>
