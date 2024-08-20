<?php
if ($_GET['message']) {
  echo "<script>alert('".$_GET['message']."')</script>";
}
?>