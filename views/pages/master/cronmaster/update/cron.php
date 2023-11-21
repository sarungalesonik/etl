<?php
session_start();

require_once "../../../../../api/autoload/init.php";

$db = Database::getInstance();
Cron::constructStatic($db);

$user_uid=$_SESSION["user_uid"];

$cron_tab_id = $_POST["up_cron_tab_id"];

$cron_name = $_POST["up_cron_name"];
$cron_time = $_POST["up_cron_time"];
$cron_path = $_POST["up_cron_path"];
$cron_file = $_POST["up_cron_file"];

$is_active = "0";
if(isset($_POST["up_is_active"])){
    $is_active = $_POST["up_is_active"];
}

if(Cron::updateCronTab($cron_tab_id,$cron_name,$cron_time,$cron_path, $cron_file, $is_active,$user_uid)){
    echo '<script>sucessPopup("Cron Tab Updated");
    $("#updatecronmodal").hide();
    $(".modal-backdrop").remove();
    viewalldatatable("master/cronmaster/datatable.php","-cron-dt-box");</script>';
    exit();
}
echo '<script>errorPopup("Error while updating");</script>';
exit();
?>