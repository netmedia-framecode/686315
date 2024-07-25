<?php if (!isset($_SESSION['data-user'])) {
  header("Location: " . $baseURL . "/auth/");
  exit();
}
