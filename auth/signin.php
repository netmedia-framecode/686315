<?php require_once("../controller/script.php");
require_once("redirect.php");
$redirectURI = $baseURL . "/auth/signin";
require_once("config.php");
$_SESSION["page-name"] = "Sign In";
$_SESSION["page-url"] = "signin";

if (isset($_GET["code"])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
  $client->setAccessToken($token);
  $gauth = new Google_Service_Oauth2($client);
  $google_info = $gauth->userinfo->get();
  $name = $google_info->name;
  $email = $google_info->email;
  $picture = $google_info->picture;
  $ip = $_SERVER['REMOTE_ADDR'];

  $result = mysqli_query($conn, "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role WHERE users.email='$email'");
  if (mysqli_num_rows($result) == 0) {
    $_SESSION["message-danger"] = "Sorry, your account is not registered yet";
    $_SESSION["time-message"] = time();
    header("Location: " . $_SESSION["page-url"]);
  } else if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $idUser = $row['id_user'];
    if ($row['id_active'] == 1) {
      $checkGAuth = mysqli_query($conn, "SELECT * FROM users_otentikasi WHERE id_user='$idUser'");
      if (mysqli_num_rows($checkGAuth) == 0) {
        $device = get_client_browser() . " - " . getPlatform();
        mysqli_query($conn, "INSERT INTO users_login_logs(id_user,device,ip_address) VALUES('$idUser','$device','$ip')");
        $_SESSION["data-user"] = [
          "id" => $row["id_user"],
          "role" => $row["id_role"],
          "role-name" => $row["role"],
          "name" => $row["username"],
          "email" => $row["email"],
          "picture" => $row["img_user"],
          "ip" => $row["ip_user"],
          'encryption' => $row['en_user'],
        ];
        header("Location: ../views/");
      } else if (mysqli_num_rows($checkGAuth) > 0) {
        $_SESSION['data-auth'] = [
          'id' => $row['id_user'],
        ];
        header('Location: OAuth');
      }
    } else if ($row['id_active'] == 2) {
      $status = "WRN";
      $problem = "login failed, account not activated.";
      $device = get_client_browser() . " - " . getPlatform();
      mysqli_query($conn, "INSERT INTO users_login_logs(id_user,status,problem,device,ip_address) VALUES('$idUser','$status','$problem','$device','$ip')");
      $_SESSION['message-danger'] = "Sorry, your account has not been activated.";
      $_SESSION['time-message'] = time();
      header('Location: ' . $_SESSION['page-url']);
      return false;
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
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
      <!--begin::Content-->
      <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
          <!--begin::Form-->
          <form class="w-100" method="POST" action="#">
            <!--begin::Heading-->
            <div class="text-center mb-10">
              <!--begin::Title-->
              <h1 class="text-dark mb-3">Masuk ke PLBN Motamasin pro</h1>
              <!--end::Title-->
              <!--begin::Link-->
              <div class="text-gray-400 fw-bold fs-4">
                Belum punya akun?
                <a href="signup" class="link-primary fw-bolder">Buat sebuah akun</a>
              </div>
              <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
              <!--begin::Label-->
              <label class="form-label fs-6 fw-bolder text-dark">Email</label>
              <!--end::Label-->
              <!--begin::Input-->
              <input class="form-control form-control-lg form-control-solid" type="text" name="email" value="<?php if (isset($_POST['email'])) {
                                                                                                                echo $_POST['email'];
                                                                                                              } ?>" autocomplete="off" required />
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
              <!--begin::Wrapper-->
              <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Kata Sandi</label>
                <!--end::Label-->
                <!--begin::Link-->
                <a href="password-reset" class="link-primary fs-6 fw-bolder">Lupa Kata Sandi ?</a>
                <!--end::Link-->
              </div>
              <!--end::Wrapper-->
              <!--begin::Input-->
              <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" required />
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
              <!--begin::Submit button-->
              <button type="submit" name="signin" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Melanjutkan</span>
                <span class="indicator-progress">Harap tunggu...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
              <!--end::Submit button-->
              <!--begin::Separator-->
              <div class="text-center text-muted text-uppercase fw-bolder mb-5">
                or
              </div>
              <!--end::Separator-->
              <!--begin::Google link-->
              <a href="<?= $client->createAuthUrl(); ?>" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                <img alt="Logo" src="../assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Lanjutkan dengan Google</a>
              <!--end::Google link-->
              <!--begin::Back Home link-->
              <a href="../" class="btn btn-light btn-sm">Kembali</a>
              <!--end::Back Home link-->
            </div>
            <!--end::Actions-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Content-->
    </div>
    <!--end::Authentication - Sign-in-->
  </div>
  <!--end::Main-->
  <?php require_once("../sections/auth-footer.php") ?>
</body>
<!--end::Body-->

</html>
