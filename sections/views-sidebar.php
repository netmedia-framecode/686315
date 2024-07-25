<div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
  <!--begin::Primary-->
  <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
    <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto pt-10" id="kt_aside_logo">
      <a style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/'">
        <img src="<?= $baseURL?>/assets/images/logo-kiri.png" alt="PLBN Motamasin" style="width: 50px;">
      </a>
    </div>
    <!--begin::Nav-->
    <div class="aside-nav d-flex flex-column flex-lg-center flex-column-fluid w-100 py-5 px-3" id="kt_aside_nav">
      <!--begin::Aside Primary Menu Wrapper-->
      <div class="w-100 hover-scroll-overlay-y d-flex" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_nav, #kt_aside_menu_wrapper" data-kt-scroll-offset="5px">
        <!--begin::Primary menu-->
        <div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5" data-kt-menu="true">

          <!-- Dashboard -->
          <div class="menu-item  <?php if ($_SESSION['object-link'] == $baseURL . "/views/") {
                                    echo "here show";
                                  } ?>">
            <a class="menu-link menu-center <?php if ($_SESSION['page-url'] == "./") {
                                              echo "active";
                                            } ?>" style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/'">
              <span class="menu-icon me-0">
                <span class="svg-icon svg-icon-2x">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
                  </svg>
                </span>
              </span>
            </a>
          </div>

          <!-- Account -->
          <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-1 <?php if ($_SESSION['object-link'] == $baseURL . "/views/account/") {
                                                                                                                                    echo "here show";
                                                                                                                                  } ?>">
            <span class="menu-link menu-center <?php if ($_SESSION['object-link'] == $baseURL . "/views/account/") {
                                                  echo "active";
                                                } ?>">
              <span class="menu-icon me-0">
                <i class="bi bi-person-fill fa-2x"></i>
              </span>
            </span>
            <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
              <div class="menu-item">
                <div class="menu-content">
                  <span class="menu-section fs-5 fw-bolder ps-1 py-1">Akun</span>
                </div>
              </div>
              <div class="menu-item">
                <a class="menu-link" style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/account/overview'">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Overview</span>
                </a>
              </div>
              <div class="menu-item">
                <a class="menu-link" style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/account/settings'">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Settings</span>
                </a>
              </div>
              <div class="menu-item">
                <a class="menu-link" style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/account/security'">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Security</span>
                </a>
              </div>
              <div class="menu-item">
                <a class="menu-link" style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/account/logs'">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Activity Log</span>
                </a>
              </div>
            </div>
          </div>

          <!-- Action :: Menu Management -->
          <?php
          $queryMenu = "SELECT users_menu.id_menu, users_menu.menu, users_menu.icon, users_menu.folder
                  FROM users_menu JOIN users_access_menu
                  ON users_menu.id_menu = users_access_menu.id_menu
                  WHERE users_access_menu.id_role = '$role'
                  ORDER BY users_access_menu.id_menu ASC
                ";
          $menu = mysqli_query($conn, $queryMenu);
          foreach ($menu as $m) :
          ?>
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item py-1 <?php if ($_SESSION['object-link'] == $baseURL . "/views/" . $m['folder'] . "/") {
                                                                                                                                      echo "here show";
                                                                                                                                    } ?>">
              <span class="menu-link menu-center <?php if ($_SESSION['object-link'] == $baseURL . "/views/" . $m['folder'] . "/") {
                                                    echo "active";
                                                  } ?>">
                <span class="menu-icon me-0">
                  <i class="<?= $m['icon']; ?> fa-2x"></i>
                </span>
              </span>
              <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                <div class="menu-item">
                  <div class="menu-content">
                    <span class="menu-section fs-5 fw-bolder ps-1 py-1"><?= $m['menu']; ?></span>
                  </div>
                </div>
                <?php
                $menuId = $m['id_menu'];
                $querySubMenu = "SELECT * FROM users_sub_menu 
                      JOIN users_menu ON users_sub_menu.id_menu = users_menu.id_menu
                      JOIN users_access_sub_menu ON users_sub_menu.id_sub_menu=users_access_sub_menu.id_sub_menu
                      WHERE users_sub_menu.id_menu = $menuId
                      AND users_sub_menu.id_active = 1
                      AND users_access_sub_menu.id_role = '$role'
                    ";
                $subMenu = mysqli_query($conn, $querySubMenu);
                foreach ($subMenu as $sm) : ?>
                  <div class="menu-item">
                    <a class="menu-link" style="cursor: pointer;" onclick="window.location.href='<?= $baseURL; ?>/views/<?= $m['folder']; ?>/<?= $sm['file']; ?>'">
                      <span class="menu-bullet">
                        <span class="bullet bullet-dot"></span>
                      </span>
                      <span class="menu-title"><?= $sm['title']; ?></span>
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <!--end::Primary menu-->
      </div>
      <!--ebd::Aside Primary Menu Wrapper-->
    </div>
    <!--end::Nav-->
  </div>
  <!--end::Primary-->
  <!--begin::Action-->
  <!--end::Action-->
</div>