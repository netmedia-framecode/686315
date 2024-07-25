<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Overview";
$_SESSION['page-url'] = "overview";
$_SESSION['actual-link'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['object-link'] = $baseURL . "/views/account/";
require_once("../../templates/views-top.php");
require_once("../../sections/views-nav-account.php");
?>

<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
  <div class="card-header cursor-pointer">
    <div class="card-title m-0">
      <h3 class="fw-bolder m-0">Detail Profil</h3>
    </div>
    <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/account/settings'" class="btn btn-primary align-self-center">Ubah Profil</a>
  </div>
  <?php foreach ($dataUser as $row) : ?>
    <div class="card-body p-9">
      <div class="row mb-7">
        <label class="col-lg-4 fw-bold text-muted">Nama Lengkap</label>
        <div class="col-lg-8">
          <span class="fw-bolder fs-6 text-gray-800"><?= $row['username'] ?></span>
        </div>
      </div>
      <div class="row mb-7">
        <label class="col-lg-4 fw-bold text-muted">Email</label>
        <div class="col-lg-8">
          <span class="fw-bolder fs-6 text-gray-800"><?= $row['email'] ?></span>
        </div>
      </div>
      <div class="row mb-7">
        <label class="col-lg-4 fw-bold text-muted">Nomor ponsel</label>
        <div class="col-lg-8 d-flex align-items-center">
          <span class="fw-bolder fs-6 text-gray-800 me-2"><?= $row['phone'] ?></span>
        </div>
      </div>
      <div class="row mb-7">
        <label class="col-lg-4 fw-bold text-muted">Alamat</label>
        <div class="col-lg-8 d-flex align-items-center">
          <span class="fw-bolder fs-6 text-gray-800 me-2"><?= $row['address'] ?></span>
        </div>
      </div>
      <div class="row mb-7">
        <label class="col-lg-4 fw-bold text-muted">Negara
          <i class="bi bi-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Your country data is taken from the location where your account was registered."></i></label>
        <div class="col-lg-8">
          <span class="fw-bolder fs-6 text-gray-800">
            <?php if (empty($row['country'])) {
              echo $data_geolocation->country;
            } else if (!empty($row['country'])) {
              echo $row['country'];
            } ?></span>
        </div>
      </div>
      <div class="row mb-7">
        <label class="col-lg-4 fw-bold text-muted">Akun dibuat</label>
        <div class="col-lg-8 d-flex align-items-center">
          <span class="fw-bolder fs-6 text-gray-800 me-2"><?php $date = date_create($row['created_at']);
                                                          echo date_format($date, "l, d M Y"); ?></span>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<?php require_once("../../templates/views-bottom.php"); ?>