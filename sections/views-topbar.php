<!--begin::Header-->
<div id="kt_header" class="header shadow" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
  <!--begin::Container-->
  <div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
      <!--begin::Heading-->
      <h1 class="text-dark fw-bolder my-1 fs-2">Selamat datang <?= $_SESSION['data-user']['name'] ?>
        <small class="text-muted fs-6 fw-normal ms-1"></small>
      </h1>
      <!--end::Heading-->
      <!--begin::Breadcrumb-->
      <ul class="breadcrumb fw-bold fs-base my-1">
        <li class="breadcrumb-item text-muted">
          <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/'" class="text-muted">Dashboard</a>
        </li>
        <?php if ($_SESSION['page-url'] != "./") { ?>
          <li class="breadcrumb-item text-muted"><?= $_SESSION['page-name'] ?></li>
        <?php } ?>
      </ul>
      <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Wrapper-->
    <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
      <!--begin::Aside mobile toggle-->
      <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
        <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
        <span class="svg-icon svg-icon-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor" />
            <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="currentColor" />
          </svg>
        </span>
        <!--end::Svg Icon-->
      </div>
      <!--end::Aside mobile toggle-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Toolbar wrapper-->
    <div class="d-flex align-items-center flex-shrink-0">

      <!--begin::Theme mode-->
      <div class="d-flex align-items-center ms-2 ms-lg-3">
        <!--begin::Menu toggle-->
        <a href="#" class="btn btn-icon btn-active-light-primaryw-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
          <?php if ($_SESSION['theme-mode'] == "dark") { ?>
            <i class="bi bi-moon-stars fs-1"></i>
          <?php } else { ?>
            <i class="bi bi-cloud-moon fs-1"></i>
          <?php } ?>
        </a>
        <!--begin::Menu toggle-->
        <!--begin::Menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-muted menu-active-bg menu-state-primary fw-bold py-4 fs-6 w-200px" data-kt-menu="true">
          <!--begin::Menu item-->
          <div class="menu-item px-3 my-1">
            <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL ?>/views/theme-mode.php?mode=light'" class="menu-link px-3 <?php if ($_SESSION['theme-mode'] == "light") {
                                                                                                                                                  echo " active";
                                                                                                                                                } ?>">
              <span class="menu-icon">
                <i class="bi bi-cloud-moon fs-2"></i>
              </span>
              <span class="menu-title">Light</span>
            </a>
          </div>
          <!--end::Menu item-->
          <!--begin::Menu item-->
          <div class="menu-item px-3 my-1">
            <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL ?>/views/theme-mode.php?mode=dark'" class="menu-link px-3 <?php if ($_SESSION['theme-mode'] == "dark") {
                                                                                                                                                echo " active";
                                                                                                                                              } ?>">
              <span class="menu-icon">
                <i class="bi bi-moon-stars fs-2"></i>
              </span>
              <span class="menu-title">Dark</span>
            </a>
          </div>
          <!--end::Menu item-->
        </div>
        <!--end::Menu-->
      </div>
      <!--end::Theme mode-->

      <!--begin::User-->
      <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
          <img src="<?php $url = $_SESSION['data-user']['picture'];
                      if (isGoogleUrl($url)) {
                          echo $_SESSION['data-user']['picture'];
                      } else {
                          echo $baseURL."/assets/images/profile/".$_SESSION['data-user']['picture'];
                      } ?>" alt="<?= $_SESSION['data-user']['name'] ?>" />
        </div>
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
          <!--begin::Menu item-->
          <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
              <!--begin::Avatar-->
              <div class="symbol symbol-50px me-5">
                <img alt="<?= $_SESSION['data-user']['name'] ?>" src="<?php $url = $_SESSION['data-user']['picture'];
                      if (isGoogleUrl($url)) {
                          echo $_SESSION['data-user']['picture'];
                      } else {
                          echo $baseURL."/assets/images/profile/".$_SESSION['data-user']['picture'];
                      } ?>" />
              </div>
              <!--end::Avatar-->
              <!--begin::Username-->
              <div class="d-flex flex-column w-75">
                <div class="fw-bolder d-flex align-items-center fs-5"><?= $_SESSION['data-user']['name'] ?></div>
                <div style="overflow-x: auto;">
                  <a style="cursor: pointer;" onclick="window.open('https://mail.google.com/mail/inbox', '_blank')" class="fw-bold text-muted text-hover-primary fs-7"><?= $_SESSION['data-user']['email'] ?></a>
                </div>
              </div>
              <!--end::Username-->
            </div>
          </div>
          <!--end::Menu item-->
          <!--begin::Menu separator-->
          <div class="separator my-2"></div>
          <!--end::Menu separator-->
          <!--begin::Menu item-->
          <div class="menu-item px-5">
            <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/account/overview'" class="menu-link px-5">Profile</a>
          </div>
          <!--end::Menu item-->
          <!--begin::Menu item-->
          <div class="menu-item px-5">
            <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/account/settings'" class="menu-link px-5">
              <span class="menu-text">Settings</span>
            </a>
          </div>
          <!--end::Menu item-->
          <!--begin::Menu item-->
          <div class="menu-item px-5">
            <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/account/security'" class="menu-link px-5">
              <span class="menu-text">Security</span>
            </a>
          </div>
          <!--end::Menu item-->
          <!--begin::Menu item-->
          <div class="menu-item px-5">
            <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/account/logs'" class="menu-link px-5">
              <span class="menu-text">Activity Logs</span>
            </a>
          </div>
          <!--end::Menu item-->
          <!--begin::Menu separator-->
          <div class="separator my-2"></div>
          <!--end::Menu separator-->
          <!--begin::Menu item-->
          <div class="menu-item px-5">
            <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/auth/signout'" class="menu-link px-5">Signout</a>
          </div>
          <!--end::Menu item-->
        </div>
        <!--end::User account menu-->
        <!--end::Menu wrapper-->
      </div>
      <!--end::User -->

    </div>
    <!--end::Toolbar wrapper-->
  </div>
  <!--end::Container-->
</div>
<!--end::Header-->