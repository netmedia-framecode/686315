<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Users";
$_SESSION['page-url'] = "users";
$_SESSION['actual-link'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['object-link'] = $baseURL . "/views/user-management/";
require_once("../../templates/views-top.php");
?>

<div class="card">
  <div class="card-header mt-6">
    <div class="card-title">
      <h2><?= $_SESSION['page-name'] ?></h2>
    </div>
  </div>
  <div class="card-body py-4">
    <div class="table-responsive">
      <table class="table align-middle table-row-dashed fs-6 gy-5 text-center display" id="datatable">
        <thead>
          <tr class="text-muted fw-bolder fs-7 text-uppercase gs-0">
            <th class="text-center min-w-125px">User</th>
            <th class="text-center min-w-125px">Role</th>
            <th class="text-center min-w-125px">Last login</th>
            <th class="text-center min-w-125px">Two-step</th>
            <th class="text-center min-w-125px">Joined Date</th>
            <th class="text-center min-w-100px">Actions</th>
          </tr>
        </thead>
        <tbody class="text-gray-600 fw-bold">
          <?php if (mysqli_num_rows($users_list) > 0) {
            while ($row = mysqli_fetch_assoc($users_list)) { ?>
              <tr>
                <td class="d-flex align-items-center">
                  <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                    <div class="symbol-label">
                      <img src="<?= $row['img_user'] ?>" alt="<?= $row['username'] ?>" class="w-100" />
                    </div>
                  </div>
                  <div class="d-flex flex-column justify-content-start">
                    <p class="btn btn-link text-gray-800 text-hover-primary mb-1 m-0 p-0"><?= $row['username'] ?></p>
                    <span><?= $row['email'] ?></span>
                  </div>
                </td>
                <td><?= $row['role'] ?></td>
                <td>
                  <div class="badge badge-light fw-bolder">
                    <?php
                    $id_user = $row['id_user'];
                    $takeLogin_session = mysqli_query($conn, "SELECT * FROM users_login_logs WHERE id_user='$id_user' ORDER BY id_login_logs DESC LIMIT 1");
                    if (mysqli_num_rows($takeLogin_session) == 0) {
                      echo "-";
                    } else {
                      $row_sesi = mysqli_fetch_assoc($takeLogin_session);
                      $date_login = date_create($row_sesi['date_login_logs']);
                      echo date_format($date_login, 'l, d M Y');
                    }
                    ?>
                  </div>
                </td>
                <td>
                  <?php $auth = $row['id_user'];
                  $takeAuth = mysqli_query($conn, "SELECT * FROM users_otentikasi WHERE id_user='$auth'");
                  if (mysqli_num_rows($takeAuth) > 0) {
                    echo "<div class='badge badge-light-success fw-bolder'>Enabled</div>";
                  } else {
                    echo "<div class='badge badge-light-danger fw-bolder'>Disable</div>";
                  }
                  ?>
                </td>
                <td>
                  <?php $created_at = date_create($row['created_at']);
                  echo date_format($created_at, 'l, d M Y'); ?>
                </td>
                <td class="text-center">

                  <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                    <span class="svg-icon svg-icon-5 m-0">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                      </svg>
                    </span>
                  </a>

                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                    <div class="menu-item px-3">
                      <a style="cursor: pointer;" onclick="window.location.href='redirect?log=<?= $row['id_user'] ?>'" class="menu-link px-3">Activity Log</a>
                    </div>
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#ubah-user<?= $row['id_user'] ?>">Ubah</a>
                    </div>
                    <div class="menu-item px-3">
                      <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#hapus-user<?= $row['id_user'] ?>">Hapus</a>
                    </div>
                  </div>

                  <div class="modal fade" id="ubah-user<?= $row['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $row['username'] ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                          <div class="modal-body">
                            <input type="hidden" name="id-user" value="<?= $row['id_user'] ?>">
                            <select name="role" class="form-select" aria-label="Default select example" required>
                              <option selected value="<?= $row['id_role'] ?>"><?= $row['role'] ?></option>
                              <?php $id_role = $row['id_role'];
                              $select_role = "SELECT * FROM users_role WHERE id_role!='$id_role'";
                              $result_role = mysqli_query($conn, $select_role);
                              foreach ($result_role as $rowRole) : ?>
                                <option value="<?= $rowRole['id_role'] ?>"><?= $rowRole['role'] ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="modal-footer border-top-0 justify-content-center">
                            <input type="hidden" name="name-user" value="<?= $row['username'] ?>">
                            <input type="hidden" name="name-role" value="<?= $row['role'] ?>">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="edit-user" class="btn btn-warning ubah-users">Ubah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="hapus-user<?= $row['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $row['username'] ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST" class="form-hapus">
                          <div class="modal-body text-center">
                            <input type="hidden" name="id-user" value="<?= $row['id_user'] ?>">
                            <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                          </div>
                          <div class="modal-footer border-top-0 justify-content-center">
                            <input type="hidden" name="name-user" value="<?= $row['username'] ?>">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" name="delete-user" class="btn btn-danger hapus-users">Hapus</button>
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