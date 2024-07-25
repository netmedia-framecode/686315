<!-- Site navigation -->
<nav
  class="site-navbar site-navbar-transparent navbar navbar-expand-lg navbar-dark fixed-top bg-white shadow-light p-lg-4"
  data-navbar-base="navbar-dark" data-navbar-toggled="navbar-light" data-navbar-scrolled="navbar-light">

  <!-- Brand -->
  <a class="navbar-brand" href="./">
    <img src="<?= $baseURL ?>/assets/images/logo-kiri.png" class="" style="width: 60px;" alt="">
  </a>

  <!-- Toggler -->
  <button class="navbar-toggler-alternative" type="button" data-toggle="collapse" data-target="#navbarCollapse"
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-alternative-icon"></span>
  </button>

  <!-- Collapse -->
  <div class="collapse navbar-collapse" id="navbarCollapse">

    <!-- Navigation -->
    <ul class="navbar-nav ml-auto mr-3" id="navigation">
      <li class="nav-item active">
        <a class="nav-link" href="./">Beranda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="upload-data">Upload Data</a>
      </li>
    </ul>

    <!-- Button -->
    <a class="btn btn-primary d-block d-lg-inline-block ml-lg-3"
      href="auth/" rel="noopener"><i class="bi bi-box-arrow-in-right"></i> Login</a>

  </div>
</nav>