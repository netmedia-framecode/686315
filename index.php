<?php require_once("controller/script.php");
$_SESSION["page-name"] = "";
$_SESSION["page-url"] = "";
$_SESSION['actual-link'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['object-link'] = $baseURL . "";
require_once("templates/top.php");
?>

<!-- Section - Home -->
<section class="ln-section d-flex js-min-vh-100" data-anchor="home" data-tooltip="Home" data-overlay-color="#00050e"
  data-overlay-opacity="50">
  <div class="overlay overlay-advanced">
    <div class="overlay-inner bg-image-holder bg-cover">
      <img src="assets/images/banner.png" alt="background">
    </div>
    <div class="overlay-inner bg-dark opacity-70"></div>
  </div>
  <div class="container align-self-center text-white">
    <div class="row">
      <div class="col-12 col-lg-9 col-xl-6">

        <h1 class="mb-4 animated" data-animation="fadeInUp">PLBN Motamasin</h1>
        <p class="mb-7 animated" data-animation="fadeInUp" data-animation-delay="200">Terletak di Kabupaten Malaka, Nusa
          Tenggara Timur, PLBN Motamasin merupakan pintu gerbang perbatasan Indonesia dengan Timor Leste yang
          difungsikan untuk kebutuhan CIQSN (Custom, Immigration, Quarantine and Security).</p>
      </div>
    </div>
  </div>
</section>

<!-- Section - What we do -->
<section class="ln-section d-xl-flex" id="upload-data">
  <div class="container align-self-xl-center">

    <div class="row">
      <div class="col-12 col-xl-5 mb-8 mb-xl-0">
        <h2 class="animated mb-4" data-animation="fadeInUp">Selamat Datang dan Selamat Jalan di Pos Lintas Batas Negara
          Motamasin</h2>
        <p class="animated" data-animation="fadeInUp" data-animation-delay="150"><span>
            Kami mengucapkan selamat jalan kepada para pelintas batas yang akan meninggalkan wilayah Indonesia melalui
            Pos Lintas Batas Negara (PLBN) Motamasin. Semoga perjalanan Anda menyenangkan dan aman hingga tiba di
            tujuan. Pastikan semua dokumen perjalanan Anda sudah lengkap dan sesuai dengan ketentuan yang berlaku.
            Terima kasih atas kunjungan Anda dan sampai jumpa lagi di masa mendatang. Jangan lupa untuk selalu menjaga
            kesehatan dan keselamatan selama perjalanan.</span></p>
      </div>
      <div class="col-12 col-xl-6 offset-xl-1">
        <div class="row">

          <div class="col-md-6 col-sm-6 mb-8 animated" data-animation="fadeInUp">
            <div class="card shadow border-0 text-center" style="width: 15rem;">
              <i class="bi bi-truck" style="font-size: 60px;"></i>
              <div class="card-body">
                <h3 class="h4 mb-0">Keberangkatan</h3>
                <a href="auth/signup" class="btn btn-primary mt-5">Upload Data</a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 mb-8 animated" data-animation="fadeInUp">
            <div class="card shadow border-0 text-center" style="width: 15rem;">
              <i class="bi bi-truck" style="font-size: 60px;"></i>
              <div class="card-body">
                <h3 class="h4 mb-0">Kedatangan</h3>
                <a href="auth/signup" class="btn btn-primary mt-5">Upload Data</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</section>

<?php require_once("templates/bottom.php");?>