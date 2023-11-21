<?php
session_start();
require_once "../../../../api/autoload/init.php";

$db = Database::getInstance();
User::constructStatic($db);

$user_uid=$_SESSION["user_uid"];

$ref_user_uid = $_POST["ref_user_uid"];
$status = $_POST["status"];

if($status=="0"){
    $log_type="ENABLE_USER";
    $remark="Enabled user";
}elseif($status=="1"){
    $log_type="DISABLE_USER";
    $remark="Disabled user";
}else{
    exit();
}

if(User::updateUserStatus($ref_user_uid,$status,$user_uid)){
    if(User::addUserLog($user_uid,$log_type,$ref_user_uid,$remark)){
        echo '<script>sucessPopup("User status updated");
        $("#userresetpassform").trigger("reset");
        $("#resetpassmodal").hide();
        $(".modal-backdrop").remove();
        viewalldatatable("admin/user/datatable.php","amazon-user-dt-box");
        </script>';
        exit();   
    }else{
        echo '<script>errorPopup("Error in adding user log");</script>';
    exit();
    }
}else{
    echo '<script>errorPopup("Error in updating status");</script>';
    exit();
}

?>