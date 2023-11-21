<?php
session_start();


require_once "../../../../../api/autoload/init.php";

$db = Database::getInstance();
Functions::constructStatic($db);
Cron::constructStatic($db);


$cron_name = $_POST["cron_name"];
$cron_time = $_POST["cron_time"];
$cron_path = $_POST["cron_path"];
$cron_file = $_POST["cron_file"];

$cron_tab_id = Functions::GetUniqueID('cron_tab_id','cron_tab',12);

if(Cron::addCronTab($cron_tab_id,$cron_name,$cron_time,$cron_path, $cron_file, $user_uid)){
    echo '<script>sucessPopup("Cron Tab added");$("#cronformatuploadform").trigger("reset");
    $("#addcronmodal").hide();
    $(".modal-backdrop").remove();
    viewalldatatable("master/cronmaster/datatable.php","-cron-dt-box");</script>';
    exit();
}
echo '<script>errorPopup("Error While adding cron tab");</script>';
exit();
?>