<?php require_once("../../controller/script.php");
require_once("redirect.php");
if (!isset($_SESSION['data']['id-user'])) {
  header("Location: users");
  exit;
} else {
  $id_user = valid($conn, $_SESSION['data']['id-user']);
  $myUsers_logs = mysqli_query($conn, "SELECT * FROM users_log JOIN users ON users_log.id_user=users.id_user WHERE users_log.id_user='$id_user'");
  $detailUser = mysqli_query($conn, "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role WHERE users.id_user='$id_user'");
}
$_SESSION["page-name"] = "Activity Log";
$_SESSION["page-url"] = "activity-log";
$_SESSION["actual-link"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION["object-link"] = $baseURL . "/views/user-management/";
require_once("../../templates/views-top.php");
?>

<!--begin::Layout-->
<div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10 mb-10">
  <!--begin:::Tabs-->
  <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-lg-n2 me-auto">
    <!--begin:::Tab item-->
    <li class="nav-item">
      <a class="nav-link text-active-primary pb-4 active">Activity Log</a>
    </li>
    <!--end:::Tab item-->
  </ul>
  <!--end:::Tabs-->
  <!--begin::Button-->
  <a style="cursor: pointer;" onclick="window.location.href='redirect?back=1'" class="btn btn-icon btn-light btn-sm shadow">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
    <span class="svg-icon svg-icon-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
        <path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="currentColor" />
      </svg>
    </span>
    <!--end::Svg Icon-->
  </a>
  <!--end::Button-->
</div>
<div class="d-flex flex-column flex-lg-row">
  <!--begin::Sidebar-->
  <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
    <!--begin::Card-->
    <div class="card mb-5 mb-xl-8">
      <!--begin::Card body-->
      <div class="card-body">
        <?php if (mysqli_num_rows($detailUser) > 0) {
          while ($row = mysqli_fetch_assoc($detailUser)) { ?>
            <!--begin::User Info-->
            <div class="d-flex flex-center flex-column py-5">
              <!--begin::Avatar-->
              <div class="symbol symbol-100px symbol-circle mb-7">
                <img src="<?= $row['img_user'] ?>" alt="image" />
              </div>
              <!--end::Avatar-->
              <!--begin::Name-->
              <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3"><?= $row['username'] ?></a>
              <!--end::Name-->
              <!--begin::Position-->
              <div class="mb-9">
                <!--begin::Badge-->
                <div class="badge badge-lg badge-light-primary d-inline"><?= $row['role'] ?></div>
                <!--begin::Badge-->
              </div>
              <!--end::Position-->
            </div>
            <!--end::User Info-->
            <!--end::Summary-->
            <!--begin::Details toggle-->
            <div class="d-flex flex-stack fs-4 py-3">
              <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                <span class="ms-2 rotate-180">
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                  <span class="svg-icon svg-icon-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </span>
              </div>
            </div>
            <!--end::Details toggle-->
            <div class="separator"></div>
            <!--begin::Details content-->
            <div id="kt_user_view_details" class="collapse show">
              <div class="pb-5 fs-6">
                <!--begin::Details item-->
                <div class="fw-bolder mt-5">Account ID</div>
                <div class="text-gray-600">ID-<?= $row['en_user'] ?></div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bolder mt-5">Email</div>
                <div class="text-gray-600">
                  <a href="#" class="text-gray-600 text-hover-primary"><?= $row['email'] ?></a>
                </div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bolder mt-5">Alamat</div>
                <div class="text-gray-600"><?= $row['address'] ?></div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bolder mt-5">Negara</div>
                <div class="text-gray-600"><?= $row['country'] ?></div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bolder mt-5">Login terakhir</div>
                <div class="text-gray-600">
                  <?php $date_last_login = mysqli_query($conn, "SELECT * FROM users_login_logs WHERE id_user='$id_user' ORDER BY id_login_logs DESC LIMIT 1");
                  $row_login_session = mysqli_fetch_assoc($date_last_login);
                  if ($row_login_session != null) {
                    $date = $row_login_session['date_login_logs'];
                  } else {
                    echo "-";
                  }
                  ?>
                </div>
                <!--begin::Details item-->
              </div>
            </div>
            <!--end::Details content-->
        <?php }
        } ?>
      </div>
      <!--end::Card body-->
    </div>
    <!--end::Card-->
  </div>
  <!--end::Sidebar-->
  <!--begin::Content-->
  <div class="flex-lg-row-fluid ms-lg-15">
    <!--begin:::Tab content-->
    <div class="tab-content" id="myTabContent">
      <!--begin:::Tab pane-->
      <div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
        <!--begin::Card-->
        <div class="card card-flush mb-6 mb-xl-9">
          <!--begin::Card header-->
          <div class="card-header mt-6">
            <!--begin::Card title-->
            <div class="card-title flex-column">
              <h2 class="mb-1">Logs</h2>
            </div>
            <!--end::Card title-->
          </div>
          <!--end::Card header-->
          <!--begin::Card body-->
          <div class="card-body p-9 pt-4">
            <!--begin::Table wrapper-->
            <div class="table-responsive">
              <!--begin::Table-->
              <table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5 text-center display" id="datatable-1">
                <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
                  <tr>
                    <th class="text-center min-w-70px">Status</th>
                    <th class="text-center">Activity</th>
                    <th class="pe-0 text-center min-w-200px">Time</th>
                  </tr>
                </thead>
                <!--begin::Table body-->
                <tbody>
                  <!--begin::Table row-->
                  <?php if (mysqli_num_rows($myUsers_logs) > 0) {
                    while ($data = mysqli_fetch_assoc($myUsers_logs)) { ?>
                      <tr>
                        <!--begin::Badge=-->
                        <td>
                          <div class="badge badge-light-<?php if ($data['status'] == "200 OK") {
                                                          echo "success";
                                                        } else if ($data['status'] == "WRN") {
                                                          echo "warning";
                                                        } else if ($data['status'] == "ERR") {
                                                          echo "danger";
                                                        } ?>"><?= $data['status'] ?></div>
                        </td>
                        <!--end::Badge=-->
                        <!--begin::Status=-->
                        <td><?= $data['username'] . " " . $data['description'] ?></td>
                        <!--end::Status=-->
                        <!--begin::Timestamp=-->
                        <td><?php $date = date_create($data['date_log']);
                            echo date_format($date, "l, d M Y h:i"); ?></td>
                        <!--end::Timestamp=-->
                      </tr>
                  <?php }
                  } ?>
                  <!--end::Table row-->
                </tbody>
                <!--end::Table body-->
              </table>
              <!--end::Table-->
            </div>
            <!--end::Table wrapper-->
          </div>
          <!--end::Card body-->
        </div>
        <!--end::Card-->
      </div>
      <!--end:::Tab pane-->
    </div>
    <!--end:::Tab content-->
  </div>
  <!--end::Content-->
</div>
<!--end::Layout-->

<?php require_once("../../templates/views-bottom.php");
?>