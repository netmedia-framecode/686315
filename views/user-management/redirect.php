<?php require_once("../../controller/script.php");
if (!isset($_SESSION['data-user'])) {
  header("Location: " . $baseURL . "/auth/");
  exit();
} else {
  if (!isset($_GET['log'])) {
    if ($_SESSION['data-user']['role'] != 1) {
      header("Location: " . $baseURL . "/views/");
      exit();
    }
  } else {
    $id_user = valid($conn, $_GET['log']);
    $_SESSION['data'] = [
      'id-user' => $id_user,
    ];
    header("Location: activity-log");
    exit;
  }

  if (isset($_GET['back']) == 1) {
    unset($_SESSION['data']['id-user']);
    header("Location: users");
    exit;
  }
}
