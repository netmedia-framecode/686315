<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Sub Menu Access";
$_SESSION['page-url'] = "sub-menu-access";
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
        <i class="bi bi-plus-lg fs-3"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i> Tambah Akses Sub Menu
      </button>
      <div class="modal fade" id="add" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header border-bottom-0 shadow">
              <h2 class="fw-bold">Tambah Akses Sub Menu</h2>
              <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-permissions-modal-action="close">
                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
              </div>
            </div>
            <form class="form" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="id_role" class="form-label">Role</label>
                  <select name="id_role" class="form-control" id="id_role" required>
                    <option value="" selected>Pilih Role</option>
                    <?php foreach ($users_role as $data_select_role) { ?>
                      <option value="<?= $data_select_role['id_role'] ?>"><?= $data_select_role['role'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="id_sub_menu" class="form-label">Sub Menu</label>
                  <select name="id_sub_menu" class="form-control" id="id_sub_menu" required>
                    <option value="" selected>Pilih Sub Menu</option>
                    <?php foreach ($views_sub_menu_check as $data_select_menu) { ?>
                      <option value="<?= $data_select_menu['id_sub_menu'] ?>"><?= $data_select_menu['menu']." - ".$data_select_menu['title'] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer justify-content-center border-top-0">
                <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">
                  Batal
                </button>
                <button type="submit" name="add_sub_menu_access" class="btn btn-primary">
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
            <th class="text-center min-w-125px">Role</th>
            <th class="text-center min-w-125px">Sub Menu</th>
            <th class="text-center min-w-100px">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
          <?php if (mysqli_num_rows($views_users_access_sub_menu) > 0) {
            while ($row = mysqli_fetch_assoc($views_users_access_sub_menu)) { ?>
              <tr>
                <td><?= $row['role'] ?></td>
                <td><?= $row['title'] ?></td>
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
                      <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#ubah<?= $row['id_access_sub_menu'] ?>">Ubah</a>
                    </div>
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#hapus<?= $row['id_access_sub_menu'] ?>">Hapus</a>
                    </div>
                  </div>

                  <div class="modal fade" id="ubah<?= $row['id_access_sub_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $row['title'] ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                          <input type="hidden" name="id_access_sub_menu" value="<?= $row['id_access_sub_menu'] ?>">
                          <input type="hidden" name="title" value="<?= $row['title'] ?>">
                          <div class="modal-body">
                            <div class="mb-3">
                              <label for="id_role" class="form-label">Role</label>
                              <select name="id_role" class="form-control" id="id_role" required>
                                <option value="" selected>Pilih Role</option>
                                <?php $id_role = $row['id_role'];
                                foreach ($users_role as $data_select_role) {
                                  $selected = ($data_select_role['id_role'] == $id_role) ? 'selected' : ''; ?>
                                  <option value="<?= $data_select_role['id_role'] ?>" <?= $selected ?>><?= $data_select_role['role'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="mb-3">
                              <label for="id_sub_menu" class="form-label">Sub Menu</label>
                              <select name="id_sub_menu" class="form-control" id="id_sub_menu" required>
                                <option value="" selected>Pilih Sub Menu</option>
                                <?php $id_sub_menu = $row['id_sub_menu'];
                                foreach ($views_sub_menu_check as $data_select_menu) {
                                  $selected = ($data_select_menu['id_sub_menu'] == $id_sub_menu) ? 'selected' : ''; ?>
                                  <option value="<?= $data_select_menu['id_sub_menu'] ?>" <?= $selected ?>><?=  $data_select_menu['menu']." - ".$data_select_menu['title'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="modal-footer border-top-0 justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="edit_sub_menu_access" class="btn btn-warning">Ubah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="hapus<?= $row['id_access_sub_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $row['title'] ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                          <input type="hidden" name="id_access_sub_menu" value="<?= $row['id_access_sub_menu'] ?>">
                          <input type="hidden" name="title" value="<?= $row['title'] ?>">
                          <div class="modal-body text-center">
                            <p>Apakah Anda yakin ingin menghapus akses sub menu ini?</p>
                          </div>
                          <div class="modal-footer border-top-0 justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="delete_sub_menu_access" class="btn btn-danger">Hapus</button>
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