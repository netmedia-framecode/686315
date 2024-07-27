<?php

function valid($conn, $value)
{
  if (is_null($value)) {
    return '';
  }
  $value = trim($value);
  $value = mysqli_real_escape_string($conn, $value);
  $value = addslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}

function isGoogleUrl($url) {
  $parsedUrl = parse_url($url);
  if (isset($parsedUrl['host'])) {
    $host = $parsedUrl['host'];
    $googleDomains = ['google.com', 'googleusercontent.com'];
    foreach ($googleDomains as $domain) {
      if (substr($host, -strlen($domain)) === $domain) {
        return true;
      }
    }
  }
  return false;
}

function get_client_browser()
{
  $browser = '';
  if (strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
    $browser = 'Netscape';
  else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
    $browser = 'Firefox';
  else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
    $browser = 'Chrome';
  else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
    $browser = 'Opera';
  else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
    $browser = 'Internet Explorer';
  else
    $browser = 'Other';
  return $browser;
}

function getPlatform()
{
  $u_agent = $_SERVER['HTTP_USER_AGENT'];
  $platform = 'Unknown';
  if (preg_match('/linux/i', $u_agent)) {
    $platform = 'Linux';
  } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
    $platform = 'Mac';
  } elseif (preg_match('/windows|win32/i', $u_agent)) {
    $platform = 'Windows';
  }
  return $platform;
}

function isUrl($value)
{
  return filter_var($value, FILTER_VALIDATE_URL) !== false;
}

function compressImage($source, $destination, $quality)
{
  // mendapatkan info image
  $imgInfo = getimagesize($source);
  $mime = $imgInfo['mime'];
  // membuat image baru
  switch ($mime) {
      // proses kode memilih tipe tipe image 
    case 'image/jpeg':
      $image = imagecreatefromjpeg($source);
      break;
    case 'image/png':
      $image = imagecreatefrompng($source);
      break;
    default:
      $image = imagecreatefromjpeg($source);
  }

  // Menyimpan image dengan ukuran yang baru
  imagejpeg($image, $destination, $quality);

  // Return image
  return $destination;
}

function imgBB($image, $name = null)
{
  $api_key = '346b837234ce76a497791148cdce328f'; // API imgBB https://imgbb.com
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key=' . $api_key);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  // curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
  $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
  $file_name = ($name) ? $name . '.' . $extension : $image['name'];
  $data = array('image' => base64_encode(file_get_contents($image['tmp_name'])), 'name' => $file_name);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  $result = curl_exec($ch);
  if (curl_errno($ch)) {
    return 'Error:' . curl_error($ch);
  } else {
    return json_decode($result, true);
  }
  curl_close($ch);
}

function hapusFolderRecursively($folderPath)
{
  if (is_dir($folderPath)) {
    $files = glob($folderPath . '/*');
    foreach ($files as $file) {
      is_dir($file) ? hapusFolderRecursively($file) : unlink($file);
    }
    rmdir($folderPath);
  }
}

