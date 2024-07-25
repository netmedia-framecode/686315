<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Menu";
$_SESSION['page-url'] = "menu";
$_SESSION['actual-link'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['object-link'] = $baseURL . "/views/menu-management/";
require_once("../../templates/views-top.php");
?>

<div class="card">
  <div class="card-header mt-6">
    <div class="card-title">
      <h2><?= $_SESSION['page-name'] ?></h2>
    </div>
    <div class="card-toolbar">
      <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#add">
        <i class="bi bi-plus-lg fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Tambah Menu
      </button>
      <div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header border-bottom-0 shadow">
              <h2 class="fw-bold">Tambah Menu</h2>
              <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-permissions-modal-action="close">
                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
              </div>
            </div>
            <form class="form" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="menu" class="form-label">Menu</label>
                  <input type="text" name="menu" class="form-control" id="menu" minlength="3" required>
                </div>
                <div class="mb-3">
                  <label for="icon" class="form-label">Icon</label>
                  <input type="text" name="icon" class="form-control" id="icon" minlength="3" required>
                  <p class="mt-3">Ambil icon menu <a href="https://icons.getbootstrap.com/" target="_blank">disini</a></p>
                </div>
              </div>
              <div class="modal-footer justify-content-center border-top-0">
                <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">
                  Batal
                </button>
                <button type="submit" name="add_menu" class="btn btn-primary">
                  <span class="indicator-label">
                    Tambah
                  </span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body py-4">
    <div class="table-responsive">
      <table class="table align-middle table-row-dashed fs-6 gy-5 text-center display" id="datatable">
        <thead>
          <tr class="text-muted fw-bolder fs-7 text-uppercase gs-0">
            <th class="text-center min-w-125px">Menu</th>
            <th class="text-center min-w-125px">Icon</th>
            <th class="text-center min-w-100px">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
          <?php if (mysqli_num_rows($views_menu) > 0) {
            while ($row = mysqli_fetch_assoc($views_menu)) { ?>
              <tr>
                <td><?= $row['menu'] ?></td>
                <td>
                  <div class="justify-content-center align-items-center text-center">
                    <i class="<?= $row['icon']; ?> fa-2x"></i>
                    <p><?= $row['icon'] ?></p>
                  </div>
                </td>
                <td class="text-center">

                  <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi
                    <span class="svg-icon svg-icon-5 m-0">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                      </svg>
                    </span>
                  </a>

                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#ubah<?= $row['id_menu'] ?>">Ubah</a>
                    </div>
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_menu'] ?>">Hapus</a>
                    </div>
                  </div>

                  <div class="modal fade" id="ubah<?= $row['id_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $row['menu'] ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                          <input type="hidden" name="id_menu" value="<?= $row['id_menu'] ?>">
                          <input type="hidden" name="menuOld" value="<?= $row['menu'] ?>">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="menu" class="form-label">Menu</label>
                              <input type="text" name="menu" value="<?= $row['menu'] ?>" class="form-control" id="menu" minlength="3" required>
                            </div>
                            <div class="mb-3">
                              <label for="icon" class="form-label">Icon</label>
                              <input type="text" name="icon" value="<?= $row['icon'] ?>" class="form-control" id="icon" minlength="3" required>
                              <p class="mt-3">Ambil icon menu <a href="https://icons.getbootstrap.com/" target="_blank">disini</a></p>
                            </div>
                          </div>
                          <div class="modal-footer border-top-0 justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="edit_menu" class="btn btn-warning">Ubah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="hapus<?= $row['id_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $row['menu'] ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                          <input type="hidden" name="id_menu" value="<?= $row['id_menu'] ?>">
                          <input type="hidden" name="menu" value="<?= $row['menu'] ?>">
                          <input type="hidden" name="folder" value="<?= $row['folder'] ?>">
                          <div class="modal-body text-center">
                            <p>Apakah Anda yakin ingin menghapus menu ini?</p>
                          </div>
                          <div class="modal-footer border-top-0 justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="delete_menu" class="btn btn-danger">Hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                </td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php require_once("../../templates/views-bottom.php"); ?>