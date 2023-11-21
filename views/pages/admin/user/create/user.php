<?php
session_start();
require_once "../../../../api/autoload/init.php";

$user_ref_uid=$_SESSION["user_uid"];
$orgid=$_SESSION["orgid"];
$user_module_access = array();
if(isset($_POST["user_module_access"])){
    $user_module_access = $_POST["user_module_access"];
}
$user_module_access=json_encode($user_module_access);

$user_full_name = $_POST["user_full_name"];
$user_email = $_POST["user_email"];
$user_username = $_POST["user_username"];
$user_password = $_POST["user_password"];
$salt_prefix = Functions::get_rand_critical(22);
$enypted_password = password_hash($user_password, PASSWORD_BCRYPT);
$user_type = $_POST["user_type"];

$user_is_super_user = "0";
if(isset($_POST["user_is_super_user"])){
    $user_is_super_user = $_POST["user_is_super_user"];
}

$db = Database::getInstance();
User::constructStatic($db);

$wordsdata=User::addAdminUser($orgid,$user_full_name,$user_email,$user_username,$salt_prefix,$enypted_password,$user_type,$user_is_super_user,$user_module_access,$user_ref_uid);
if($wordsdata->response["count"]>0){
    echo '<script>sucessPopup("User addded");
    $("#userfileuploadform").trigger("reset");
    $("#addusermodal").hide();
    $(".modal-backdrop").remove();
    </script>';
    exit();
}else{
    echo '<script>errorPopup("Error in adding user");</script>';
    exit();
}


?>