if (!isset($_SESSION['data-user'])) {
  function signin($conn, $data)
  {
    $email = valid($conn, $data['email']);
    $password = valid($conn, $data['password']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $account_check = mysqli_query($conn, "SELECT * FROM users JOIN users_role ON users.id_role=users_role.id_role WHERE users.email='$email'");
    if (mysqli_num_rows($account_check) > 0) {
      $row = mysqli_fetch_assoc($account_check);
      $idUser = $row['id_user'];
      if ($row['id_active'] == 1) {
        if (password_verify($password, $row['password'])) {
          $checkGAuth = mysqli_query($conn, "SELECT * FROM users_otentikasi WHERE id_user='$idUser'");
          if (mysqli_num_rows($checkGAuth) == 0) {
            $device = get_client_browser() . " - " . getPlatform();
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
            return mysqli_affected_rows($conn);
          } else if (mysqli_num_rows($checkGAuth) > 0) {
            $_SESSION['data-auth'] = [
              'id' => $row['id_user'],
            ];
            header('Location: OAuth');
          }
        } else {
          $status = "WRN";
          $problem = "login gagal, kata sandi yang dimasukkan salah.";
          $device = get_client_browser() . " - " . getPlatform();
          mysqli_query($conn, "INSERT INTO users_login_logs(id_user,status,problem,device,ip_address) VALUES('$idUser','$status','$problem','$device','$ip')");
          $_SESSION['message-danger'] = "Maaf, kata sandi Anda salah.";
          $_SESSION['time-message'] = time();
          return false;
        }
      } else if ($row['id_active'] == 2) {
        $status = "WRN";
        $problem = "login gagal, akun belum diaktifkan.";
        $device = get_client_browser() . " - " . getPlatform();
        mysqli_query($conn, "INSERT INTO users_login_logs(id_user,status,problem,device,ip_address) VALUES('$idUser','$status','$problem','$device','$ip')");
        $_SESSION['message-danger'] = "Maaf, akun Anda belum diaktifkan.";
        $_SESSION['time-message'] = time();
        return false;
      }
    } else {
      $_SESSION['message-danger'] = "Maaf, akun Anda belum terdaftar.";
      $_SESSION['time-message'] = time();
      return false;
    }
  }
}

if (isset($_SESSION['data-user'])) {
  function users_log($conn, $status, $description, $idUser)
  {

    if ($status === null) {
      $status = "200 OK";
    }

    $sql = "INSERT INTO users_log(id_user,status,description) VALUES('$idUser','$status','$description')";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
  }

  function profile($conn, $data, $idUser, $baseURL)
  {
    $nama = valid($conn, $_POST['nama']);
    $phone = valid($conn, $_POST['phone']);
    $address = valid($conn, $_POST['address']);
    $country = valid($conn, $_POST['country']);
    $avatar = valid($conn, $data['avatarOld']);

    if (!empty($_FILES['avatar']["name"])) {
      $path = "../../assets/images/profile/";
      $fileName = basename($_FILES["avatar"]["name"]);
      $fileName = str_replace(" ", "-", $fileName);
      $fileName_encrypt = crc32($fileName);
      $ekstensiGambar = explode('.', $fileName);
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      $imageUploadPath = $path . $fileName_encrypt . "." . $ekstensiGambar;
      $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
      $allowTypes = array('jpg', 'png', 'jpeg');
      if (in_array($fileType, $allowTypes)) {
        $imageTemp = $_FILES["avatar"]["tmp_name"];
        compressImage($imageTemp, $imageUploadPath, 75);
        $unwanted_characters = $baseURL . "/assets/images/profile/";
        $remove_avatar = str_replace($unwanted_characters, "", $avatar);
        if ($remove_avatar != "default.jpg") {
          unlink($path . $remove_avatar);
        }
        $url_image = $baseURL . "/assets/images/profile/" . $fileName_encrypt . "." . $ekstensiGambar;
      } else {
        $message = "Maaf, hanya file gambar JPG, JPEG, dan PNG yang diizinkan.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      }
    } else if (empty($_FILE['avatar']["name"])) {
      $url_image = $avatar;
    }

    mysqli_query($conn, "UPDATE users SET img_user='$url_image', username='$nama', phone='$phone', address='$address', country='$country' WHERE id_user='$idUser'");
    $_SESSION['data-user']['name'] = $nama;
    $_SESSION['data-user']['picture'] = $url_image;
    return mysqli_affected_rows($conn);
  }

  function users($conn, $data, $role, $action, $idUser)
  {
    $id_user = valid($conn, $data['id-user']);
    $id_role = valid($conn, $data['role']);
    $selectRole = mysqli_query($conn, "SELECT * FROM users_role WHERE id_role='$id_role'");
    $row = mysqli_fetch_assoc($selectRole);
    $username = valid($conn, $data['name-user']);
    $roles = valid($conn, $data['name-role']);

    if ($role == 1) {
      if ($action == "update") {
        $description = "Mengubah otoritas nama pengguna " . $username . " dari " . $roles . " ke " . $row['role'];
        users_log($conn, $status = null, $description, $idUser);
        $sql = "UPDATE users SET id_role='$id_role', updated_at=current_timestamp WHERE id_user='$id_user'";
        mysqli_query($conn, $sql);
      }

      if ($action == "delete") {
        $description = "Menghapus akun pengguna " . $username . ".";
        users_log($conn, $status = null, $description, $idUser);
        $sql = "DELETE FROM users WHERE id_user='$id_user'";
        mysqli_query($conn, $sql);
      }

      return mysqli_affected_rows($conn);
    } else {
      $message = "Maaf, anda tidak punya akses untuk mengubah atau hapus data.";
      $message_type = "danger";
      alert($message, $message_type);
      return false;
    }
  }

  function role($conn, $data, $action, $idUser)
  {
    if ($action == "insert") {
      $checkRole = "SELECT * FROM users_role WHERE role LIKE '%$data[role]%'";
      $checkRole = mysqli_query($conn, $checkRole);
      if (mysqli_num_rows($checkRole) > 0) {
        $message = "Maaf, role yang anda masukan sudah ada.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        $description = "Menambahkan role $data[role] baru.";
        users_log($conn, $status = null, $description, $idUser);
        $sql = "INSERT INTO users_role(role) VALUES('$data[role]')";
      }
    }

    if ($action == "update") {
      if ($data['role'] !== $data['roleOld']) {
        $checkRole = "SELECT * FROM users_role WHERE role LIKE '%$data[role]%'";
        $checkRole = mysqli_query($conn, $checkRole);
        if (mysqli_num_rows($checkRole) > 0) {
          $message = "Maaf, role yang anda masukan sudah ada.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      }
      $description = "Mengubah role dari $data[roleOld] menjadi role $data[role].";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "UPDATE users_role SET role='$data[role]' WHERE id_role='$data[id_role]'";
    }

    if ($action == "delete") {
      $description = "Menghapus role $data[role].";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "DELETE FROM users_role WHERE id_role='$data[id_role]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function menu($conn, $data, $action, $idUser)
  {
    if ($action == "insert") {
      $checkMenu = "SELECT * FROM users_menu WHERE menu='$data[menu]'";
      $checkMenu = mysqli_query($conn, $checkMenu);
      if (mysqli_num_rows($checkMenu) > 0) {
        $message = "Maaf, menu yang anda masukan sudah ada.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        $namaFolder = strtolower($data['menu']);
        $namaFolder = str_replace(" ", "-", $namaFolder);
        $pathFolder = __DIR__ . '/../views/' . $namaFolder;
        if (!is_dir($pathFolder)) {
          mkdir($pathFolder, 0777, true);
          $file = fopen($pathFolder . '/redirect.php', "w");
          fwrite($file, '<?php require_once("../../controller/script.php");
          if (!isset($_SESSION["data-user"])) {
            header("Location: " . $baseURL . "/auth/");
            exit();
          }
          ');
          fclose($file);
        } else {
          $message = "Folder $namaFolder sudah ada!";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
        $description = "Menambahkan menu $data[menu] baru.";
        users_log($conn, $status = null, $description, $idUser);
        $sql = "INSERT INTO users_menu(menu, icon, folder) VALUES('$data[menu]', '$data[icon]', '$namaFolder')";
      }
    }

    if ($action == "update") {
      if ($data['menu'] !== $data['menuOld']) {
        $checkMenu = "SELECT * FROM users_menu WHERE menu='$data[menu]'";
        $checkMenu = mysqli_query($conn, $checkMenu);
        if (mysqli_num_rows($checkMenu) > 0) {
          $message = "Maaf, menu yang anda masukan sudah ada.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      }
      $description = "Mengubah menu dari $data[menuOld] menjadi menu $data[menu].";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "UPDATE users_menu SET menu='$data[menu]', icon='$data[icon]' WHERE id_menu='$data[id_menu]'";
    }

    if ($action == "delete") {
      $pathFolder = __DIR__ . '/../views/' . $data['folder'];
      hapusFolderRecursively($pathFolder);
      $description = "Menghapus menu $data[menu].";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "DELETE FROM users_menu WHERE id_menu='$data[id_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function sub_menu($conn, $data, $action, $baseURL, $idUser)
  {
    if ($action == "insert") {
      $checkSubMenu = "SELECT * FROM users_sub_menu WHERE title='$data[title]'";
      $checkSubMenu = mysqli_query($conn, $checkSubMenu);
      if (mysqli_num_rows($checkSubMenu) > 0) {
        $message = "Maaf, nama sub menu yang anda masukan sudah ada.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        $select_menu = "SELECT * FROM users_menu WHERE id_menu='$data[id_menu]'";
        $takeMenu = mysqli_query($conn, $select_menu);
        $dataMenu = mysqli_fetch_assoc($takeMenu);
        $folder = $dataMenu['folder'];
        $namaFile = strtolower($data['title']);
        $namaFile = str_replace(" ", "-", $namaFile);
        $pathFile = __DIR__ . '/../views/' . $folder . '/' . $namaFile . '.php';
        if (file_exists($pathFile)) {
          $message = "Maaf, nama file $namaFile sudah ada.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        } else {
          $file = fopen($pathFile, "w");
          fwrite($file, '<?php require_once("../../controller/script.php");
            require_once("redirect.php");
            $_SESSION["page-name"] = "' . $data['title'] . '";
            $_SESSION["page-url"] = "' . $namaFile . '";
            $_SESSION["actual-link"] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $_SESSION["object-link"] = $baseURL . "/views/' . $folder . '/";
            require_once("../../templates/views-top.php");
            ?>
            
            <!-- begin::Content -->
            <!-- ... -->
            <!-- end::Content -->
            
            <?php require_once("../../templates/views-bottom.php");
            ?>');
          fclose($file);
          $description = "Menambahkan sub menu $data[title] baru.";
          users_log($conn, $status = null, $description, $idUser);
          $sql = "INSERT INTO users_sub_menu(id_menu,id_active,title,file) VALUES('$data[id_menu]','$data[id_active]','$data[title]','$namaFile')";
        }
      }
    }

    if ($action == "update") {
      if ($data['title'] !== $data['titleOld']) {
        $checkSubMenu = "SELECT * FROM users_sub_menu WHERE title='$data[title]'";
        $checkSubMenu = mysqli_query($conn, $checkSubMenu);
        if (mysqli_num_rows($checkSubMenu) > 0) {
          $message = "Maaf, nama sub menu yang anda masukan sudah ada.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      }
      $description = "Mengubah sub menu dari $data[titleOld] menjadi sub menu $data[title].";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "UPDATE users_sub_menu SET id_menu='$data[id_menu]', id_active='$data[id_active]', title='$data[title]' WHERE id_sub_menu='$data[id_sub_menu]'";
    }

    if ($action == "delete") {
      unlink(__DIR__ . '/../views/' . $data['folder'] . '/' . $data['file'] . '.php');
      $description = "Menghapus sub menu $data[title].";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "DELETE FROM users_sub_menu WHERE id_sub_menu='$data[id_sub_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function menu_access($conn, $data, $action, $idUser)
  {
    if ($action == "insert") {
      $description = "Menambahkan akses menu baru.";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "INSERT INTO users_access_menu(id_role,id_menu) VALUES('$data[id_role]','$data[id_menu]')";
    }

    if ($action == "update") {
      $description = "Mengubah akses menu.";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "UPDATE users_access_menu SET id_role='$data[id_role]', id_menu='$data[id_menu]' WHERE id_access_menu='$data[id_access_menu]'";
    }

    if ($action == "delete") {
      $description = "Menghapus akses menu.";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "DELETE FROM users_access_menu WHERE id_access_menu='$data[id_access_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function sub_menu_access($conn, $data, $action, $idUser)
  {
    if ($action == "insert") {
      $description = "Menambahkan akses sub menu baru.";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "INSERT INTO users_access_sub_menu(id_role,id_sub_menu) VALUES('$data[id_role]','$data[id_sub_menu]')";
    }

    if ($action == "update") {
      $description = "Mengubah akses sub menu.";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "UPDATE users_access_sub_menu SET id_role='$data[id_role]', id_sub_menu='$data[id_sub_menu]' WHERE id_access_sub_menu='$data[id_access_sub_menu]'";
    }

    if ($action == "delete") {
      $description = "Menghapus akses sub menu.";
      users_log($conn, $status = null, $description, $idUser);
      $sql = "DELETE FROM users_access_sub_menu WHERE id_access_sub_menu='$data[id_access_sub_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function strp($conn, $data, $action, $idUser, $baseURL)
  {
    if ($action == "insert") {
      $check_id_strp = "SELECT * FROM strp ORDER BY id_strp DESC LIMIT 1";
      $views_id_strp = mysqli_query($conn, $check_id_strp);
      if(mysqli_num_rows($views_id_strp) > 0) {
        $data_id_strp = mysqli_fetch_assoc($views_id_strp);
        $id_strp = $data_id_strp['id_strp']+1;
      }else{
        $id_strp = 1;
      }
      $check_no_regis = "SELECT * FROM strp ORDER BY no_registrasi DESC LIMIT 1";
      $views_no_regis = mysqli_query($conn, $check_no_regis);
      if(mysqli_num_rows($views_no_regis) > 0) {
        $data_no_regis = mysqli_fetch_assoc($views_no_regis);
        $no_registrasi = $data_no_regis['no_registrasi']+1;
      }else{
        $no_registrasi = 1;
      }
      if($data['id_kepemilikan_kendaraan']==1){
        $kepemilikan_kendaraan = "pribadi";
      }else if($data['id_kepemilikan_kendaraan']==2){
        $kepemilikan_kendaraan = "dinas";
      }else if($data['id_kepemilikan_kendaraan']==3){
        $kepemilikan_kendaraan = "perusahaan";
      }else if($data['id_kepemilikan_kendaraan']==4){
        $kepemilikan_kendaraan = "angkutan_umum";
      }

      $path = "../assets/files/" . $data['kategori'] . "/" . $kepemilikan_kendaraan . "/";
      $fileName = basename($_FILES["files"]["name"]);
      $fileName = str_replace(" ", "-", $fileName);
      $fileName_encrypt = crc32($fileName);
      $ekstensiFile = explode('.', $fileName);
      $ekstensiFile = strtolower(end($ekstensiFile));
      $fileUploadPath = $path . $fileName_encrypt . "." . $ekstensiFile;
      $fileType = pathinfo($fileUploadPath, PATHINFO_EXTENSION);
      $allowTypes = array('pdf');
      if (in_array($fileType, $allowTypes)) {
        $fileTemp = $_FILES["files"]["tmp_name"];
        if (move_uploaded_file($fileTemp, $fileUploadPath)) {
          $files = $fileName_encrypt . "." . $ekstensiFile;
        } else {
          $message = "Maaf, terjadi kesalahan saat mengunggah file.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      } else {
        $message = "Maaf, hanya file PDF yang diizinkan.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      }

      $description = "Menambahkan STRP baru.";
      users_log($conn, $status = null, $description, $idUser);
      
      $sql_strp = "INSERT INTO strp(
        id_strp,
        id_user,
        kategori,
        no_registrasi,
        no_polisi,
        nama_pemilik,
        alamat_pemilik,
        nama_pengemudi,
        no_sim,
        no_pasport,
        id_warga_negara,
        jenis_kendaraan,
        id_kepemilikan_kendaraan,
        tahun_pembuatan,
        cc,
        no_rangka,
        no_mesin,
        warna,
        id_bahan_bakar,
        maksud_kunjungan,
        alamat_tujuan,
        files) 
      VALUES(
        '$id_strp',
        '$idUser',
        '$data[kategori]',
        '$no_registrasi',
        '$data[no_polisi]',
        '$data[nama_pemilik]',
        '$data[alamat_pemilik]',
        '$data[nama_pengemudi]',
        '$data[no_sim]',
        '$data[no_pasport]',
        '$data[id_warga_negara]',
        '$data[jenis_kendaraan]',
        '$data[id_kepemilikan_kendaraan]',
        '$data[tahun_pembuatan]',
        '$data[cc]',
        '$data[no_rangka]',
        '$data[no_mesin]',
        '$data[warna]',
        '$data[id_bahan_bakar]',
        '$data[maksud_kunjungan]',
        '$data[alamat_tujuan]',
        '$files'
      )";
      mysqli_query($conn, $sql_strp);

      $_SESSION["strp"]=[
        'status'=> 'inactive',
        'kategori'=>$data['kategori'],
        'id_strp'=>$id_strp
      ];
    }

    if ($action == "update") {
      if($data['id_kepemilikan_kendaraan']==1){
        $kepemilikan_kendaraan = "pribadi";
      }else if($data['id_kepemilikan_kendaraan']==2){
        $kepemilikan_kendaraan = "dinas";
      }else if($data['id_kepemilikan_kendaraan']==3){
        $kepemilikan_kendaraan = "perusahaan";
      }else if($data['id_kepemilikan_kendaraan']==4){
        $kepemilikan_kendaraan = "angkutan_umum";
      }

      if (!empty($_FILES['files']["name"])) {
        $path = "../assets/files/" . $data['kategori'] . "/" . $kepemilikan_kendaraan . "/";
        $fileName = basename($_FILES["files"]["name"]);
        $fileName = str_replace(" ", "-", $fileName);
        $fileName_encrypt = crc32($fileName);
        $ekstensiFile = explode('.', $fileName);
        $ekstensiFile = strtolower(end($ekstensiFile));
        $fileUploadPath = $path . $fileName_encrypt . "." . $ekstensiFile;
        $fileType = pathinfo($fileUploadPath, PATHINFO_EXTENSION);
        $allowTypes = array('pdf');
        if (in_array($fileType, $allowTypes)) {
          $fileTemp = $_FILES["files"]["tmp_name"];
          if (move_uploaded_file($fileTemp, $fileUploadPath)) {
            $files = $fileName_encrypt . "." . $ekstensiFile;
            unlink($path . $data['filesOld']);
          } else {
            $message = "Maaf, terjadi kesalahan saat mengunggah file.";
            $message_type = "danger";
            alert($message, $message_type);
            return false;
          }
        } else {
          $message = "Maaf, hanya file PDF yang diizinkan.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      } else if (empty($_FILE['files']["name"])) {
        $files = $data['filesOld'];
      }

      $description = "Mengubah data STRP.";
      users_log($conn, $status = null, $description, $idUser);

      $sql = "UPDATE strp 
      SET 
        no_polisi='$data[no_polisi]',
        nama_pemilik='$data[nama_pemilik]',
        alamat_pemilik='$data[alamat_pemilik]',
        nama_pengemudi='$data[nama_pengemudi]',
        no_sim='$data[no_sim]',
        no_pasport='$data[no_pasport]',
        id_warga_negara='$data[id_warga_negara]',
        jenis_kendaraan='$data[jenis_kendaraan]',
        id_kepemilikan_kendaraan='$data[id_kepemilikan_kendaraan]',
        tahun_pembuatan='$data[tahun_pembuatan]',
        cc='$data[cc]',
        no_rangka='$data[no_rangka]',
        no_mesin='$data[no_mesin]',
        warna='$data[warna]',
        id_bahan_bakar='$data[id_bahan_bakar]',
        maksud_kunjungan='$data[maksud_kunjungan]',
        alamat_tujuan='$data[alamat_tujuan]',
        files='$files'
      WHERE 
        id_strp='$data[id_strp]'";
      mysqli_query($conn, $sql);
    }

    if ($action == "update_lantas") {
      $description = "Lantas mengubah data STRP.";
      users_log($conn, $status = null, $description, $idUser);

      $sql = "UPDATE strp 
      SET 
        no_registrasi='$data[no_registrasi]',
        berlaku_hingga='$data[berlaku_hingga]'
      WHERE 
        id_strp='$data[id_strp]'";
      mysqli_query($conn, $sql);

    }

    if ($action == "delete") {
      if($data['id_kepemilikan_kendaraan']==1){
        $kepemilikan_kendaraan = "pribadi";
      }else if($data['id_kepemilikan_kendaraan']==2){
        $kepemilikan_kendaraan = "dinas";
      }else if($data['id_kepemilikan_kendaraan']==3){
        $kepemilikan_kendaraan = "perusahaan";
      }else if($data['id_kepemilikan_kendaraan']==4){
        $kepemilikan_kendaraan = "angkutan_umum";
      }

      $path = "../assets/files/" . $data['kategori'] . "/" . $kepemilikan_kendaraan . "/";
      unlink($path . $data['filesOld']);

      $description = "Menghapus akses sub menu.";
      users_log($conn, $status = null, $description, $idUser);

      $sql = "DELETE FROM strp WHERE id_strp='$data[id_strp]'";
      mysqli_query($conn, $sql);
    }

    return mysqli_affected_rows($conn);
  }

  function formulir_wawancara($conn, $data, $action, $idUser, $baseURL)
  {
    if ($action == "insert") {
      $check_id_fw = "SELECT * FROM formulir_wawancara ORDER BY id_fw DESC LIMIT 1";
      $views_id_fw = mysqli_query($conn, $check_id_fw);
      if(mysqli_num_rows($views_id_fw) > 0) {
        $data_id_fw = mysqli_fetch_assoc($views_id_fw);
        $id_fw = $data_id_fw['id_fw']+1;
      }else{
        $id_fw = 1;
      }

      $description = "Menambahkan Formulir Wawancara baru.";
      users_log($conn, $status = null, $description, $idUser);
      
      $sql_fw = "INSERT INTO formulir_wawancara(
        id_fw,
        id_user,
        kategori,
        id_strp,
        kesehatan,
        pengemudi_kendaraan,
        nama_pengemudi,
        tempat_lahir,
        tgl_lahir,
        no_pasport_pengemudi,
        no_sim_pengemudi,
        no_hp_pengemudi,
        pemilik_kendaraan,
        nama_pemilik_kendaraan,
        identitas_pemilik_kendaraan,
        surat_kuasa,
        plat_nomor,
        merek_kendaraan,
        id_kepemilikan_kendaraan,
        maksud_kunjungan,
        waktu_kunjungan,
        pelanggaran_atas_barang,
        pelanggaran_atas_penyalahgunaan,
        pelanggaran_atas_modifikasi,
        pelanggaran_atas_waktu,
        sanksi
      ) VALUES(
        '$id_fw',
        '$idUser',
        '$data[kategori]',
        '$data[id_strp]',
        '$data[kesehatan]',
        '$data[pengemudi_kendaraan]',
        '$data[nama_pengemudi]',
        '$data[tempat_lahir]',
        '$data[tgl_lahir]',
        '$data[no_pasport_pengemudi]',
        '$data[no_sim_pengemudi]',
        '$data[no_hp_pengemudi]',
        '$data[pemilik_kendaraan]',
        '$data[nama_pemilik_kendaraan]',
        '$data[identitas_pemilik_kendaraan]',
        '$data[surat_kuasa]',
        '$data[plat_nomor]',
        '$data[merek_kendaraan]',
        '$data[id_kepemilikan_kendaraan]',
        '$data[maksud_kunjungan]',
        '$data[waktu_kunjungan]',
        '$data[pelanggaran_atas_barang]',
        '$data[pelanggaran_atas_penyalahgunaan]',
        '$data[pelanggaran_atas_modifikasi]',
        '$data[pelanggaran_atas_waktu]',
        '$data[sanksi]'
      )";
      mysqli_query($conn, $sql_fw);
      $sql_alamat_pengemudi = "INSERT INTO alamat_pengemudi(id_fw,jalan_pengemudi,kelurahan_pengemudi,kecamatan_pengemudi,kabupaten_kota_pengemudi,provinsi_pengemudi) VALUES('$id_fw','$data[jalan_pengemudi]','$data[kelurahan_pengemudi]','$data[kecamatan_pengemudi]','$data[kabupaten_kota_pengemudi]','$data[provinsi_pengemudi]')";
      mysqli_query($conn, $sql_alamat_pengemudi);
      $sql_alamat_kendaraan = "INSERT INTO alamat_kendaraan(id_fw,jalan_kendaraan,kelurahan_kendaraan,kecamatan_kendaraan,kabupaten_kota_kendaraan,provinsi_kendaraan) VALUES('$id_fw','$data[jalan_kendaraan]','$data[kelurahan_kendaraan]','$data[kecamatan_kendaraan]','$data[kabupaten_kota_kendaraan]','$data[provinsi_kendaraan]')";
      mysqli_query($conn, $sql_alamat_kendaraan);
      $sql_alamat_tujuan = "INSERT INTO alamat_tujuan(id_fw,jalan_tujuan,distric,sub_distric,suco,aldeia) VALUES('$id_fw','$data[jalan_tujuan]','$data[distric]','$data[sub_distric]','$data[suco]','$data[aldeia]')";
      mysqli_query($conn, $sql_alamat_tujuan);
      $sql_kategori = "INSERT INTO $data[kategori](id_user,id_fw,status_strp,status_formulir) VALUES('$idUser','$id_fw','Belum Validasi','Belum Validasi')";
      mysqli_query($conn, $sql_kategori);
    }

    if ($action == "update") {
      $description = "Mengubah Formulir Wawancara.";
      users_log($conn, $status = null, $description, $idUser);

      $sql_pengemudi = "UPDATE alamat_pengemudi SET jalan_pengemudi='$data[jalan_pengemudi]', kelurahan_pengemudi='$data[kelurahan_pengemudi]', kecamatan_pengemudi='$data[kecamatan_pengemudi]', kabupaten_kota_pengemudi='$data[kabupaten_kota_pengemudi]', provinsi_pengemudi='$data[provinsi_pengemudi]' WHERE id_fw='$data[id_fw]'";
      mysqli_query($conn, $sql_pengemudi);
      $sql_kendaraan = "UPDATE alamat_kendaraan SET jalan_kendaraan='$data[jalan_kendaraan]', kelurahan_kendaraan='$data[kelurahan_kendaraan]', kecamatan_kendaraan='$data[kecamatan_kendaraan]', kabupaten_kota_kendaraan='$data[kabupaten_kota_kendaraan]', provinsi_kendaraan='$data[provinsi_kendaraan]' WHERE id_fw='$data[id_fw]'";
      mysqli_query($conn, $sql_kendaraan);
      $sql_tujuan = "UPDATE alamat_tujuan SET jalan_tujuan='$data[jalan_tujuan]', distric='$data[distric]', sub_distric='$data[sub_distric]', suco='$data[suco]', aldeia='$data[aldeia]' WHERE id_fw='$data[id_fw]'";
      mysqli_query($conn, $sql_tujuan);
      $sql_fw = "UPDATE formulir_wawancara 
      SET 
        kesehatan='$data[kesehatan]',
        pengemudi_kendaraan='$data[pengemudi_kendaraan]',
        nama_pengemudi='$data[nama_pengemudi]',
        tempat_lahir='$data[tempat_lahir]',
        tgl_lahir='$data[tgl_lahir]',
        no_pasport_pengemudi='$data[no_pasport_pengemudi]',
        no_sim_pengemudi='$data[no_sim_pengemudi]',
        no_hp_pengemudi='$data[no_hp_pengemudi]',
        pemilik_kendaraan='$data[pemilik_kendaraan]',
        nama_pemilik_kendaraan='$data[nama_pemilik_kendaraan]',
        identitas_pemilik_kendaraan='$data[identitas_pemilik_kendaraan]',
        surat_kuasa='$data[surat_kuasa]',
        plat_nomor='$data[plat_nomor]',
        merek_kendaraan='$data[merek_kendaraan]',
        id_kepemilikan_kendaraan='$data[id_kepemilikan_kendaraan]',
        maksud_kunjungan='$data[maksud_kunjungan]',
        waktu_kunjungan='$data[waktu_kunjungan]',
        pelanggaran_atas_barang='$data[pelanggaran_atas_barang]',
        pelanggaran_atas_penyalahgunaan='$data[pelanggaran_atas_penyalahgunaan]',
        pelanggaran_atas_modifikasi='$data[pelanggaran_atas_modifikasi]',
        pelanggaran_atas_waktu='$data[pelanggaran_atas_waktu]',
        sanksi='$data[sanksi]'
      WHERE 
        id_fw='$data[id_fw]'";
      mysqli_query($conn, $sql_fw);
    }

    if ($action == "delete") {

      $description = "Menghapus Formulir Wawancara.";
      users_log($conn, $status = null, $description, $idUser);

      $sql_fw = "DELETE FROM formulir_wawancara WHERE id_fw='$data[id_fw]'";
      mysqli_query($conn, $sql_fw);
    }

    return mysqli_affected_rows($conn);
  }


  function validasi_keberangkatan($conn, $data, $action)
  {
    if ($action == "strp") {
      $sql = "UPDATE keberangkatan SET status_strp='$data[status_strp]' WHERE id_keberangkatan='$data[id_keberangkatan]'";
    }

    if ($action == "formulir") {
      $sql = "UPDATE keberangkatan SET status_formulir='$data[status_formulir]' WHERE id_keberangkatan='$data[id_keberangkatan]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function validasi_kedatangan($conn, $data, $action)
  {
    if ($action == "strp") {
      $sql = "UPDATE kedatangan SET status_strp='$data[status_strp]' WHERE id_kedatangan='$data[id_kedatangan]'";
    }

    if ($action == "formulir") {
      $sql = "UPDATE kedatangan SET status_formulir='$data[status_formulir]' WHERE id_kedatangan='$data[id_kedatangan]'";
    }

    if ($action == "vhd") {
      $check_id_kedatangan = "SELECT * FROM kedatangan WHERE id_fw='$data[id_fw]'";
      $views_id_kedatangan = mysqli_query($conn, $check_id_kedatangan);
      if(mysqli_num_rows($views_id_kedatangan) > 0) {
        $sql = "UPDATE kedatangan SET  status_vhd='$data[status_vhd]', kesimpulan='$data[kesimpulan]' WHERE id_fw='$data[id_fw]'";
      }else{
        $sql = "INSERT INTO kedatangan(id_user,id_fw,status_strp,status_formulir,status_vhd,kesimpulan) VALUES('$data[id_user]','$data[id_fw]','Valid','Valid','$data[status_vhd]','$data[kesimpulan]')";
      }
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function __name($conn, $data, $action)
  {
    if ($action == "insert") {
    }

    if ($action == "update") {
    }

    if ($action == "delete") {
    }

    // mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }
}
