<?php require_once("../controller/script.php");
if (!empty($_POST['email'])) {
  $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['email']))));
  $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['password']))));
  $ip = $_SERVER['REMOTE_ADDR'];
  $account_check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if (mysqli_num_rows($account_check) > 0) {
    $row = mysqli_fetch_assoc($account_check);
    $idUser = $row['id_user'];
    if ($row['id_active'] == 1) {
      if (password_verify($password, $row['password'])) {
        $checkGAuth = mysqli_query($conn, "SELECT * FROM users_otentikasi WHERE id_user='$idUser'");
        if (mysqli_num_rows($checkGAuth) == 0) {
          $device = get_client_browser() . " - " . getPlatform();
          echo $device;
          mysqli_query($conn, "INSERT INTO users_login_logs(id_user,device,ip_address) VALUES('$idUser','$device','$ip')");
          $_SESSION['data-user'] = [
            "id" => $row["id_user"],
            "role" => $row["id_role"],
            "role-name" => $row["role"],
            "name" => $row["username"],
            "email" => $row["email"],
            "picture" => $row["img_user"],
            "ip" => $row["ip_user"],
            'encryption' => $row['en_user'],
          ];
          header("Location: ../views/");
        } else if (mysqli_num_rows($checkGAuth) > 0) {
          $_SESSION['data-auth'] = [
            'id' => $row['id_user'],
          ];
          header('Location: OAuth');
        }
      } else {
        $status = "WRN";
        $problem = "login failed, password entered is incorrect.";
        $device = get_client_browser() . " - " . getPlatform();
        mysqli_query($conn, "INSERT INTO users_login_logs(id_user,status,problem,device,ip_address) VALUES('$idUser','$status','$problem','$device','$ip')");
        $_SESSION['message-danger'] = "Maaf, kata sandi Anda salah.";
        $_SESSION['time-message'] = time();
        header("Location: " . $_SESSION['page-url']);
        return false;
      }
    } else if ($row['id_active'] == 2) {
      $status = "WRN";
      $problem = "login failed, account not activated.";
      $device = get_client_browser() . " - " . getPlatform();
      mysqli_query($conn, "INSERT INTO users_login_logs(id_user,status,problem,device,ip_address) VALUES('$idUser','$status','$problem','$device','$ip')");
      $_SESSION['message-danger'] = "Maaf, akun Anda belum diaktifkan.";
      $_SESSION['time-message'] = time();
      header('Location: ' . $_SESSION['page-url']);
      return false;
    }
  } else {
    $_SESSION['message-danger'] = "Maaf, akun Anda belum terdaftar.";
    $_SESSION['time-message'] = time();
    header('Location: ' . $_SESSION['page-url']);
    return false;
  }
}
