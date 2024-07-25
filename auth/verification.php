<?php
require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "Account Verification";
$_SESSION["page-url"] = "verification";

if (isset($_GET["en"])) {
  $en = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET["en"]))));
  $eu = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_GET["eu"]))));
  $result = mysqli_query($conn, "SELECT * FROM users WHERE en_user='$eu'");
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($row["email"], $en)) {
      mysqli_query($conn, "UPDATE users SET id_active='1' WHERE en_user='$eu'");
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head><?php require_once("../sections/auth-header.php") ?></head>
<!--end::Head-->
<!--begin::Body-->

<body <?= $disablePage ?> id="kt_body" class="auth-bg">
  <?php if (isset($_SESSION["message-success"])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION["message-success"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-info"])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION["message-info"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-warning"])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION["message-warning"] ?>"></div>
  <?php }
  if (isset($_SESSION["message-danger"])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION["message-danger"] ?>"></div>
  <?php } ?>
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Signup Verify Email -->
    <div class="d-flex flex-column flex-column-fluid">
      <!--begin::Content-->
      <div class="d-flex flex-row-fluid flex-column flex-column-fluid text-center p-10 py-lg-20">
        <?php if (!isset($_GET["eu"])) { ?>
          <!--begin::Logo-->
          <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Verifikasi Email Anda</h1>
          <!--end::Logo-->
          <!--begin::Message-->
          <div class="fs-3 fw-bold text-muted mb-10">Kami telah mengirim email ke
            <a href="https://mail.google.com/mail/u/0/#inbox" class="link-primary fw-bolder"><?php if (isset($_SESSION["usersRegistered"])) {
                                                                                                echo $_SESSION["usersRegistered"]["email"];
                                                                                              } ?></a>
            <br />ikuti tautan untuk memverifikasi email Anda.
          </div>
          <!--end::Message-->
          <!--begin::Action-->
          <div class="text-center mb-10">
            <a href="signin" class="btn btn-lg btn-primary fw-bolder">Lewati untuk saat ini</a>
          </div>
          <!--end::Action-->
        <?php } else { ?>
          <!--begin::Logo-->
          <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Email Anda Diverifikasi</h1>
          <!--end::Logo-->
          <!--begin::Message-->
          <div class="fs-3 fw-bold text-muted mb-10">
            Email Anda telah diverifikasi dan Anda dapat menggunakan akun Anda di PLBN Motamasin pro
          </div>
          <!--end::Message-->
          <!--begin::Action-->
          <div class="text-center mb-10">
            <a href="signin" class="btn btn-lg btn-primary fw-bolder">Masuk</a>
          </div>
          <!--end::Action-->
        <?php } ?>
      </div>
      <!--end::Content-->
    </div>
    <!--end::Authentication - Signup Verify Email-->
  </div>
  <!--end::Main-->
  <?php require_once("../sections/auth-footer.php") ?>
</body>
<!--end::Body-->

</html>
