<?php require_once("../controller/script.php");
if (!isset($_GET['mode'])) {
  header("Location: " . $_SESSION['actual-link']);
  exit();
} else if (isset($_GET['mode'])) {
  $mode = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['mode']))));
  $_SESSION['theme-mode'] = $mode;
  header("Location: " . $_SESSION['actual-link']);
  exit();
}
