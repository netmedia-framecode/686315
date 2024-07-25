<title><?php if (isset($_SESSION["page-name"])) {
          if ($_SESSION["page-name"] != "") {
            echo $_SESSION["page-name"] . " - ";
          }
        } ?>PLBN Motamasin pro</title>
<meta charset="utf-8" />
<noscript>
  <meta http-equiv="refresh" content="0;url=406" />
</noscript>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="dashboard" />
<meta property="og:title" content="Auth - PLBN Motamasin pro" />
<meta property="og:url" content="https://plbn_motamasin_pro.com/auth/" />
<meta property="og:site_name" content="Auth - PLBN Motamasin pro" />
<link rel="canonical" href="https://plbn_motamasin_pro.com/auth/" />
<link rel="shortcut icon" href="" />
<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
<!--end::Fonts-->
<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="<?= $baseURL; ?>/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Page Vendor Stylesheets-->
<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="<?= $baseURL; ?>/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
<link href="<?= $baseURL; ?>/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->
<?php if ($_SESSION["theme-mode"] == "dark") { ?>
  <!--begin::Global Stylesheets Bundle(used by all pages)-->
  <link href="<?= $baseURL; ?>/assets/plugins/global/plugins.dark.bundle.css" rel="stylesheet" type="text/css" />
  <link href="<?= $baseURL; ?>/assets/css/style.dark.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Global Stylesheets Bundle-->
<?php } ?>
<link href="<?= $baseURL; ?>/assets/css/scroll.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?= $baseURL; ?>/assets/datatable/datatables.css">
<script src="<?= $baseURL; ?>/assets/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="<?= $baseURL; ?>/assets/vendor/twbs/bootstrap-icons/font/bootstrap-icons.css">
<script src="<?= $baseURL ?>/assets/sweetalert/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="<?= $baseURL ?>/assets/leaflet/leaflet.css">
<script src="<?= $baseURL ?>/assets/leaflet/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<style>
  .text-dash {
    font-size: 35px;
  }

  .icon-dash i {
    font-size: 45px;
  }
</style>
