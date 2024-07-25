<?php require_once("../../controller/script.php");
require_once("redirect.php");
$_SESSION['page-name'] = "Logs";
$_SESSION['page-url'] = "logs";
$_SESSION['actual-link'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['object-link'] = $baseURL . "/views/account/";
require_once("../../templates/views-top.php");
require_once("../../sections/views-nav-account.php");
?>

<!--begin::Login sessions-->
<div class="card mb-5 mb-lg-10">
  <div class="card-header">
    <div class="card-title">
      <h3>Sesi Masuk</h3>
    </div>
  </div>
  <div class="card-body p-0">
    <div class="table-responsive p-5">
      <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9 display" id="datatable1">
        <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
          <tr>
            <th class="min-w-250px">Lokasi</th>
            <th class="min-w-100px">Status</th>
            <th class="min-w-200px">Masalah</th>
            <th class="min-w-100px">Perangkat</th>
            <th class="min-w-100px">IP Address</th>
            <th class="min-w-100px">Waktu</th>
          </tr>
        </thead>
        <tbody class="fw-6 fw-bold text-gray-600">
          <?php if (mysqli_num_rows($users_login_logs) > 0) {
            while ($row = mysqli_fetch_assoc($users_login_logs)) { ?>
              <tr>
                <td><?php $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://ipinfo.io/' . $row['ip_address'] . '?token=7ac8e9c9be73ba');
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $result = curl_exec($ch);
                    if (curl_errno($ch)) {
                      echo 'Error:' . curl_error($ch);
                    }
                    curl_close($ch);
                    $geoloc_login_logs = json_decode($result);
                    echo $geoloc_login_logs->city . ", " . $geoloc_login_logs->region . ", " . $geoloc_login_logs->country; ?></td>
                <td>
                  <span class="badge badge-light-<?php if ($row['status'] == "OK") {
                                                    echo "success";
                                                  } else if ($row['status'] == "WRN") {
                                                    echo "warning";
                                                  } else if ($row['status'] == "ERR") {
                                                    echo "danger";
                                                  } ?> fs-7 fw-bolder"><?= $row['status'] ?></span>
                </td>
                <td>
                  <p><?= $row['problem'] ?></p>
                </td>
                <td>
                  <p><?= $row['device'] ?></p>
                </td>
                <td>
                  <p><?= $row['ip_address'] ?></p>
                </td>
                <td>
                  <p><?php $date = date_create($row['date_login_logs']);
                      echo date_format($date, "l, d M Y"); ?></p>
                </td>
              </tr>
          <?php }
          } ?>
        </tbody>
        <!--end::Tbody-->
      </table>
      <!--end::Table-->
    </div>
    <!--end::Table wrapper-->
  </div>
  <!--end::Card body-->
</div>
<!--end::Login sessions-->

<!--begin::Card-->
<div class="card pt-4">
  <!--begin::Card header-->
  <div class="card-header border-0">
    <!--begin::Card title-->
    <div class="card-title">
      <h2>Logs</h2>
    </div>
    <!--end::Card title-->
  </div>
  <!--end::Card header-->
  <!--begin::Card body-->
  <div class="card-body py-0">
    <!--begin::Table wrapper-->
    <div class="table-responsive">
      <!--begin::Table-->
      <table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5 display" id="datatable2">
        <thead class="border-gray-200 fs-5 fw-bold bg-lighten">
          <tr>
            <th class="text-center min-w-70px">Status</th>
            <th class="text-center">Masalah</th>
            <th class="text-center min-w-200px">Waktu</th>
          </tr>
        </thead>
        <!--begin::Table body-->
        <tbody>
          <!--begin::Table row-->
          <?php if (mysqli_num_rows($users_logs) > 0) {
            while ($data = mysqli_fetch_assoc($users_logs)) { ?>
              <tr>
                <!--begin::Badge=-->
                <td>
                  <div class="badge badge-light-<?php if ($data['status'] == "OK") {
                                                  echo "success";
                                                } else if ($data['status'] == "WRN") {
                                                  echo "warning";
                                                } else if ($data['status'] == "ERR") {
                                                  echo "danger";
                                                } ?>"><?= $data['status'] ?></div>
                </td>
                <!--end::Badge=-->
                <!--begin::Status=-->
                <td><?= $data['description'] ?></td>
                <!--end::Status=-->
                <!--begin::Timestamp=-->
                <td><?php $date = date_create($data['date_log']);
                    echo date_format($date, "l, d M Y"); ?></td>
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

<?php require_once("../../templates/views-bottom.php"); ?>