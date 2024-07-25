<?php
require_once("../controller/script.php");
if (!empty($_POST["email"])) {
    $username = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST["username"]))));
    $email = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST["email"]))));
    $password = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $_POST["password"]))));
    $password = password_hash($password, PASSWORD_DEFAULT);
    $ip = $_SERVER["REMOTE_ADDR"];

    // check if email already exists
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($result) == 0) {
        // send massage verification to email
        $eu = crc32($email);
        $en_user = password_hash($email, PASSWORD_DEFAULT);
        require_once("../controller/mail.php");
        $to       = $email;
        $subject  = "Account Verification - PLBN Motamasin pro";
        $message  = "<!doctype html>
        <html>
        <head>
            <meta name='viewport' content='width=device-width'>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <title>Account Verification</title>
            <style>
                @media only screen and (max-width: 620px) {
                    table[class='body'] h1 {
                        font-size: 28px !important;
                        margin-bottom: 10px !important;}
                    table[class='body'] p,
                    table[class='body'] ul,
                    table[class='body'] ol,
                    table[class='body'] td,
                    table[class='body'] span,
                    table[class='body'] a {
                        font-size: 16px !important;}
                    table[class='body'] .wrapper,
                    table[class='body'] .article {
                        padding: 10px !important;}
                    table[class='body'] .content {
                        padding: 0 !important;}
                    table[class='body'] .container {
                        padding: 0 !important;
                        width: 100% !important;}
                    table[class='body'] .main {
                        border-left-width: 0 !important;
                        border-radius: 0 !important;
                        border-right-width: 0 !important;}
                    table[class='body'] .btn table {
                        width: 100% !important;}
                    table[class='body'] .btn a {
                        width: 100% !important;}
                    table[class='body'] .img-responsive {
                        height: auto !important;
                        max-width: 100% !important;
                        width: auto !important;}}
                @media all {
                    .ExternalClass {
                        width: 100%;}
                    .ExternalClass,
                    .ExternalClass p,
                    .ExternalClass span,
                    .ExternalClass font,
                    .ExternalClass td,
                    .ExternalClass div {
                        line-height: 100%;}
                    .apple-link a {
                        color: inherit !important;
                        font-family: inherit !important;
                        font-size: inherit !important;
                        font-weight: inherit !important;
                        line-height: inherit !important;
                        text-decoration: none !important;
                    .btn-primary table td:hover {
                        background-color: #d5075d !important;}
                    .btn-primary a:hover {
                        background-color: #000 !important;
                        border-color: #000 !important;
                        color: #fff !important;}}
            </style>
        </head>
        <body class style='background-color: #e1e3e5; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
            <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background-color: #e1e3e5; width: 100%;' width='100%' bgcolor='#e1e3e5'>
            <tr>
                <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
                <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;' width='580' valign='top'>
                <div class='header' style='padding: 20px 0;'>
                    <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                    <tr>
                        <td class='align-center' style='font-family: sans-serif; font-size: 14px; vertical-align: top; text-align: center;' valign='top' align='center'>
                        <p style='font-family: sans-serif; font-weight: normal; margin: 0; margin-bottom: 15px; text-decoration: none; color: #11202f; font-size: 20px;'>PLBN Motamasin pro</p>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;'>
        
                    <!-- START CENTERED WHITE CONTAINER -->
                    <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>
        
                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
                        <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                            <tr>
                            <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Hi " . $username . ",</p>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Selamat akun anda sudah terdaftar, tinggal satu langkah lagi anda sudah bisa menggunakan akun anda. Silakan verifikasi sekarang dengan mengklik link di bawah ini.</p>
                                <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; min-width: 100%; width: 100%;' width='100%'>
                                <tbody>
                                    <tr>
                                    <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                        <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: auto; width: auto;'>
                                        <tbody>
                                            <tr>
                                            <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #ffffff; border-radius: 5px; text-align: center;' valign='top' bgcolor='#ffffff' align='center'> <a href='" . $baseURL . "/auth/verification?en=" . $en_user . "&eu=" . $eu . "' target='_blank' style='background-color: #ffffff; border: solid 1px #000; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; border-color: #000; color: #000;'>verifikasi sekarang</a> </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </td>
                                    </tr>
                                </tbody>
                                </table>
                                <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Terima kasih telah mendaftar di PLBN Motamasin pro.</p>
                                <small>Peringatan! Ini adalah pesan otomatis sehingga Anda tidak dapat membalas pesan ini.</small>
                            </td>
                            </tr>
                        </table>
                        </td>
                    </tr>
        
                    <!-- END MAIN CONTENT AREA -->
                    </table>
                    
                    <!-- START FOOTER -->
                    <div class='footer' style='clear: both; margin-top: 10px; text-align: center; width: 100%;'>
                    <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%;' width='100%'>
                        <tr>
                        <td class='content-block' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                            <span class='apple-link' style='color: #9a9ea6; font-size: 12px; text-align: center;'>Workarea Jln. S. K. Lerik, Kota Baru, Kupang, NTT, Indonesia. (0380) 8438423</span>
                        </td>
                        </tr>
                        <tr>
                        <td class='content-block powered-by' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #9a9ea6; font-size: 12px; text-align: center;' valign='top' align='center'>
                            Powered by <a href='https://www.netmedia-framecode.com' style='color: #9a9ea6; font-size: 12px; text-align: center; text-decoration: none;'>Netmedia Framecode</a>.
                        </td>
                        </tr>
                    </table>
                    </div>
                    <!-- END FOOTER -->
        
                <!-- END CENTERED WHITE CONTAINER -->
                </div>
                </td>
                <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
            </tr>
            </table>
        </body>
        </html>";
        smtp_mail($to, $subject, $message, "", "", 0, 0, true);

        // insert user to database
        mysqli_query($conn, "INSERT INTO users (en_user, username, email, password, ip_user) VALUES ('$eu', '$username', '$email', '$password', '$ip')");
        $_SESSION["usersRegistered"] = [
            "email" => $email,
        ];
        $response = array('status' => true);
        echo json_encode($response);
    } else if (mysqli_num_rows($result) > 0) {
        $response = array(
            'status' => false,
            'message' => "Maaf, email sudah terdaftar.",
        );
        echo json_encode($response);
    }
}
