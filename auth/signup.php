<?php
require_once("../controller/script.php");
require_once("redirect.php");
$redirectURI = $baseURL . "/auth/signup";
require_once("config.php");
$_SESSION["page-name"] = "Sign Up";
$_SESSION["page-url"] = "signup";

if (isset($_GET["code"])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
  $client->setAccessToken($token);
  $gauth = new Google_Service_Oauth2($client);
  $google_info = $gauth->userinfo->get();
  $name = $google_info->name;
  $email = $google_info->email;
  $picture = $google_info->picture;
  $eu = crc32($email);
  $ip = $_SERVER["REMOTE_ADDR"];

  // check if email already exists
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($result) > 0) {
    $_SESSION["message-danger"] = "Sorry, the email is already registered";
    $_SESSION["time-message"] = time();
    header("Location: " . $_SESSION["page-url"]);
    return false;
  }

  // insert user to database
  mysqli_query($conn, "INSERT INTO users (en_user, id_active, username, email, img_user, ip_user) VALUES ('$eu', '1', '$name', '$email', '$picture','$ip')");

  // redirect to home page
  $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND username='$name'");
  if (mysqli_num_rows($result) == 0) {
    $_SESSION["message-danger"] = "Sorry, your account has not been registered";
    $_SESSION["time-message"] = time();
    header("Location: " . $_SESSION["page-url"]);
  } else if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION["data-user"] = [
      "id" => $row["id_user"],
      "role" => $row["id_role"],
      "name" => $row["username"],
      "email" => $row["email"],
      "picture" => $row["img_user"],
      "ip" => $row["ip_user"],
      'encryption' => $row['en_user'],
    ];
    header("Location: ../views/");
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
    <!--begin::Authentication - Sign-up -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
      <!--begin::Content-->
      <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Wrapper-->
        <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
          <!--begin::Form-->
          <form class="form form-signup w-100" method="POST" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="verification">
            <!--begin::Heading-->
            <div class="mb-10 text-center">
              <!--begin::Title-->
              <h1 class="text-dark mb-3">Buat sebuah akun</h1>
              <!--end::Title-->
              <!--begin::Link-->
              <div class="text-gray-400 fw-bold fs-4">Sudah memiliki akun?
                <a href="signin" class="link-primary fw-bolder">Masuk di sini</a>
              </div>
              <!--end::Link-->
            </div>
            <!--end::Heading-->
            <!--begin::Action-->
            <a href="<?= $client->createAuthUrl(); ?>" class="btn btn-light-primary fw-bolder w-100 mb-10">
              <img alt="Logo" src="../assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Daftar dengan Google</a>
            <!--end::Action-->
            <!--begin::Separator-->
            <div class="d-flex align-items-center mb-10">
              <div class="border-bottom border-gray-300 mw-50 w-100"></div>
              <span class="fw-bold text-gray-400 fs-7 mx-2">ATAU</span>
              <div class="border-bottom border-gray-300 mw-50 w-100"></div>
            </div>
            <!--end::Separator-->
            <!--begin::Input group-->
            <div class="row fv-row mb-7">
              <label class="form-label fw-bolder text-dark fs-6">Username</label>
              <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="username" value="<?php if (isset($_POST['username'])) {
                                                                                                                echo $_POST['username'];
                                                                                                              } ?>" autocomplete="off" />
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
              <label class="form-label fw-bolder text-dark fs-6">Email</label>
              <input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" value="<?php if (isset($_POST['email'])) {
                                                                                                                echo $_POST['email'];
                                                                                                              } ?>" autocomplete="off" />
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="mb-10 fv-row" data-kt-password-meter="true">
              <!--begin::Wrapper-->
              <div class="mb-1">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6">Kata sandi</label>
                <!--end::Label-->
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                  <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
                  <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                  </span>
                </div>
                <!--end::Input wrapper-->
                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                  <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
              </div>
              <!--end::Wrapper-->
              <!--begin::Hint-->
              <div class="text-muted">Gunakan 8 karakter atau lebih dengan campuran huruf, angka, dan simbol.</div>
              <!--end::Hint-->
            </div>
            <!--end::Input group=-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
              <label class="form-label fw-bolder text-dark fs-6">konfirmasi sandi</label>
              <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off" />
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
              <button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                <span class="indicator-label">Kirim</span>
                <span class="indicator-progress">Harap tunggu...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
            <!--end::Actions-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Content-->
    </div>
    <!--end::Authentication - Sign-up-->
  </div>
  <!--end::Main-->
  <?php require_once("../sections/auth-footer.php") ?>
  <script src="../assets/js/signup.js"></script>
</body>
<!--end::Body-->

</html>