<?php if (!isset($_SESSION[''])) {
  session_start();
}
require_once("db_connect.php");
require_once("time.php");
require_once(__DIR__ . "/../models/alert.php");
require_once("functions.php");
require_once("Authenticator.php");

// == Alert ==
$messageTypes = ["success", "info", "warning", "danger", "dark"];
if (isset($_SESSION["alert"]["time_message"]) && (time() - $_SESSION["alert"]["time_message"]) > 2) {
  foreach ($messageTypes as $type) {
    if (isset($_SESSION["alert"]["message_$type"])) {
      unset($_SESSION["alert"]["message_$type"]);
    }
  }
  unset($_SESSION["alert"]["time_message"]);
}

// == Redirect Page Views ==
if (isset($_SESSION['time-redirect'])) {
  if ((time() - $_SESSION['time-redirect']) > 60) {
    if (isset($_SESSION['redirect'])) {
      unset($_SESSION['redirect']);
    }
  }
}

$baseURL = "http://$_SERVER[HTTP_HOST]/apps/basic/plbn_motamasin_pro";

// oncontextmenu='return false;' ondragstart='return false' style='-moz-user-select: none; cursor: default;'
$disablePage = "";

if (!isset($_SESSION['data-user'])) {

  // Sign In
  if (isset($_POST['signin'])) {
    if (signin($conn, $_POST) > 0) {
      header("Location: ../views/");
      exit();
    }
  }
}

