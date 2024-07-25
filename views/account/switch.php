<?php require_once("../../controller/script.php");
$_SESSION['page-name'] = "Switch Account";
$_SESSION['page-url'] = "switch";
$_SESSION['actual-link'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (!isset($_GET['en'])) {
  header("Location: security");
  exit();
} else if (isset($_GET['en'])) {
  $en = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['en']))));
  $eu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET['eu']))));
  $result = mysqli_query($conn, "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role WHERE users.en_user='$eu'");
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($row['email'], $en)) {
      mysqli_query($conn, "UPDATE users SET id_active='1' WHERE en_user='$eu'");
      $_SESSION['data-user'] = [
        "id" => $row["id_user"],
        "role" => $row["id_role"],
        "role-name" => $row["role"],
        "name" => $row["username"],
        "email" => $row["email"],
        "picture" => $row["img_user"],
        "ip" => $row["ip_user"],
        'encryption' => $row['en_user'],
      ];
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../../resources/auth-header.php") ?></head>

<body <?= $disablePage ?> id="kt_body" class="auth-bg">
  <div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid">
      <div class="d-flex flex-row-fluid flex-column flex-column-fluid text-center p-10 py-lg-20">
        <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Your Email is Verified</h1>
        <div class="fs-3 fw-bold text-muted mb-10">
          Your email has been verified and you can use your account again in Netmedia Framecode, please login to manage your project.
        </div>
        <div class="text-center mb-10">
          <a href="../" class="btn btn-lg btn-primary fw-bolder">Sign in to Dashboard</a>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("../../resources/auth-footer.php") ?>
</body>

</html>