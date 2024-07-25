<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->

<head><?php require_once(__DIR__ . "/../sections/views-header.php") ?></head>
<!--end::Head-->

<!--begin::Body-->

<body <?= $disablePage ?> id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
  <?php foreach ($messageTypes as $type) {
    if (isset($_SESSION["alert"]["message_$type"])) {
      echo "<div class='message-$type' data-message-$type='{$_SESSION["alert"]["message_$type"]}'></div>";
    }
  } ?>
  <!--begin::Main-->
  <!--begin::Root-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
      <!--begin::Aside-->
      <?php require_once(__DIR__ . "/../sections/views-sidebar.php") ?>
      <!--end::Aside-->
      <!--begin::Wrapper-->
      <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <!--begin::Header-->
        <?php require_once(__DIR__ . "/../sections/views-topbar.php") ?>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          <!--begin::Container-->
          <div class="container-xxl" id="kt_content_container">