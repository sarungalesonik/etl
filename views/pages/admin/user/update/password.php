<?php
session_start();
require_once "../../../../api/autoload/init.php";

$db = Database::getInstance();
User::constructStatic($db);

$user_uid=$_SESSION["user_uid"];

$ref_user_uid = $_POST["reset_user_uid"];
$password = $_POST["user_password"];


$enypted_password = password_hash($password, PASSWORD_BCRYPT);

if(User::updateUserPass($ref_user_uid,$enypted_password,$user_uid)){
    $log_type="PASSWORD_RESET";
    $remark="Password reset";
    if(User::addUserLog($user_uid,$log_type,$ref_user_uid,$remark)){
        echo '<script>sucessPopup("User password updated");
        $("#userresetpassform").trigger("reset");
        $("#resetpassmodal").hide();
        $(".modal-backdrop").remove();
        </script>';
        exit();   
    }else{
        echo '<script>errorPopup("Error in adding user log");</script>';
    exit();
    }
}else{
    echo '<script>errorPopup("Error in updating password");</script>';
    exit();
}

?>