if (isset($_SESSION['data-user'])) {

  if (!isset($_SESSION['theme-mode'])) {
    $_SESSION['theme-mode'] = "light";
  }

  $idUser = valid($conn, $_SESSION['data-user']['id']);
  $ipUser = valid($conn, $_SESSION['data-user']['ip']);
  $role = valid($conn, $_SESSION['data-user']['role']);
  $name = valid($conn, $_SESSION['data-user']['name']);

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://ipinfo.io/' . $ipUser . '?token=7ac8e9c9be73ba');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($ch);
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  curl_close($ch);
  $data_geolocation = json_decode($result);

  $dataUser = mysqli_query($conn, "SELECT * FROM users 
    JOIN users_role ON users.id_role=users_role.id_role
    JOIN users_status ON users.id_active=users_status.id_status
    WHERE users.id_user='$idUser'
  ");

  // proccess edit data Users to db
  if (isset($_POST['edit-profile'])) {
    if (profile($conn, $_POST, $idUser, $baseURL) > 0) {
      $message = "Detail profil Anda telah berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }

  // GAuth
  $authActive = mysqli_query($conn, "SELECT * FROM users_otentikasi WHERE id_user='$idUser'");
  $Authenticator = new Authenticator();
  if (!isset($_SESSION['auth_secret'])) {
    $secret = $Authenticator->generateRandomSecret();
    $_SESSION['auth_secret'] = $secret;
  }
  $qrCodeUrl = $Authenticator->getQR('BPPPPS GMIT', $_SESSION['auth_secret']);
  $qrCodeUrl_view = $_SESSION['auth_secret'];

  // Logs
  $users_login_logs = mysqli_query($conn, "SELECT * FROM users_login_logs WHERE id_user='$idUser' ORDER BY id_login_logs DESC");
  $users_logs = mysqli_query($conn, "SELECT * FROM users_log WHERE id_user='$idUser'");

  // Manage Users
  $users_list = mysqli_query($conn, "SELECT users.*, users_role.role FROM users 
                                      JOIN users_role ON users.id_role=users_role.id_role
                                      WHERE users.id_user!='$idUser'
                                      ORDER BY users.id_user DESC
                                    ");
  if (isset($_POST['edit-user'])) {
    if (users($conn, $_POST, $role, "update", $idUser) > 0) {
      $message = "Berhasil mengubah peran pengguna" . $_POST['name-user'] . ".";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST['delete-user'])) {
    if (users($conn, $_POST, $role, "delete", $idUser) > 0) {
      $message = "Berhasil menghapus pengguna " . $_POST['name-user'] . ".";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }

  $users_role = mysqli_query($conn, "SELECT * FROM users_role");
  if (isset($_POST["add_role"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (role($conn, $validated_post, $action = 'insert', $idUser) > 0) {
      $message = "Role baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["edit_role"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (role($conn, $validated_post, $action = 'update', $idUser) > 0) {
      $message = "Role " . $_POST['roleOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["delete_role"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (role($conn, $validated_post, $action = 'delete', $idUser) > 0) {
      $message = "Role " . $_POST['role'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }

  $select_menu = "SELECT * 
                    FROM users_menu 
                    ORDER BY menu ASC
                  ";
  $views_menu = mysqli_query($conn, $select_menu);
  if (isset($_POST["add_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu($conn, $validated_post, $action = 'insert', $idUser) > 0) {
      $message = "Menu baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["edit_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu($conn, $validated_post, $action = 'update', $idUser) > 0) {
      $message = "Menu " . $_POST['menuOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["delete_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu($conn, $validated_post, $action = 'delete', $idUser) > 0) {
      $message = "Menu " . $_POST['menu'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }

  $select_sub_menu = "SELECT users_sub_menu.*, users_menu.menu, users_menu.folder, users_status.status 
                        FROM users_sub_menu 
                        JOIN users_menu ON users_sub_menu.id_menu=users_menu.id_menu 
                        JOIN users_status ON users_sub_menu.id_active=users_status.id_status 
                        ORDER BY users_sub_menu.title ASC
                      ";
  $views_sub_menu = mysqli_query($conn, $select_sub_menu);
  $select_users_status = "SELECT * 
                          FROM users_status
                        ";
  $views_users_status = mysqli_query($conn, $select_users_status);
  if (isset($_POST["add_sub_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu($conn, $validated_post, $action = 'insert', $baseURL, $idUser) > 0) {
      $message = "Sub Menu baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["edit_sub_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu($conn, $validated_post, $action = 'update', $baseURL, $idUser) > 0) {
      $message = "Sub Menu " . $_POST['titleOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["delete_sub_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu($conn, $validated_post, $action = 'delete', $baseURL, $idUser) > 0) {
      $message = "Sub Menu " . $_POST['title'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }

  $select_users_access_menu = "SELECT users_access_menu.*, users_role.role, users_menu.menu
                                FROM users_access_menu 
                                JOIN users_role ON users_access_menu.id_role=users_role.id_role 
                                JOIN users_menu ON users_access_menu.id_menu=users_menu.id_menu
                              ";
  $views_users_access_menu = mysqli_query($conn, $select_users_access_menu);
  $select_menu_check = "SELECT users_menu.* 
                    FROM users_menu 
                    ORDER BY users_menu.menu ASC
                  ";
  $views_menu_check = mysqli_query($conn, $select_menu_check);
  if (isset($_POST["add_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu_access($conn, $validated_post, $action = 'insert', $idUser) > 0) {
      $message = "Akses ke menu berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["edit_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu_access($conn, $validated_post, $action = 'update', $idUser) > 0) {
      $message = "Akses menu " . $_POST['menu'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["delete_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu_access($conn, $validated_post, $action = 'delete', $idUser) > 0) {
      $message = "Akses menu " . $_POST['menu'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }

  $select_users_access_sub_menu = "SELECT users_access_sub_menu.*, users_role.role, users_sub_menu.title
                                FROM users_access_sub_menu 
                                JOIN users_role ON users_access_sub_menu.id_role=users_role.id_role 
                                JOIN users_sub_menu ON users_access_sub_menu.id_sub_menu=users_sub_menu.id_sub_menu
                              ";
  $views_users_access_sub_menu = mysqli_query($conn, $select_users_access_sub_menu);
  $select_sub_menu_check = "SELECT users_sub_menu.*, users_menu.menu
                    FROM users_sub_menu 
                    JOIN users_menu ON users_sub_menu.id_menu=users_menu.id_menu
                    ORDER BY users_menu.menu ASC
                  ";
  $views_sub_menu_check = mysqli_query($conn, $select_sub_menu_check);
  if (isset($_POST["add_sub_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu_access($conn, $validated_post, $action = 'insert', $idUser) > 0) {
      $message = "Akses ke sub menu berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["edit_sub_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu_access($conn, $validated_post, $action = 'update', $idUser) > 0) {
      $message = "Akses sub menu " . $_POST['title'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }
  if (isset($_POST["delete_sub_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu_access($conn, $validated_post, $action = 'delete', $idUser) > 0) {
      $message = "Akses sub menu " . $_POST['title'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      $to_page = $_SESSION['page-url'];
      header("Location: $to_page");
      exit();
    } else {
      if (!isset($_SESSION['alert']['message-danger'])) {
        $message = "Maaf, sepertinya ada kesalahan saat menghubungkan ke penyimpanan data!";
        $message_type = "warning";
        alert($message, $message_type);
        return false;
      }
    }
  }

  $warga_negara = "SELECT * FROM warga_negara";
  $views_warga_negara = mysqli_query($conn, $warga_negara);
  $kepemilikan_kendaraan = "SELECT * FROM kepemilikan_kendaraan";
  $views_kepemilikan_kendaraan = mysqli_query($conn, $kepemilikan_kendaraan);
  $bahan_bakar = "SELECT * FROM bahan_bakar";
  $views_bahan_bakar = mysqli_query($conn, $bahan_bakar);
  if (isset($_POST["add_strp"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (strp($conn, $validated_post, $action = 'insert', $idUser, $baseURL) > 0) {
      header("Location: ./");
      exit();
    }
  }
  if (isset($_POST["add_formulir_wawancara"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (formulir_wawancara($conn, $validated_post, $action = 'insert', $idUser, $baseURL) > 0) {
      $message = "Upload data STRP dan Formulir Wawancara berhasil di upload, silakan menuju ke pos pemeriksaan untuk proses selanjutnya.";
      $message_type = "success";
      alert($message, $message_type);
      unset($_SESSION["strp"]);
      header("Location: ./");
      exit();
    }
  }

  $keberangkatan = "SELECT * FROM keberangkatan";
  $views_keberangkatan = mysqli_query($conn, $keberangkatan);
  $kedatangan = "SELECT * FROM kedatangan";
  $views_kedatangan = mysqli_query($conn, $kedatangan);
  if($role == 4){
    $strp = "SELECT strp.*, warga_negara.warga_negara, kepemilikan_kendaraan.kepemilikan_kendaraan, bahan_bakar.bahan_bakar FROM strp JOIN warga_negara ON strp.id_warga_negara=warga_negara.id_warga_negara JOIN kepemilikan_kendaraan ON strp.id_kepemilikan_kendaraan=kepemilikan_kendaraan.id_kepemilikan_kendaraan JOIN bahan_bakar ON strp.id_bahan_bakar=bahan_bakar.id_bahan_bakar WHERE strp.id_user='$idUser'";
  }else if($role < 4){
    $strp = "SELECT strp.*, warga_negara.warga_negara, kepemilikan_kendaraan.kepemilikan_kendaraan, bahan_bakar.bahan_bakar FROM strp JOIN warga_negara ON strp.id_warga_negara=warga_negara.id_warga_negara JOIN kepemilikan_kendaraan ON strp.id_kepemilikan_kendaraan=kepemilikan_kendaraan.id_kepemilikan_kendaraan JOIN bahan_bakar ON strp.id_bahan_bakar=bahan_bakar.id_bahan_bakar";
  }
  $views_strp = mysqli_query($conn, $strp);
  if (isset($_POST["edit_strp"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (strp($conn, $validated_post, $action = 'update', $idUser, $baseURL) > 0) {
      $message = "Data STRP berhasil diubah";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: strp");
      exit();
    }
  }
  if (isset($_POST["edit_strp_lantas"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (strp($conn, $validated_post, $action = 'update_lantas', $idUser, $baseURL) > 0) {
      $message = "Data STRP berhasil diubah";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: strp");
      exit();
    }
  }
  if (isset($_POST["delete_strp"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (strp($conn, $validated_post, $action = 'delete', $idUser, $baseURL) > 0) {
      $message = "Data STRP berhasil dihapus";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: strp");
      exit();
    }
  }

  if($role == 4){
    $formulir_wawancara = "SELECT formulir_wawancara.*, alamat_pengemudi.jalan_pengemudi, alamat_pengemudi.kelurahan_pengemudi, alamat_pengemudi.kecamatan_pengemudi, alamat_pengemudi.kabupaten_kota_pengemudi, alamat_pengemudi.provinsi_pengemudi, alamat_kendaraan.jalan_kendaraan, alamat_kendaraan.kelurahan_kendaraan, alamat_kendaraan.kecamatan_kendaraan, alamat_kendaraan.kabupaten_kota_kendaraan, alamat_kendaraan.provinsi_kendaraan, alamat_tujuan.jalan_tujuan, alamat_tujuan.jalan_tujuan, alamat_tujuan.distric, alamat_tujuan.sub_distric, alamat_tujuan.suco, alamat_tujuan.aldeia, kepemilikan_kendaraan.kepemilikan_kendaraan, strp.no_registrasi, strp.files
      FROM formulir_wawancara 
      JOIN alamat_pengemudi ON formulir_wawancara.id_fw=alamat_pengemudi.id_fw 
      JOIN alamat_kendaraan ON formulir_wawancara.id_fw=alamat_kendaraan.id_fw 
      JOIN alamat_tujuan ON formulir_wawancara.id_fw=alamat_tujuan.id_fw 
      JOIN kepemilikan_kendaraan ON formulir_wawancara.id_kepemilikan_kendaraan=kepemilikan_kendaraan.id_kepemilikan_kendaraan
      JOIN strp ON formulir_wawancara.id_strp=strp.id_strp
      WHERE formulir_wawancara.id_user='$idUser'
    ";
  }else if($role < 4){
    $formulir_wawancara = "SELECT formulir_wawancara.*, alamat_pengemudi.jalan_pengemudi, alamat_pengemudi.kelurahan_pengemudi, alamat_pengemudi.kecamatan_pengemudi, alamat_pengemudi.kabupaten_kota_pengemudi, alamat_pengemudi.provinsi_pengemudi, alamat_kendaraan.jalan_kendaraan, alamat_kendaraan.kelurahan_kendaraan, alamat_kendaraan.kecamatan_kendaraan, alamat_kendaraan.kabupaten_kota_kendaraan, alamat_kendaraan.provinsi_kendaraan, alamat_tujuan.jalan_tujuan, alamat_tujuan.distric, alamat_tujuan.sub_distric, alamat_tujuan.suco, alamat_tujuan.aldeia, kepemilikan_kendaraan.kepemilikan_kendaraan, strp.no_registrasi, strp.files
      FROM formulir_wawancara 
      JOIN alamat_pengemudi ON formulir_wawancara.id_fw=alamat_pengemudi.id_fw 
      JOIN alamat_kendaraan ON formulir_wawancara.id_fw=alamat_kendaraan.id_fw 
      JOIN alamat_tujuan ON formulir_wawancara.id_fw=alamat_tujuan.id_fw 
      JOIN kepemilikan_kendaraan ON formulir_wawancara.id_kepemilikan_kendaraan=kepemilikan_kendaraan.id_kepemilikan_kendaraan
      JOIN strp ON formulir_wawancara.id_strp=strp.id_strp
    ";
  }
  $views_formulir_wawancara = mysqli_query($conn, $formulir_wawancara);
  if (isset($_POST["edit_formulir_wawancara"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (formulir_wawancara($conn, $validated_post, $action = 'update', $idUser, $baseURL) > 0) {
      $message = "Data Formulir Wawancara berhasil diubah";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: formulir-wawancara");
      exit();
    }
  }
  if (isset($_POST["delete_formulir_wawancara"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (formulir_wawancara($conn, $validated_post, $action = 'delete', $idUser, $baseURL) > 0) {
      $message = "Data Formulir Wawancara berhasil dihapus";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: formulir-wawancara");
      exit();
    }
  }
  
  $count_keberangkatan = "SELECT * FROM keberangkatan";
  $counts_keberangkatan = mysqli_query($conn, $count_keberangkatan);
  $keberangkatan = "SELECT keberangkatan.*, 
    formulir_wawancara.kategori, 
    formulir_wawancara.kesehatan, 
    formulir_wawancara.pengemudi_kendaraan, 
    formulir_wawancara.nama_pengemudi, 
    formulir_wawancara.tempat_lahir, 
    formulir_wawancara.tgl_lahir, 
    formulir_wawancara.no_pasport_pengemudi, 
    formulir_wawancara.no_sim_pengemudi, 
    formulir_wawancara.no_hp_pengemudi, 
    formulir_wawancara.pemilik_kendaraan, 
    formulir_wawancara.nama_pemilik_kendaraan, 
    formulir_wawancara.identitas_pemilik_kendaraan, 
    formulir_wawancara.surat_kuasa, 
    formulir_wawancara.plat_nomor, 
    formulir_wawancara.merek_kendaraan, 
    formulir_wawancara.maksud_kunjungan, 
    formulir_wawancara.waktu_kunjungan, 
    formulir_wawancara.pelanggaran_atas_barang, 
    formulir_wawancara.pelanggaran_atas_penyalahgunaan, 
    formulir_wawancara.pelanggaran_atas_modifikasi, 
    formulir_wawancara.pelanggaran_atas_waktu, 
    formulir_wawancara.sanksi, 
    alamat_pengemudi.jalan_pengemudi, 
    alamat_pengemudi.kelurahan_pengemudi, 
    alamat_pengemudi.kecamatan_pengemudi, 
    alamat_pengemudi.kabupaten_kota_pengemudi, 
    alamat_pengemudi.provinsi_pengemudi, 
    alamat_kendaraan.jalan_kendaraan, 
    alamat_kendaraan.kelurahan_kendaraan, 
    alamat_kendaraan.kecamatan_kendaraan, 
    alamat_kendaraan.kabupaten_kota_kendaraan, 
    alamat_kendaraan.provinsi_kendaraan, 
    alamat_tujuan.jalan_tujuan, 
    alamat_tujuan.distric, 
    alamat_tujuan.sub_distric, 
    alamat_tujuan.suco, alamat_tujuan.aldeia, 
    kepemilikan_kendaraan.kepemilikan_kendaraan, 
    strp.no_registrasi, 
    strp.no_polisi, 
    strp.nama_pemilik, 
    strp.alamat_pemilik, 
    strp.nama_pengemudi, 
    strp.no_sim, 
    strp.no_pasport, 
    strp.jenis_kendaraan, 
    strp.tahun_pembuatan, 
    strp.cc, 
    strp.no_rangka, 
    strp.no_mesin, 
    strp.warna, 
    strp.maksud_kunjungan, 
    strp.alamat_tujuan, 
    strp.berlaku_hingga, 
    strp.files,
    warga_negara.warga_negara,
    bahan_bakar.bahan_bakar
      FROM keberangkatan 
      JOIN formulir_wawancara ON keberangkatan.id_fw = formulir_wawancara.id_fw 
      JOIN alamat_pengemudi ON formulir_wawancara.id_fw = alamat_pengemudi.id_fw 
      JOIN alamat_kendaraan ON formulir_wawancara.id_fw = alamat_kendaraan.id_fw 
      JOIN alamat_tujuan ON formulir_wawancara.id_fw = alamat_tujuan.id_fw 
      JOIN kepemilikan_kendaraan ON formulir_wawancara.id_kepemilikan_kendaraan = kepemilikan_kendaraan.id_kepemilikan_kendaraan
      JOIN strp ON formulir_wawancara.id_strp = strp.id_strp
      JOIN warga_negara ON strp.id_warga_negara = warga_negara.id_warga_negara
      JOIN bahan_bakar ON strp.id_bahan_bakar = bahan_bakar.id_bahan_bakar
      ORDER BY keberangkatan.id_keberangkatan DESC
  ";
  $views_keberangkatan = mysqli_query($conn, $keberangkatan);
  if (isset($_POST["validasi_strp_keberangkatan"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (validasi_keberangkatan($conn, $validated_post, $action = 'strp', $idUser, $baseURL) > 0) {
      $message = "Data STRP telah di validasi.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: keberangkatan");
      exit();
    }
  }
  if (isset($_POST["validasi_formulir_keberangkatan"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (validasi_keberangkatan($conn, $validated_post, $action = 'formulir', $idUser, $baseURL) > 0) {
      $message = "Data Formulir Wawancara telah di validasi";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: keberangkatan");
      exit();
    }
  }

  if(isset($_POST['search_keberangkatan'])){
    $type_file=valid($conn, $_POST['type_file']);
    $no_polisi=valid($conn, $_POST['no_polisi']);
    $_SESSION["keberangkatan"] = [
      "type_file" => $type_file,
      "no_polisi" => $no_polisi,
      "time_search" => time()
    ];
    header("Location: keberangkatan");
    exit;
  }
  if (isset($_SESSION["keberangkatan"])){
    if (isset($_SESSION['keberangkatan']["time_search"]) && (time() - $_SESSION['keberangkatan']["time_search"]) > 300) {
      unset($_SESSION['keberangkatan']);
    }
  }
  
  $count_kedatangan = "SELECT * FROM kedatangan";
  $counts_kedatangan = mysqli_query($conn, $count_kedatangan);
  $kedatangan = "SELECT kedatangan.*, 
    formulir_wawancara.kategori, 
    formulir_wawancara.kesehatan, 
    formulir_wawancara.pengemudi_kendaraan, 
    formulir_wawancara.nama_pengemudi, 
    formulir_wawancara.tempat_lahir, 
    formulir_wawancara.tgl_lahir, 
    formulir_wawancara.no_pasport_pengemudi, 
    formulir_wawancara.no_sim_pengemudi, 
    formulir_wawancara.no_hp_pengemudi, 
    formulir_wawancara.pemilik_kendaraan, 
    formulir_wawancara.nama_pemilik_kendaraan, 
    formulir_wawancara.identitas_pemilik_kendaraan, 
    formulir_wawancara.surat_kuasa, 
    formulir_wawancara.plat_nomor, 
    formulir_wawancara.merek_kendaraan, 
    formulir_wawancara.maksud_kunjungan, 
    formulir_wawancara.waktu_kunjungan, 
    formulir_wawancara.pelanggaran_atas_barang, 
    formulir_wawancara.pelanggaran_atas_penyalahgunaan, 
    formulir_wawancara.pelanggaran_atas_modifikasi, 
    formulir_wawancara.pelanggaran_atas_waktu, 
    formulir_wawancara.sanksi, 
    alamat_pengemudi.jalan_pengemudi, 
    alamat_pengemudi.kelurahan_pengemudi, 
    alamat_pengemudi.kecamatan_pengemudi, 
    alamat_pengemudi.kabupaten_kota_pengemudi, 
    alamat_pengemudi.provinsi_pengemudi, 
    alamat_kendaraan.jalan_kendaraan, 
    alamat_kendaraan.kelurahan_kendaraan, 
    alamat_kendaraan.kecamatan_kendaraan, 
    alamat_kendaraan.kabupaten_kota_kendaraan, 
    alamat_kendaraan.provinsi_kendaraan, 
    alamat_tujuan.jalan_tujuan, 
    alamat_tujuan.distric, 
    alamat_tujuan.sub_distric, 
    alamat_tujuan.suco, alamat_tujuan.aldeia, 
    kepemilikan_kendaraan.kepemilikan_kendaraan, 
    strp.no_registrasi, 
    strp.no_polisi, 
    strp.nama_pemilik, 
    strp.alamat_pemilik, 
    strp.nama_pengemudi, 
    strp.no_sim, 
    strp.no_pasport, 
    strp.jenis_kendaraan, 
    strp.tahun_pembuatan, 
    strp.cc, 
    strp.no_rangka, 
    strp.no_mesin, 
    strp.warna, 
    strp.maksud_kunjungan, 
    strp.alamat_tujuan, 
    strp.berlaku_hingga, 
    strp.files,
    warga_negara.warga_negara,
    bahan_bakar.bahan_bakar
      FROM kedatangan 
      JOIN formulir_wawancara ON kedatangan.id_fw = formulir_wawancara.id_fw 
      JOIN alamat_pengemudi ON formulir_wawancara.id_fw = alamat_pengemudi.id_fw 
      JOIN alamat_kendaraan ON formulir_wawancara.id_fw = alamat_kendaraan.id_fw 
      JOIN alamat_tujuan ON formulir_wawancara.id_fw = alamat_tujuan.id_fw 
      JOIN kepemilikan_kendaraan ON formulir_wawancara.id_kepemilikan_kendaraan = kepemilikan_kendaraan.id_kepemilikan_kendaraan
      JOIN strp ON formulir_wawancara.id_strp = strp.id_strp
      JOIN warga_negara ON strp.id_warga_negara = warga_negara.id_warga_negara
      JOIN bahan_bakar ON strp.id_bahan_bakar = bahan_bakar.id_bahan_bakar
      ORDER BY kedatangan.id_kedatangan DESC
  ";
  $views_kedatangan = mysqli_query($conn, $kedatangan);
  if (isset($_POST["validasi_strp_kedatangan"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (validasi_kedatangan($conn, $validated_post, $action = 'strp', $idUser, $baseURL) > 0) {
      $message = "Data STRP telah di validasi.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: kedatangan");
      exit();
    }
  }
  if (isset($_POST["validasi_formulir_kedatangan"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (validasi_kedatangan($conn, $validated_post, $action = 'formulir', $idUser, $baseURL) > 0) {
      $message = "Data Formulir Wawancara telah di validasi";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: kedatangan");
      exit();
    }
  }
  if (isset($_POST["validasi_vhd_kedatangan"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (validasi_kedatangan($conn, $validated_post, $action = 'vhd', $idUser, $baseURL) > 0) {
      $message = "Data VHD telah di validasi";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: kedatangan");
      exit();
    }
  }

  if(isset($_POST['search_kedatangan'])){
    $type_file=valid($conn, $_POST['type_file']);
    $no_polisi=valid($conn, $_POST['no_polisi']);
    $_SESSION["kedatangan"] = [
      "type_file" => $type_file,
      "no_polisi" => $no_polisi,
      "time_search" => time()
    ];
    header("Location: kedatangan");
    exit;
  }
  if (isset($_SESSION["kedatangan"])){
    if (isset($_SESSION['kedatangan']["time_search"]) && (time() - $_SESSION['kedatangan']["time_search"]) > 300) {
      unset($_SESSION['kedatangan']);
    }
  }
}