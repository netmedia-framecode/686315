<?php require_once("../controller/script.php");
require_once("redirect.php");
$_SESSION["page-name"] = "";
$_SESSION["page-url"] = "";
$_SESSION['actual-link'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$_SESSION['object-link'] = $baseURL . "/views/";
require_once("../templates/views-top.php");
?>

<!-- begin::Content -->
<!-- ... -->
<!-- end::Content -->

<?php require_once("../templates/views-bottom.php");
?>