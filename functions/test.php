<?php
/**
 * This code will benchmark your server to determine how high of a cost you can
 * afford. You want to set the highest cost that you can without slowing down
 * you server too much. 10 is a good baseline, and more is good if your servers
 * are fast enough. The code below aims for ≤ 350 milliseconds stretching time,
 * which is an appropriate delay for systems handling interactive logins.
 */
$timeTarget = 0.350; // 350 milliseconds

$cost = 10;
do {
    $cost++;
    $start = microtime(true);
    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
    $end = microtime(true);
} while (($end - $start) < $timeTarget);

echo "Appropriate Cost Found: " . $cost;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modal with Back Button Support</title>
  <style>
    .modal {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }
    .modal.open {
      display: block;
    }
  </style>
</head>
<body>

<button id="openModal">Open Modal</button>

<div id="myModal" class="modal">
  <p>This is a modal!</p>
  <button id="closeModal">Close Modal</button>
</div>

<script>
  const modal = document.getElementById('myModal');
  const openModalButton = document.getElementById('openModal');
  const closeModalButton = document.getElementById('closeModal');

  openModalButton.addEventListener('click', function() {
    // Buka modal
    modal.classList.add('open');

    // Tambahkan state baru ke riwayat browser
    history.pushState({ modalOpen: true }, '');
  });

  closeModalButton.addEventListener('click', function() {
    // Tutup modal
    closeModal();
  });

  function closeModal() {
    modal.classList.remove('open');

    // Kembalikan riwayat ke keadaan semula
    history.back();
  }

  // Tangani event popstate
  window.addEventListener('popstate', function(event) {
    // Cek apakah modal sedang terbuka, jika ya, tutup modal
    console.log(event.state);
    if (modal.classList.contains('open')) {
      closeModal();
    }
  });
</script>

</body>
</html>
