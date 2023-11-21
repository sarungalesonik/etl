<?php
session_start();
require_once "../../../../api/autoload/init.php";


$user_uid = $_POST["up_user_uid"];

$ref_user_uid=$_SESSION["user_uid"];

$user_module_access = array();
if(isset($_POST["up_user_module_access"])){
    $user_module_access = $_POST["up_user_module_access"];
}
$user_module_access=json_encode($user_module_access);

$user_full_name = $_POST["up_user_full_name"];
$user_email = $_POST["up_user_email"];
$user_username = $_POST["up_user_username"];
$user_type = $_POST["up_user_type"];

$user_is_super_user = "0";
if(isset($_POST["up_user_is_super_user"])){
    $user_is_super_user = $_POST["up_user_is_super_user"];
}


$db = Database::getInstance();
User::constructStatic($db);

$userdata=User::updateAdminUser($user_uid,$user_full_name,$user_email,$user_username,$user_type,$user_is_super_user,$user_module_access,$ref_user_uid);
if($userdata->response["count"]>0){
    echo '<script>sucessPopup("User updated");
        $("#upuserfileuploadform").trigger("reset");
        $("#updateusermodal").hide();
        $(".modal-backdrop").remove();
        viewalldatatable("admin/user/datatable.php","amazon-user-dt-box");
        </script>';
        exit(); 
}else{
    echo '<script>errorPopup("Error in updating user");</script>';
    exit();
}


?>