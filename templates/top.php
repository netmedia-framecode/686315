<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>

  <?php require_once("sections/head.php"); ?>

</head>

<body class="layout-wide">

  <div class="loader bg-dark">
    <div class="spinner-grow text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <div id="top"></div>

  <?php require_once("sections/navbar.php"); ?>

  <!-- Back To Top Button -->
  <a href="#top" class="backtotop">
    <span>Back To Top</span>
    <i class="bi bi-arrow-up"></i>
  </a>

  <!-- Scroll progress -->
  <div class="scroll-progress">
    <div class="sp-left">
      <div class="sp-inner"></div>
      <div class="sp-inner progress"></div>
    </div>
    <div class="sp-right">
      <div class="sp-inner"></div>
      <div class="sp-inner progress"></div>
    </div>
  </div>

  <!-- Fullpage content -->
  <div class="ln-fullpage" data-navigation="true"></div>