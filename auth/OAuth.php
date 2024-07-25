<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "OAuth";
$_SESSION["page-url"] = "OAuth";
?>

<!DOCTYPE html>
<html lang="en">

<head><?php require_once("../sections/auth-header.php"); ?></head>

<body <?= $disablePage ?> id="kt_body" class="auth-bg">
  <?php if (isset($_SESSION['message-success'])) { ?>
    <div class="message-success" data-message-success="<?= $_SESSION['message-success'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-info'])) { ?>
    <div class="message-info" data-message-info="<?= $_SESSION['message-info'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-warning'])) { ?>
    <div class="message-warning" data-message-warning="<?= $_SESSION['message-warning'] ?>"></div>
  <?php }
  if (isset($_SESSION['message-danger'])) { ?>
    <div class="message-danger" data-message-danger="<?= $_SESSION['message-danger'] ?>"></div>
  <?php } ?>
  <div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">
      <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
          <form class="form w-100" method="post" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="../views/" action="#">
            <div class="text-center mb-10">
              <h1 class="text-dark mb-3">GAuth PLBN Motamasin pro</h1>
            </div>
            <div class="fv-row mb-10">
              <label class="form-label fs-6 fw-bolder text-dark">Masukkan kode Authenticator Anda</label>
              <input class="form-control form-control-lg form-control-solid" type="number" name="oauth" autocomplete="off" />
            </div>
            <div class="text-center">
              <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                <span class="indicator-label">Masuk</span>
                <span class="indicator-progress">Harap tunggu...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
              <a href="<?= $baseURL; ?>" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php require_once("../sections/auth-footer.php"); ?>
  <script src="<?= $baseURL; ?>/assets/js/oauth.js"></script>
</body>

</html>
