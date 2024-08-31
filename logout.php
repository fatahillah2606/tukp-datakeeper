<?php
setcookie("user-type", "", time() - 3600, "/");
setcookie("user-name", "", time() - 3600, "/");
setcookie("user-id", "", time() - 3600, "/");
header("Location: /");
exit();
?>