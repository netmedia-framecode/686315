<?php require_once("../controller/script.php");
if (!empty($_POST['oauth'])) {
  $idUser=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_SESSION['data-auth']['id']))));
  $oauth=htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST['oauth']))));

  $resultData=mysqli_query($conn, "SELECT * FROM users_otentikasi WHERE id_user='$idUser'");
  $rowEn=mysqli_fetch_assoc($resultData);

  require_once("../controller/Authenticator.php");
  if ($_SERVER['REQUEST_METHOD'] != "POST") {
    $response = array(
      'status' => false,
      'message' => "Maaf, sepertinya beberapa kesalahan terdeteksi, harap coba lagi.",
    );
    echo json_encode($response);
  }
  $Authenticator = new Authenticator();
  $checkResult = $Authenticator->verifyCode($rowEn['encryption'], $oauth, 2);
  if (!$checkResult) {
    $response = array(
      'status' => false,
      'message' => "Ups...! kode yang anda masukkan salah. Harap periksa kembali kode Otentikasi Dua Faktor Anda.",
    );
    echo json_encode($response);
  } else {
    $account_check = mysqli_query($conn, "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role WHERE users.id_user='$idUser'");
    $row = mysqli_fetch_assoc($account_check);
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
    $response = array(
      'status' => true,
    );
    echo json_encode($response);
  }
}